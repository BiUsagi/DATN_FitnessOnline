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

    public function orders()
    {
        return $this->hasMany(Order::class, 'workout_package_id');
    }

    public function staff()
    {
        return $this->belongsTo(Staff::class, 'staff_id');
    }
}
