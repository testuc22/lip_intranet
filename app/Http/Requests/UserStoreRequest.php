<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
        switch($this->method()) {
            case 'POST':
                $rules = [
                    'first_name'     =>'required',
                    'last_name'     =>'required',
                    'email'  =>'required|email|unique:users,email',
                    'password'  =>'required|required_with:password_confirmation|string|confirmed',
                    'phone_number' => 'required|numeric|min:10',
                    'role' => 'required',
                ];
                break;
            case 'PUT':
                $rules = [
                    'first_name'     =>'required',
                    'last_name'     =>'required',
                    'phone_number' => 'required|numeric|min:10',
                    'role' => 'sometimes|required',
                    'file' => 'sometimes|required|mimes:png,jpg,jpeg|max:2048',
                ];
                break;
        }
        return $rules;
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'first_name.required' => 'Required *',
            'last_name.required' => 'Required *',
            'email.required'  => 'Required *',
            'password.required'  => 'Required *',
            'phone_number.required'  => 'Required *',
            'role.required' => 'Required *',
            'file.required' => 'Please Upload a file',
        ];
    }
}
