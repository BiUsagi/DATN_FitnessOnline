<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Posts;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'comments';

    // Khóa chính
    protected $primaryKey = 'id';

    protected $fillable = ['user_id','posts_id', 'rep','report','content'];
    //liên kết bản user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function posts()
    {
        return $this->belongsTo(Posts::class);
    }
}
