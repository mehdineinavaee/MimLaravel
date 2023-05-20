<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransferPersonRequest extends FormRequest
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
            'from_taraf_hesab' => 'required',
            'to_taraf_hesab' => 'required',
            'form_date' => 'required',
            'form_number' => 'required',
            'cash_amount' => 'required',
            'considerations' => 'required',
        ];
    }
}
