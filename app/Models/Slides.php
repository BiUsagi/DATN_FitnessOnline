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
        $fileName = time() . '-' . $file->getClientOriginalName();
        $file->move(public_path($path), $fileName); // Di chuyển file vào thư mục public/backend/img/
        return $fileName; // Trả về tên file
    }

}
