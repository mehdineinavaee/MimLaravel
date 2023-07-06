<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PayChequeRequest extends FormRequest
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
            'amount' => 'required',
            'issue_date' => 'required',
            'due_date' => 'required',
            'serial_number' => 'required',
            'bank_account_details' => 'required',
            'receiver' => 'required',
            'considerations' => 'required',
        ];
    }
}
