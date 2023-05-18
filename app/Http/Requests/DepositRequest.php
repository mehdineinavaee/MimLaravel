<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DepositRequest extends FormRequest
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
            'form_number' => 'required',
            'form_date' => 'required',
            'place' => 'required',
            'mark_back' => 'required',
            'serial_number' => 'required',
            'total' => 'required',
            'due_date' => 'required',
            'bank_account_details' => 'required',
            'payer' => 'required',
        ];
    }
}
