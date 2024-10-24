<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class voucher_package extends Model
{

    use HasFactory;
    protected $table = 'voucher_packages';

    protected $fillable = [
        'voucher_id',      // Khóa ngoại liên kết đến voucher
        'gym_package_id',  // Khóa ngoại liên kết đến gói tập
    ];

    /**
     * Mối quan hệ ngược lại với Voucher
     */
    public function voucher()
    {
        return $this->belongsTo(Voucher::class); // Một voucher package thuộc về một voucher
    }

    /**
     * Mối quan hệ với Workout_Package
     */
    public function Workout_Package()
    {
        return $this->belongsTo(Workout_Package::class); // Một voucher package thuộc về một gói tập
    }
    
}
