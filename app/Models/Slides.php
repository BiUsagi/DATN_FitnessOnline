<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slides extends Model
{
    use HasFactory;
    protected $fillable = ['id','name','description', 'image'];
    public static function uploadImage($file)
    {
        $path = 'assets/backend/img/';
        $fileName = $file->getClientOriginalName();
        
        // Kiểm tra nếu file đã tồn tại trong thư mục
        if (!file_exists(public_path($path . $fileName))) {
            // Nếu file chưa tồn tại, thêm thời gian vào tên file để đảm bảo tính duy nhất
            $file->move(public_path($path), $fileName); // Di chuyển file vào thư mục
        }
        return $fileName; // Trả về tên file
    }
    

}
