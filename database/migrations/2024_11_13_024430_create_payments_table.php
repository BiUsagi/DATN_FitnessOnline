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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('order_id', 255);
            $table->string('thanh_vien', 100)->comment('Thành viên thanh toán');
            $table->float('money')->comment('Số tiền thanh toán');
            $table->string('note', 255)->nullable()->comment('Ghi chú thanh toán');
            $table->string('vnp_response_code', 255)->comment('Mã phản hồi VNPAY');
            $table->string('code_vnpay', 255)->comment('Mã giao dịch VNPAY');
            $table->string('code_bank', 255)->comment('Mã ngân hàng');
            $table->dateTime('time')->comment('Thời gian chuyển khoản');
            $table->timestamps();

            // $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
