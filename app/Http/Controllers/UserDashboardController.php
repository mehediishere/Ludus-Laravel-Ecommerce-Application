<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddressBookRequest;
use App\Models\AddressBook;
use App\Models\Order;
use App\Models\OrderAddress;
use App\Models\OrderPayment;
use App\Models\OrderProduct;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserDashboardController extends Controller
{
    function orderDetails($order){
        $orderDetails = DB::table('orders')->where('orders.order_id', $order)->where('orders.user_id', Auth::user()->email)
            ->join('order_addresses', 'orders.order_id', '=', 'order_addresses.order_id')
            ->select('orders.order_id', 'orders.payment_status', 'orders.order_status', 'orders.total_qty', 'orders.subtotal_price', 'orders.grand_price', 'orders.delivery_fee', 'orders.created_at', 'orders.updated_at',
                'order_addresses.full_name', 'order_addresses.phone', 'order_addresses.street_address', 'order_addresses.landmark', 'order_addresses.city', 'order_addresses.province', 'order_addresses.zip_code')
            ->first();
        $orderProducts = OrderProduct::select('product', 'price', 'qty')->where('order_id', $order)->get();

        return [$orderDetails, $orderProducts];
    }

    public function allOrder(){
        $orders = Order::select('order_id', 'order_status', 'total_qty', 'grand_price', 'created_at', 'updated_at')->orderBy('created_at', 'desc')->get();
        return view('profile.dash-my-order', compact('orders'));
    }

    public function manageOrder($order){
        if(Order::where('order_id', $order)->where('user_id', Auth::user()->email)->exists()){
            $var = $this->orderDetails($order);
            return view('profile.dash-manage-order', ['orderDetails' => $var[0], 'orderProducts' => $var[1]]);
        }else{
            return redirect()->route('all.order');
        }
    }


    public function trackOrder(){
        return view('profile.dash-track-order');
    }

    public function showTrackOrder(Request $request){
        if(Order::where('order_id', $request->track_id)->where('user_id', Auth::user()->email)->exists()){
            $var = $this->orderDetails($request->track_id);
            return view('profile.dash-manage-order', ['orderDetails' => $var[0], 'orderProducts' => $var[1]]);
        }else{
            return redirect()->route('all.order');
        }
    }

    public function checkout()
    {
        if(\Cart::isEmpty()){
            return back();
        }

        $shipping_address = AddressBook::select('street_address', 'province', 'phone')
            ->where('user_id', Auth::user()->email)
            ->where('shipping', 1)
            ->first();
        $billing_address = AddressBook::select('street_address', 'province', 'phone')
            ->where('user_id', Auth::user()->email)
            ->where('billing', 1)
            ->first();
        return view('pages.checkout', compact('shipping_address', 'billing_address'));
    }

    public function placeOrder(AddressBookRequest $request){
        $condition = new \Darryldecode\Cart\CartCondition(array(
            'name' => 'Express Shipping $4',
            'type' => 'shipping',
            'target' => 'total', // this condition will be applied to cart's total when getTotal() is called.
            'value' => '+4',
            'order' => 1 // the order of calculation of cart base conditions. The bigger the later to be applied.
        ));
        \Cart::condition($condition);

//        $order_id = (string) Str::orderedUuid();
        $order_id = Str::replace('-', '', Carbon::now()->toDateString()).random_int(01, 99999);
        $request->validated();  // Retrieve the validated address input data

        OrderAddress::create([
            'order_id' => $order_id,
            'full_name' => $request->input('address-fname')." ".$request->input('address-lname'),
            'email' => $request->input('address-email'),
            'street_address' => $request->input('address-street'),
            'landmark'  => $request->input('address-landmark'),
            'phone' => $request->input('address-phone'),
            'province' => $request->input('address-state'),
            'city' => $request->input('address-city'),
            'zip_code' => $request->input('address-postal')
        ]);

        Order::create([
            'order_id' => $order_id,
            'user_id' => Auth::user()->email,
            'coupon_id' => $request->input('coupon'),
            'order_status' => "processing",
            'payment_status' => "unpaid",
            'total_qty' => \Cart::getTotalQuantity(),
            'delivery_fee' => "4.00",
            'subtotal_price' => \Cart::getSubTotal(),
            'grand_price' => \Cart::getTotal(),
            'order_note' => $request->input('note'),
        ]);

        $items = \Cart::getContent();
        foreach($items as $item){
            OrderProduct::create([
                'order_id' => $order_id,
                'product_id' => $item->id,
                'product' => $item->name,
                'price' => $item->price,
                'qty' => $item->quantity,
            ]);
        }

        OrderPayment::create([
            'order_id' => $order_id,
            'payment_type' => $request->payment,
        ]);

        \Cart::clear();
        return redirect(route('index'));
    }

}
