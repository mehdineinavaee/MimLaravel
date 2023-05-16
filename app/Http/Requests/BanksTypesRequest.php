<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BanksTypesRequest extends FormRequest
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
            'bank_code' => 'required', // |numeric|digits_between:2,4
            'bank_name' => 'required|max:50',
        ];
    }
}
