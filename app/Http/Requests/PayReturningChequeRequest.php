<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PayReturningChequeRequest extends FormRequest
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
            'form_date' => 'required',
            'form_number' => 'required',
            'serial_number' => 'required',
            'total' => 'required',
            'wage' => 'required',
            'due_date' => 'required',
            'bank_account_details' => 'required',
            'receiver' => 'required',
            'considerations' => 'required',
        ];
    }
}
