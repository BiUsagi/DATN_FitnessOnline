<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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
        'rating' => 'float',
        'rating_count' => 'integer'
    ];

    // Tính thời gian họạt động
    public function getActiveDuration()
    {
        $createdAt = $this->created_at;
        $now = Carbon::now();
        return $createdAt->diffForHumans($now, true); // Chỉ trả về khoảng thời gian mà không có từ ngữ
    }


    // Tính số lượng học viên

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function supportExercises()
    {
        return $this->hasMany(Support_Exercise::class, 'staff_id');
    }

    public function workoutPackages()
    {
        return $this->hasMany(Workout_Package::class, 'staff_id');
    }



}