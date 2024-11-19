<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('workout_package_id');
            $table->string('original_price'); // Giá gốc
            $table->string('purchase_price'); // Giá mua cuối cùng sau khi giảm giá
            $table->unsignedBigInteger('voucher_id')->nullable();
            // $table->tinyInteger('status')->default(0)->comment('0: chờ xử lí, 1 đã thanh toán, 2 hủy');

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('workout_package_id')->references('id')->on('workout_packages')->onDelete('cascade');
            $table->foreign('voucher_id')->references('id')->on('vouchers')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};