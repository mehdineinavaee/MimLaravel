<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BuyFactorRequest extends FormRequest
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
            'national_code' => 'nullable',
            'viator' => 'nullable',
            'tel' => 'nullable',
            'address' => 'nullable',
            'customer_type' => 'required',
            'seller' => 'nullable',
            'factor_no' => 'required',
            'factor_date' => 'required',
            'broker' => 'nullable',
            'commission' => 'nullable',
            'considerations' => 'nullable',
            'settlement_deadline' => 'nullable',
            'settlement_date' => 'nullable',
        ];
    }
}
