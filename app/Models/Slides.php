<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slides extends Model
{
    use HasFactory;
    protected $table = 'slides';

    // Khóa chính
    protected $primaryKey = 'id';

    protected $fillable = ['name','description', 'image'];
    public static function uploadImage($file)
    {
        $path = 'assets/backend/img/accounts/';
        $fileName = $file->getClientOriginalName();
        
        // Kiểm tra nếu file đã tồn tại trong thư mục
        if (!file_exists(public_path($path . $fileName))) {
            $file->move(public_path($path), $fileName); // Di chuyển file vào thư mục
        }
        return $fileName; // Trả về tên file
    }

}
