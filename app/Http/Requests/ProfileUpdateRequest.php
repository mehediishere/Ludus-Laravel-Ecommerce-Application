<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'date_of_birth_month' => ['required', 'string', 'max:50'],
            'date_of_birth_day' => ['required', 'string', 'max:50'],
            'date_of_birth_year' => ['required', 'string', 'max:50'],
            'gender' => ['required', 'string', 'max:50'],
            'phone' => ['string', 'max:15', 'nullable'],
            'email' => ['email', 'required', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
        ];
    }
}
