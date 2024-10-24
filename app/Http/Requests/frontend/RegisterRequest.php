<?php

namespace App\Http\Requests\frontend;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterRequest extends FormRequest
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
            'user_name' => 'required|regex:/^[^\d]+$/', // Không được có ký tự số
            'email1' => 'required|email:rfc,dns|unique:users,email|max:255', // Email phải hợp lệ và chưa tồn tại
            'password1' => [
                'required',
                'min:8',
                'regex:/[a-z]/', // Phải có ít nhất một chữ cái thường
                'regex:/[0-9]/', // Phải có ít nhất một số
            ],
            'password1_confirmation' => 'required|same:password1', // Xác nhận mật khẩu
        ];
    }

    public function messages()
    {
        return [
            'user_name.required' => 'Bạn chưa nhập tên !',
            'user_name.regex' => 'Tên không được có ký tự số.',
            'email1.required' => 'Bạn chưa nhập email !',
            'email1.email' => 'Email không hợp lệ.',
            'email1.unique' => 'Email này đã được đăng ký.',
            'password1.required' => 'Bạn chưa nhập mật khẩu !',
            'password1.min' => 'Mật khẩu phải có ít nhất 8 ký tự.',
            'password1.regex' => 'Mật khẩu phải có chữ và số.',
            'password1_confirmation.required' => 'Bạn chưa nhập xác nhận mật khẩu !',
            'password1_confirmation.same' => 'Xác nhận mật khẩu không khớp.',
        ];
    }

}

