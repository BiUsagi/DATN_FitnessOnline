<?php

namespace App\Http\Requests\backend;

use Illuminate\Foundation\Http\FormRequest;

class AccountRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'user_name' => 'required|string|max:255',
            'gender' => 'required|in:0,1,2', // 0: Nữ, 1: Nam, 2: Khác
            'email' => 'required|email|max:255',
            'phone_number' => 'required|regex:/^(\+84|0)[0-9]{9}$/',
            'birthday' => 'required|date',
            'address' => 'required|string|max:255',
        ];
    }
    /**
     * Tùy chỉnh các thông báo lỗi.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'user_name.required' => 'Trường tên là bắt buộc.',
            'gender.required' => 'Vui lòng chọn giới tính.',
            'email.required' => 'Trường email là bắt buộc.',
            'phone_number.required' => 'Trường số điện thoại là bắt buộc.',
            'phone_number.regex' => 'Số điện thoại không đúng định dạng.',
            'birthday.required' => 'Trường ngày sinh là bắt buộc.',
            'address.required' => 'Trường địa chỉ là bắt buộc.',
        ];
    }
}