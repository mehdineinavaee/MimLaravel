<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'national_code' => 'nullable|numeric|digits:10',
            'first_name' => 'required|regex:/^[\pL\s\-]+$/u|max:50', // digits_between:2,4
            'last_name' => 'required|regex:/^[\pL\s\-]+$/u|max:50',
            'father' => 'nullable|regex:/^[\pL\s\-]+$/u|max:50',
            // 'birthdate' => 'nullable|date',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|max:100',
            'confirm_password' => 'required|same:password',
            'role' => 'required',
        ];
    }
}
