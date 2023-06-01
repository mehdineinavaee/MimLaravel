<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TarafHesabRequest extends FormRequest
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
            'code' => 'required', // |numeric|digits_between:2,4
            'fullname' => 'required|regex:/^[\pL\s\-]+$/u|max:50',
            'phone' => 'required', // |numeric|digits:11
            'city' => 'required',
            'fax' => 'nullable',
            'tel' => 'nullable',
            'email' => 'nullable|email',
            'website' => 'nullable|url',
        ];
    }
}
