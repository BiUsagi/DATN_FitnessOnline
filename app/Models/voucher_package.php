<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Voucher_package extends Model
{

    use HasFactory;
    protected $table = 'voucher_packages';

    protected $fillable = [
        'voucher_id',     
        'workout_package_id', 
        'user_id',  
    ];

   
    public function voucher()
    {
        return $this->belongsTo(Voucher::class); // Một voucher package thuộc về một voucher
    }

   
    public function Workout_Package()
    {
        return $this->belongsTo(Workout_Package::class); // Một voucher package thuộc về một gói tập
    }

    public function user()
    {
        return $this->belongsTo(User::class); // Một voucher package thuộc về một người dùng
    }
    
}
