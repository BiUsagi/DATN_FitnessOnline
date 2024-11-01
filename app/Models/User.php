<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Carbon\Carbon;

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
    ];

    // Phương thức tính tuổi từ ngày sinh
    public function getAgeFromBirthday()
    {
        // Chuyển đổi 'birthday' thành đối tượng Carbon
        $birthDate = Carbon::parse($this->birthday);

        // Tính tuổi bằng cách so sánh với ngày hiện tại
        return $birthDate->age;
    }


    public function supportExercises()
    {
        return $this->hasMany(Support_Exercise::class, 'user_id');
    }
    public function comments()
    {
        return $this->hasMany(Comment::class, 'user_id');
    }
    public function orders()
    {
        return $this->hasMany(Order::class, 'user_id');
    }

    public function staffRequests()
    {
        return $this->hasMany(StaffRequest::class, 'user_id');
    }
}