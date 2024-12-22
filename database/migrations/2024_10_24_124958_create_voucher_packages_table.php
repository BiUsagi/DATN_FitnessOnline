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
        Schema::create('voucher_packages', function (Blueprint $table) {
            $table->id();                                      // Khóa chính
            $table->foreignId('voucher_id')                    // Khóa ngoại liên kết với bảng vouchers
                ->constrained('vouchers')
                ->onDelete('cascade');                      // Xóa khi xóa voucher
            $table->foreignId('user_id')
                ->constrained('users')
                ->onDelete('cascade');
            $table->foreignId('workout_package_id')                // Khóa ngoại liên kết với bảng workout_packages
                ->constrained('workout_packages')
                ->onDelete('cascade');                      // Xóa khi xóa gói tập
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voucher_packages');
    }
};
