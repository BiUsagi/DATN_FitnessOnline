<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;
    protected $table = 'posts';

    // Khóa chính
    protected $primaryKey = 'id';

    // Các thuộc tính
    protected $fillable = [
        'staff_id',
        'title',
        'description',
        'content',
        'image',
        'created_at',
        'updated_at',
    ];
    public function comments()
    {
        return $this->hasMany(Comment::class,'posts_id');
    }
}
