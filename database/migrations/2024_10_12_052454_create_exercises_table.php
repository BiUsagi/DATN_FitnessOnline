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
        Schema::create('exercises', function (Blueprint $table) {
            $table->id();                       // Khóa chính
            $table->foreignId('pt_id')          // Khóa ngoại liên kết đến huấn luyện viên
                  ->constrained('staff')
                  ->onDelete('cascade')
                  ->nullable();
            $table->string('name');             // Tên bài tập
            $table->text('description')->nullable(); // Mô tả bài tập
            $table->integer('sets');             // Số hiệp
            $table->integer('reps');             // Số lần lặp lại
            $table->string('video_url')->nullable(); // URL video hướng dẫn
            $table->string('video_url_second')->nullable(); // URL video hướng dẫn
            $table->integer('status')->default(0);
            $table->timestamps();                // Thời gian tạo và cập nhật
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exercises');
    }
};