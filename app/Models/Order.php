<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'workout_package_id',
        'price',
    ];


    public function workoutPackage()
    {
        return $this->belongsTo(Workout_Package::class, "workout_package_id");
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
