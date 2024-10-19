<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $table = 'staff';

    // Khóa chính
    protected $primaryKey = 'id';

    // Các thuộc tính
    protected $fillable = [
        'user_id',
        'staff_name',
        'email',
        'avatar',
        'gender',
        'rating',
        'rating_count',
        'address',
        'password',
        'phone_number',
        'created_at',
        'updated_at',
    ];

    // Ẩn mật khẩu
    protected $hidden = [
        'password',
    ];

    // Kiểu dữ liệu
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'gender' => 'integer',
        'rating' => 'integer',
        'rating_count' => 'integer'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function supportExercises()
    {
        return $this->hasMany(Support_Exercise::class, 'staff_id');
    }


}