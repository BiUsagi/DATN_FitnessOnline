<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('deposit_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('wallet_id')->constrained('wallets')->onDelete('cascade'); // Liên kết với bảng wallets
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->decimal('amount', 15, 2); // Số tiền nạp
            $table->timestamp('deposited_at'); // Thời gian nạp
            $table->string('description')->nullable(); // Nội dung giao dịch
            $table->string('transaction_id')->nullable(); // Mã giao dịch
            $table->tinyInteger('status')->default(0)->comment('0: chờ xử lí, 1 đã thanh toán, 2 hủy');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deposit_histories');
    }
};
