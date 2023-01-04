<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ProfileController extends Controller
{
    public function profile(Request $request){
        return view('profile.dash-my-profile', [
            'user' => $request->user(),
        ]);
    }


    public function edit(Request $request)
    {
        return view('profile.dash-edit-profile', [
            'user' => $request->user(),
        ]);
    }


    public function update(ProfileUpdateRequest $request)
    {
        $request->user()->fill($request->validated());
        $date_of_birth = implode('-',[$request->date_of_birth_year, $request->date_of_birth_month, $request->date_of_birth_day]);
        $request->user()->date_of_birth = $date_of_birth;
        $request->user()->save();

        return Redirect::route('profile.page')->with('status', 'profile-updated');
    }


}
