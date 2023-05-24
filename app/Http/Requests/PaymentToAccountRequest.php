<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentToAccountRequest extends FormRequest
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
            'taraf_hesab_name' => 'required',
            'form_date' => 'required',
            'form_number' => 'required',
            'cash_amount' => 'required',
            'considerations1' => 'required',
            'payment_for' => 'required',
            'tab2_cheque_total' => 'required',
            'tab2_issue_date' => 'required',
            'tab2_due_date' => 'required',
            'tab2_cheque_serial_number' => 'required',
            'tab2_bank_account_details' => 'required',
            'tab2_consideration' => 'required',
            'date' => 'required',
            'bank_account_details' => 'required',
            'deposit_amount' => 'required',
            'wage' => 'required',
            'issue_tracking' => 'required',
            'considerations2' => 'required',
            'paid_discount' => 'required',
        ];
    }
}
