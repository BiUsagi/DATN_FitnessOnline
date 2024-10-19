<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    // Tên bảng
    protected $table = 'users';

    // Các trường có thể điền được
    protected $fillable = [
        'user_name',    // tên người dùng
        'email',        // email
        'avatar',       // avatar
        'address',      // địa chỉ
        'birthday',     // ngày sinh
        'gender',       // giới tính
        'password',     // mật khẩu
        'phone_number', // số điện thoại
        'trial',        // số ngày dùng thử
    ];

    // Các trường cần ẩn khi trả về JSON
    protected $hidden = [
        'password', // ẩn mật khẩu
        'remember_token', // token nhớ phiên đăng nhập
    ];

    // Cấu hình kiểu dữ liệu cho các trường
    protected $casts = [
        'email_verified_at' => 'datetime',
        'birthday' => 'date', // định dạng kiểu ngày cho birthday
    ];

    public function supportExercises()
    {
        return $this->hasMany(Support_Exercise::class, 'user_id');
    }
}