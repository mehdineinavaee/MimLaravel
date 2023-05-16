<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FundRequest extends FormRequest
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
            'form_type' => 'required', // |numeric|digits_between:2,4
            'daramad_code' => 'required',
            'daramad_name' => 'required',
        ];
    }
}
