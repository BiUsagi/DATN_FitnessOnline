<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package_Exercise extends Model
{
    use HasFactory;

    protected $table = 'package_exercises';
    protected $fillable = [
        'workout_package_id',
        'exercise_id',
        'day_number',
        'sequence',
        'is_day_off'
    ];
    public function workoutPackage()
    {
        return $this->belongsTo(Workout_Package::class);
    }

    // Liên kết đến exercise
    public function exercise()
    {
        return $this->belongsTo(Exercise::class);
    }
}
