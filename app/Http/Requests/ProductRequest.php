<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'code' => 'required', // |numeric|digits_between:2,4
            'main_group' => 'required',
            'sub_group' => 'required',
            'product_name' => 'required|max:50',
            'sell_price' => 'required',
            'value_added_group' => 'required',
            'introduce_date' => 'required',
            'latest_buy_price' => 'required',
            'main_barcode' => 'required',
            'order_point' => 'required',
            'product_unit' => 'required',
        ];
    }
}
