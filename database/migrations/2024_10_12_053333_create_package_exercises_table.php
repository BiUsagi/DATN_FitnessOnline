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
        Schema::create('package_exercises', function (Blueprint $table) {
            $table->id();                       // Khóa chính
            $table->foreignId('workout_package_id') // Khóa ngoại liên kết đến gói tập
                  ->constrained('workout_packages')
                  ->onDelete('cascade');
            $table->foreignId('exercise_id')    // Khóa ngoại liên kết đến bài tập
                  ->constrained('exercises')
                  ->onDelete('cascade');
            $table->integer('day_number');      // Ngày thứ mấy trong lộ trình
            $table->integer('sequence');         // Thứ tự bài tập trong ngày
            $table->boolean('is_day_off')->default(false); // Trạng thái ngày nghỉ
            $table->timestamps();                // Thời gian tạo và cập nhật
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('package_exercises');
    }
};