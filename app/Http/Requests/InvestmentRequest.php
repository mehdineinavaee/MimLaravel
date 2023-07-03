<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvestmentRequest extends FormRequest
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
            'shareholder' => 'required',
            'form_date' => 'required',
            'cash_amount' => 'required',
            'cash_register' => 'required',
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
