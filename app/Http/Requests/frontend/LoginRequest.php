<?php

namespace App\Http\Requests\frontend;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'email' => 'required|email:rfc,dns|max:255',
            'password' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Bạn chưa nhập Email !',
            'email.email' => 'Email không hợp lệ.',
            'password.required' => 'Bạn chưa nhập mật khẩu !',
        ];
    }
}
