<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StaffRequest extends FormRequest
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
            'first_name' => 'required|regex:/^[\pL\s\-]+$/u|max:50', // digits_between:2,4
            'last_name' => 'required|regex:/^[\pL\s\-]+$/u|max:50',
            'father' => 'required|regex:/^[\pL\s\-]+$/u|max:50',
        ];
    }
}
