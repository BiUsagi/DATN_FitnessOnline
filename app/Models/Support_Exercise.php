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
        return $this->belongsTo(Exercise::class, 'exercise_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function staff()
    {
        return $this->belongsTo(Staff::class, 'staff_id');
    }

    // Mối quan hệ hasMany với chính nó để lấy phản hồi
    public function replies()
    {
        return $this->hasMany(Support_Exercise::class, 'rep'); // 'rep' là khóa ngoại tham chiếu đến ID của bình luận cha
    }

    // Mối quan hệ belongsTo với chính nó (Bình luận có thể là trả lời của bình luận khác)
    public function parentComment()
    {
        return $this->belongsTo(Support_Exercise::class, 'rep'); // 'rep' là khóa ngoại tham chiếu đến ID của bình luận cha
    }
}
