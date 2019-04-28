<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StoreMemberRequest extends Request
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
            'email' => 'required|email|unique:members',
            'marital_status' => 'required|string',
            'address' => 'required|string',
            'mobile_number' => 'required|string|unique:members',
        ];
    }
}
