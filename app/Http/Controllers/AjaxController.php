<?php

namespace App\Http\Controllers;

use App\Models\AddressBook;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class AjaxController extends Controller
{
    public function quickView(Request $request){
        $discountedPrice = discountCalculate($request->price, $request->discount);
        return [$discountedPrice, $request->price, (int)$request->discount];
    }

    public function addToCart(Request $request){
        $product = Product::where('id',$request->product)->first();

        $title = $product->title;
        $quantity = $request->quantity;
        $thumbnail = $product->thumbnail;
        $price = discountCalculate($product->price, $product->discountPercentage);

        \Cart::add($product->id, $product->title, $price, $quantity,
            [
                'category' =>$product->category,
                'image' => $thumbnail,
            ]
        );
        $subTotal = \Cart::getSubTotal();
        $cartItems = \Cart::getTotalQuantity();

        return compact('cartItems', 'subTotal', 'title', 'price', 'thumbnail');
    }

    public function removeCartItem(Request $request){

        \Cart::remove($request->product);
        $cartItems = \Cart::getTotalQuantity();
        $subTotal = \Cart::getSubTotal();

        return compact('cartItems', 'subTotal');
    }

    public function updateCartItem(Request $request){
        $request->validate([
           'count_type' => ['string', Rule::in(['inc', 'dec']),]
        ]);

        $qty = 1;

        if ($request->count_type == "dec"){
            $qty = -1;
        }

        \Cart::update($request->product_id, array(
            'quantity' => $qty,
        ));

        $cartItems = \Cart::getTotalQuantity();
        $subTotal = \Cart::getSubTotal();

        return compact('cartItems', 'subTotal');
    }

    public function getShippingAddress(){
        $shipping = AddressBook::select('first_name as fname', 'last_name as lname', 'user_id as email', 'street_address as street', 'landmark', 'phone', 'province', 'city', 'zip_code')
            ->where('user_id', Auth::user()->email)
            ->where('shipping', 1)
            ->first();
        return $shipping;
    }
}
