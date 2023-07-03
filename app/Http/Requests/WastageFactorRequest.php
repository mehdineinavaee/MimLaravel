<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WastageFactorRequest extends FormRequest
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
            'wastage_type' => 'required',
            'customer_type' => 'nullable',
            'buyer' => 'nullable',
            'factor_no' => 'required',
            'factor_date' => 'required',
            'considerations' => 'nullable',
            'settlement_deadline' => 'nullable',
            'settlement_date' => 'nullable',
        ];
    }
}
