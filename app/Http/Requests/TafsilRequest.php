<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TafsilRequest extends FormRequest
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
            'kol_account_name' => 'required',
            'moein_account_name' => 'required',
            'account_code' => 'required',
            'account_name' => 'required',
            'active' => 'nullable'
        ];
    }
}
