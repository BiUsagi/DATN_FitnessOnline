<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $table = 'staff';

    protected $fillable = [
        'id_user',
        'name_staff',
        'email',
        'image',
        'address',
        'password',
        'phone_number',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function supportExercises()
    {
        return $this->hasMany(Support_Exercise::class, 'id_staff');
    }
}
