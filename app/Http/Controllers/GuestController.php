<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class GuestController extends Controller
{
    public function index(){
        $featureProducts = Product::orderBy('rating', 'desc')->limit(10)->get();
        $newProducts = Product::select('id', 'title', 'rating', 'stock', 'description', 'category', 'price', 'discountPercentage', 'thumbnail')->limit(10)->latest()->get();
        $mostDiscountedProducts = Product::orderBy('discountPercentage', 'desc')->limit(10)->get();
        $bestDeals = Product::orderBy('discountPercentage', 'desc')->limit(6)->get();

        return view('pages.index',
            compact(
                'featureProducts',
                'newProducts','mostDiscountedProducts', 'bestDeals')
        );
    }

    public function productDetails($id){
        $productSingle = Product::where('id',$id)->first();
        $discountedPrice = discountCalculate($productSingle->price, $productSingle->discountPercentage);
        $newProducts = Product::limit(10)->latest()->get();
        return view('pages.product', compact('productSingle', 'newProducts', 'discountedPrice'));
    }

    public function productFilter(){
        $defaultProducts = Product::latest()->paginate(12);
        $numOfProductFound = 0;
        return view('pages.products', compact('defaultProducts', 'numOfProductFound'));
    }

    public function mainSearch(Request $request){

        $validator = Validator::make($request->all(), [
            'search' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('index');
        }

        $defaultProducts = Product::where('title', 'like', '%'.$request->search.'%')->paginate(12);
        $numOfProductFound = $defaultProducts->count();
        return view('pages.products', compact('defaultProducts', 'numOfProductFound'));
    }

    public function cart(){
        return view('pages.cart');
    }

}
