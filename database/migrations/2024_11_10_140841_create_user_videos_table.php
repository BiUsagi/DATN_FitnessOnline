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
        Schema::create('user_videos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('package_exercise_id')->nullable(); // Liên kết bài tập trong gói
            $table->unsignedBigInteger('staff_id')->nullable(); // Huấn luyện viên đánh giá video
            $table->string('video_path');
            $table->text('description')->nullable()->comment('Mô tả về bài tập trong video');
            $table->tinyInteger('status')->default(0)->comment('0 - chưa đánh giá, 1 - đạt, 2 - chưa đạt');
            $table->timestamps();
    
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('package_exercise_id')->references('id')->on('package_exercises')->onDelete('set null');
            $table->foreign('staff_id')->references('id')->on('staff')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_videos');
    }
};
