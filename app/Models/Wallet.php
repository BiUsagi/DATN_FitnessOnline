<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    use HasFactory;

    protected $table = 'wallets'; // Chỉ định tên bảng
    protected $fillable = ['user_id', 'balance', 'status', 'currency'];

    public function depositHistories()
    {
        return $this->hasMany(Deposit_histories::class, 'wallet_id'); // Có thể chỉ định tên khóa ngoại
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
