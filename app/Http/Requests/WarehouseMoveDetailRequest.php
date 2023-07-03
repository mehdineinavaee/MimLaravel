<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WarehouseMoveDetailRequest extends FormRequest
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
            'product_code' => 'required',
            'product_name' => 'required',
            'amount' => 'required',
            'pre_transmitter' => 'required',
            'next_transmitter' => 'required',
            'pre_receiver' => 'required',
            'next_receiver' => 'required',
        ];
    }
}
