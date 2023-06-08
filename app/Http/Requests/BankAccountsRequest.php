<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BankAccountsRequest extends FormRequest
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
            'account_type' => 'required', // |numeric|digits_between:2,4
            'account_number' => 'required',
            'shaba_number' => 'required',
            'cart_number' => 'required',
            'bank_type' => 'required',
            'branch_name' => 'required',
            'branch_address' => 'required',
            'cheque_print_type' => 'required',
        ];
    }
}
