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
            'userId' => 'required|integer|exists:users,id',
            'userName' => 'required|string|max:255',
            'userGender' => 'required|in:0,1,2', // 0: Nữ, 1: Nam, 2: Khác
            'userEmail' => 'required|email|max:255',
            'userPhone' => 'required|regex:/^(\+84|0)[0-9]{9}$/',
            'userBirthday' => 'required|date',
            'userAddress' => 'required|string|max:255',
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
            'userId.required' => 'Trường ID người dùng là bắt buộc.',
            'userId.exists' => 'Người dùng không tồn tại.',
            'userName.required' => 'Trường tên là bắt buộc.',
            'userGender.required' => 'Vui lòng chọn giới tính.',
            'userEmail.required' => 'Trường email là bắt buộc.',
            'userPhone.required' => 'Trường số điện thoại là bắt buộc.',
            'userPhone.regex' => 'Số điện thoại không đúng định dạng.',
            'userBirthday.required' => 'Trường ngày sinh là bắt buộc.',
            'userAddress.required' => 'Trường địa chỉ là bắt buộc.',
        ];
    }
}