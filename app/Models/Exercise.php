<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    use HasFactory;

    protected $table = 'exercises';
    protected $fillable = [
        'pt_id',
        'name',
        'description',
        'sets',
        'reps',
        'video_url',
        'video_url_second',
        'status'
    ];

    public function workout_package(){
        return $this->belongsToMany(Workout_Package::class , 'package_exercises')
                    ->withPivot('day_number', 'sequence', 'is_day_off');
    }

}
