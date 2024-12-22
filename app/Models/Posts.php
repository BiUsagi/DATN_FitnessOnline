<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


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
        return $this->hasMany(Comment::class, 'posts_id', 'id')->where('rep', 0)->orderBy('created_at', 'DESC');
    }
    public function user()
    {
        return $this->belongsTo(Staff::class, 'staff_id'); // 'staff_id' là cột khóa ngoại trong bảng posts
    }
    // Hàm lấy tên nhân viên
    public function getStaffName()
    {
        return $this->user ? $this->user->staff_name : 'Không xác định';
    }
    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }
}
