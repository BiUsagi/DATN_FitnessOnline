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
            $table->id(); // ID chính (PK)
            $table->string('exercise_name'); // Tên bài tập
            $table->text('description'); // Mô tả bài tập
            $table->string('video_url'); // Đường dẫn video
            $table->text('equipment_needed')->nullable(); // Dụng cụ cần thiết (có thể rỗng)
            $table->integer('duration'); // Thời lượng bài tập (phút)
            $table->timestamps();
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