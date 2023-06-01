<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PhoneBookRequest extends FormRequest
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
            'contact' => 'required|regex:/^[\pL\s\-]+$/u|max:50',
            'mobile' => 'nullable', // |numeric|digits:11
            'fax' => 'nullable', // |numeric|digits:11
            'tel' => 'nullable', // |numeric|digits:11
            'email' => 'nullable|email',
            'website' => 'nullable|url',
        ];
    }
}
