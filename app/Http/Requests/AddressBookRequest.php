<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressBookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'address-fname' => ['required', 'string', 'max:50'],
            'address-lname' => ['max:50'],
            'address-phone' => ['required', 'digits_between:11,13'],
            'address-street' => ['required', 'string', 'max:500'],
            'address-landmark' => ['string', 'max:500'],
            'address-state' => ['required', 'string', 'max:20'],
            'address-city' => ['required', 'string', 'max:20'],
            'address-postal' => ['required', 'string', 'max:10'],
        ];
    }
}
