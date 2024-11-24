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
            $table->unsignedBigInteger('workout_package_id')->nullable(); // Liên kết đến gói tập
            $table->integer('day_number')->comment('Ngày trong gói tập'); // Ngày trong gói tập
            $table->string('video_path');
            $table->text('description')->nullable()->comment('Mô tả về bài tập trong video');
            $table->text('feedback')->nullable();
            $table->tinyInteger('status')->default(0)->comment('0 - chưa đánh giá, 1 - đạt, 2 - chưa đạt');
            $table->timestamps();

            // Khóa ngoại
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('workout_package_id')->references('id')->on('workout_packages')->onDelete('cascade');
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
