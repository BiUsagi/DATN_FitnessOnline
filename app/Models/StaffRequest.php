<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffRequest extends Model
{
    use HasFactory;

    protected $table = 'staff_requests'; // Tên bảng

    protected $fillable = [
        'user_id',
        'new_name',
        'new_email',
        'new_avatar',
        'new_address',
        'new_phone_number',
        'introduction',
        'certificate',
        'status',
        'approved_at',
        'created_at',
        'updated_at',
    ];

    // Định nghĩa quan hệ với model User
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    // Hàm lấy tên người dùng
    public function getUserName()
    {
        return $this->user ? $this->user->user_name : 'N/A';
    }
}
