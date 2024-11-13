<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class voucher extends Model
{
    use HasFactory;

    protected $table = 'vouchers';

    protected $fillable = [
        'code',            // Mã voucher
        'sale',        // Phần trăm giảm giá
        'usage_limit',     // Số lượt nhập tối đa
        'times_used',      // Số lượt đã sử dụng
        'start_date',      // Ngày bắt đầu
        'end_date',        // Ngày kết thúc
    ];

    /**
     * Mối quan hệ với bảng voucher_packages
     */
    public function voucher_packages()
    {
        return $this->hasMany(voucher_package::class); // Có thể có nhiều gói tập liên quan
    }
}
