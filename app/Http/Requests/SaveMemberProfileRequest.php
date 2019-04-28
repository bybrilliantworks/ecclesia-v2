<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveMemberProfileRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email',
            'marital_status' => 'required|string',
            'address' => 'required|string',
            'mobile_number' => 'required|string',
            'gender' => 'required|string',
            'neighbourhood' => 'required|string',
            'employment_status' => 'required|string',
            'occupation' => 'required|string',
            'marital_status' => 'required|string',
            'birthday' => 'required|string'
        ];
    }
}
