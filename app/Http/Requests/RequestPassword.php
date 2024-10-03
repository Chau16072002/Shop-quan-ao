<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestPassword extends FormRequest
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
            'current_password' => 'required',
            'new_password' => 'required|confirmed',
            'new_password_confirmation' => 'required',
        ];
    }
    public function messages()
    {
        return [
        'current_password.required' => 'Trường này không được để trống',
        'new_password.required' => 'Trường này không được để trống',
        'new_password.confirmed' => 'Mật khẩu nhập lại không đúng',
        'new_password_confirmation.required' => 'Trường này không được để trống',  
        ];
    }
}
