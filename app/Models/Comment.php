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
    
    public function posts() {
        return $this->belongsTo(Posts::class, 'posts_id');
    }

    // Quan hệ với bảng User (người dùng)
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
    // Mối quan hệ hasMany với chính nó để lấy phản hồi
    public function rep()
    {
        return $this->hasMany(Comment::class, 'rep'); // 'rep' là khóa ngoại tham chiếu đến ID của bình luận cha
    }

    // Mối quan hệ belongsTo với chính nó (Bình luận có thể là trả lời của bình luận khác)
    public function parentComment()
    {
        return $this->belongsTo(Comment::class, 'rep'); // 'rep' là khóa ngoại tham chiếu đến ID của bình luận cha
    }
    
}
