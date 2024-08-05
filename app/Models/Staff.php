<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;
    // Tên bảng
    protected $table = 'staff';

    // Khóa chính
    protected $primaryKey = 'id';

    // Các thuộc tính
    protected $fillable = [
        'id_user',
        'name_staff',
        'email',
        'image',
        'address',
        'password',
        'created_at',
        'updated_at',
        'phone_number'
    ];

    // Ẩn mật khẩu
    protected $hidden = [
        'password',
    ];

    // Kiểu dữ liệu
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}