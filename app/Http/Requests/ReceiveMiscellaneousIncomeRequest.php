<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReceiveMiscellaneousIncomeRequest extends FormRequest
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
            'income_title' => 'required',
            'form_date' => 'required',
            'form_number' => 'required',
            'cash_amount' => 'required',
            'considerations1' => 'required',
            'date' => 'required',
            'bank_account_details' => 'required',
            'deposit_amount' => 'required',
            'wage' => 'required',
            'issue_tracking' => 'required',
            'considerations2' => 'required',
        ];
    }
}
