<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SellFactorRequest extends FormRequest
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
            'customer_type' => 'required',
            'buyer' => 'required',
            'factor_no' => 'required',
            'factor_date' => 'required',
            'broker' => 'nullable',
            'commission' => 'nullable',
            'amount' => 'required',
            'discount' => 'required',
            'total' => 'required',
            'warehouse_name' => 'required',
            'considerations' => 'nullable',
            'settlement_deadline' => 'nullable',
            'settlement_date' => 'nullable',
        ];
    }
}
