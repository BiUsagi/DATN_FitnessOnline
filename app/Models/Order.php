<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'workout_package_id',
        'original_price',
        'purchase_price',
        'voucher_id',
    ];

    public function workoutPackage()
    {
        return $this->belongsTo(Workout_Package::class, "workout_package_id");
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    // Hàm lấy tên khóa học
    public function getWorkoutPackageName()
    {
        return $this->workoutPackage ? $this->workoutPackage->package_name : 'N/A';
    }

    // Hàm lấy tên khách hàng
    public function getUserName()
    {
        return $this->user ? $this->user->user_name : 'N/A';
    }
    public function voucher()
    {
        return $this->belongsTo(Voucher::class);  // Thêm quan hệ này
    }
    public function staff()
    {
        return $this->belongsTo(Staff::class, 'staff_id');
    }

}
