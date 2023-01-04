<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddressBookRequest;
use App\Models\AddressBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressBookController extends Controller
{
    public function addressBook(){
        $con_address = AddressBook::select('id','first_name', 'last_name', 'street_address', 'phone', 'province', 'shipping', 'billing')->where('user_id', Auth::user()->email)->get();
        return view('profile.dash-address-book', compact('con_address'));
    }

    public function newAddressBook(){
        return view('profile.dash-new-address');
    }

    public function saveNewAddress(AddressBookRequest $request){

        $request->validated();  // Retrieve the validated input data

        AddressBook::create([
            'user_id' => $request->user()->email,
            'first_name' => $request->input('address-fname'),
            'last_name' => $request->input('address-lname'),
            'street_address' => $request->input('address-street'),
            'landmark'  => $request->input('address-landmark'),
            'phone' => $request->input('address-phone'),
            'province' => $request->input('address-state'),
            'city' => $request->input('address-city'),
            'zip_code' => $request->input('address-postal')
        ]);

        return redirect()->route('address.book');
    }

    public function makeDefaultAddress(){
        $con_address = AddressBook::select('id', 'first_name', 'last_name', 'street_address', 'phone', 'province', 'shipping', 'billing')->where('user_id', Auth::user()->email)->get();
        return view('profile.dash-address-make-default', compact('con_address'));
    }

    public function savedefaultShippingAddress(Request $request){
        AddressBook::select('shipping')->where('user_id', Auth::user()->email)->update(['shipping' => 0]);
        AddressBook::select('shipping')->where('user_id', Auth::user()->email)->where('id', $request->input('default-address'))->update(['shipping' => 1]);
        return redirect()->route('address.book');
    }

    public function savedefaultBillingAddress(Request $request){
        AddressBook::select('billing')->where('user_id', Auth::user()->email)->update(['billing' => 0]);
        AddressBook::select('billing')->where('user_id', Auth::user()->email)->where('id', $request->input('default-address'))->update(['billing' => 1]);
        return redirect()->route('address.book');
    }

    public function updateAddressBook($id){
        $con_address = AddressBook::select('id','first_name', 'last_name', 'street_address', 'phone', 'province', 'city', 'landmark', 'zip_code')->where('user_id', Auth::user()->email)->where('id', $id)->first();
        return view('profile.dash-update-address', compact('con_address'));
    }

    public function saveUpdatedAddressBook(AddressBookRequest $request){

        $request->validated();

        AddressBook::where('id', $request->address_id)->where('user_id', Auth::user()->email)->
            update([
            'first_name' => $request->input('address-fname'),
            'last_name' => $request->input('address-lname'),
            'street_address' => $request->input('address-street'),
            'landmark'  => $request->input('address-landmark'),
            'phone' => $request->input('address-phone'),
            'province' => $request->input('address-state'),
            'city' => $request->input('address-city'),
            'zip_code' => $request->input('address-postal')
        ]);
        return redirect()->route('address.book');
    }
}
