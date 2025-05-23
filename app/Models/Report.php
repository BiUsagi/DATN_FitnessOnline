<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Posts;
use App\Models\Comment;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'comment_id',
        'reported_by',
        'report_content',
    ];

    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'reported_by', 'id');
    }
    
}
