<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class video_feedback extends Model
{
    protected $table = 'video_feedback';

    protected $fillable = [
        'videoe_id',
        'pt_id',
        'feedback'
    ];

}
