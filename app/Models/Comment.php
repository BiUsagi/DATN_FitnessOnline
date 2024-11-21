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

    protected $fillable = ['user_id','posts_id','rep','report','content'];
    
    public function posts() {
        return $this->belongsTo(Posts::class, 'posts_id');
    }
    // Quan hệ với bảng User (người dùng)
    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    
    // Thiết lập quan hệ đệ quy để lấy các phản hồi cấp con
    // Quan hệ với các phản hồi (con của bình luận hiện tại)
    public function replies()
    {
        return $this->hasMany(Comment::class, 'rep','id');
    }

    // Quan hệ với bình luận cha (nếu có)
    public function parent()
    {
        return $this->belongsTo(Comment::class, 'rep');
    }
    public function reports()
    {
        return $this->hasMany(Report::class, 'comment_id');
    }
}
 