<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NotificationRequest extends FormRequest
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
            'form_date' => 'required',
            'form_number' => 'required',
            'mark_back' => 'required',
            'serial_number' => 'required',
            'total' => 'required',
            'due_date' => 'required',
            'bank_account_details' => 'required',
            'payer' => 'required',
            'considerations' => 'required',
        ];
    }
}
