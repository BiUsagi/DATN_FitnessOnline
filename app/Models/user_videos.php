<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class user_videos extends Model
{
    protected $table = 'user_videos';

    protected $fillable = [
        'user_id',
        'video_path',
        'description',
        'status'
    ];
}
