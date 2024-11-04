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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();                                // Khóa chính
            $table->foreignId('user_id')                 // Khóa ngoại liên kết với bảng users
                ->constrained('users')
                ->onDelete('cascade');                 // Xóa khi xóa người dùng
            $table->string('message');                   // Nội dung thông báo
            $table->boolean('is_read')->default(false);  // Trạng thái đã đọc hay chưa
            $table->integer('type');                  // Kiểu thông báo
            $table->string('link')->nullable();          // Link liên kết
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
