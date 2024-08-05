<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class   Support_Exercise extends Model
{
    use HasFactory;


    protected $table = 'support_exercises';

    protected $fillable = [
        'id_exercise',
        'id_user',
        'id_staff',
        'content',
    ];

    public function exercise()
    {
        return $this->belongsTo(Exercise::class, 'id_exercise');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function staff()
    {
        return $this->belongsTo(Staff::class, 'id_staff');
    }
}
