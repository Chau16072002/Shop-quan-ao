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
            'new_password' => 'required',
            'new_password_confirmation' => 'required|same:new_password',
        ];
    }
    public function messages()
    {
        return [
        'current_password.required' => 'Trường này không được để trống',
        'new_password.required' => 'Trường này không được để trống',
        'new_password_confirmation.required' => 'Trường này không được để trống',
        'new_password_confirmation.same' => 'Mậ khẩu nhập lại không đúng',
        ];
    }
}
