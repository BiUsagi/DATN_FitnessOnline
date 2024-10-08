<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slides extends Model
{
    use HasFactory;
    protected $fillable = ['name_user', 'title', 'avatar', 'email','address','phone_number'];
}
