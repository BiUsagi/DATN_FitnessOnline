<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_package_progress extends Model
{
    use HasFactory;

    protected $table = 'user_package_progress';

    protected $fillable = [
        'user_id',
        'workout_package_id',
        'current_exercise_id',
        'current_day',
        'current_sequence',
        'is_completed',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function workoutPackage()
    {
        return $this->belongsTo(Workout_Package::class, 'workout_package_id');
    }

    public function currentExercise()
    {
        return $this->belongsTo(Exercise::class, 'current_exercise_id');
    }
}

