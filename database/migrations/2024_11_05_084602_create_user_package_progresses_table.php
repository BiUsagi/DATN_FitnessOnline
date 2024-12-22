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
        Schema::create('user_package_progress', function (Blueprint $table) {
            $table->id();                                  // Khóa chính
            $table->foreignId('user_id')                   // Khóa ngoại liên kết đến người dùng
                  ->constrained('users')
                  ->onDelete('cascade');
            $table->foreignId('workout_package_id')        // Khóa ngoại liên kết đến gói tập luyện
                  ->constrained('workout_packages')
                  ->onDelete('cascade');
            $table->foreignId('current_exercise_id')       // Khóa ngoại liên kết đến bài tập hiện tại
                  ->constrained('exercises')
                  ->onDelete('cascade')
                  ->nullable();
            $table->integer('current_day')->default(1);    // Ngày hiện tại trong lộ trình
            $table->integer('current_sequence')->default(1); // Thứ tự bài tập hiện tại trong ngày
            $table->boolean('is_completed')->default(false); // Trạng thái hoàn thành gói
            $table->timestamps();                           // Thời gian tạo và cập nhật
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_package_progress');
    }
};
