<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workout_Package extends Model
{
    use HasFactory;
    protected $table = 'workout_packages';


    protected $fillable = [
        'package_name',
        'image',
        'description',
        'level',
        'price',
        'duration_days',
        'staff_id',
        'goal',
        'status',
    ];

    // Hàm lấy số lượng học viên dựa trên bảng order
    public function getStudentCount()
    {
        return $this->orders->count();
    }


    public function orders()
    {
        return $this->hasMany(Order::class, 'workout_package_id');
    }

    public function staff()
    {
        return $this->belongsTo(Staff::class, 'staff_id');
    }

    public function userPackageProgress()
    {
        return $this->hasMany(user_package_progress::class, 'workout_package_id')
                    ->where('user_id', auth()->id());
    }

    public function exercises()
    {
        return $this->belongsToMany(Exercise::class, 'package_exercises', 'workout_package_id', 'exercise_id')
            ->withPivot('id' ,'day_number', 'sequence', 'is_day_off')
            ->withTimestamps();
    }
}
