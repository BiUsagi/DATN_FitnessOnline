<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Deposit_histories extends Model
{
    use HasFactory;

    protected $table = 'deposit_histories'; // Chỉ định tên bảng
    protected $fillable = ['wallet_id', 'amount', 'deposited_at', 'transaction_id', 'description', 'user_id', 'status'];

    public function wallet()
    {
        return $this->belongsTo(Wallet::class, 'wallet_id'); // Có thể chỉ định tên khóa ngoại
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id'); // Thiết lập quan hệ với bảng User qua user_id
    }
}
