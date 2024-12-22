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
        Schema::create('vouchers', function (Blueprint $table) {
            $table->id();                                      // Khóa chính
            $table->string('code', 50)->unique();              // Mã voucher, phải là duy nhất
            $table->integer('sale');                           // Giảm giá
            $table->integer('usage_limit');                    // Số lượt nhập tối đa
            $table->integer('times_used')->default(0);         // Số lần voucher đã được sử dụng
            $table->date('start_date');                        // Ngày bắt đầu hiệu lực
            $table->date('end_date');                          // Ngày kết thúc hiệu lực
            $table->timestamps();   
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vouchers');
    }
};
