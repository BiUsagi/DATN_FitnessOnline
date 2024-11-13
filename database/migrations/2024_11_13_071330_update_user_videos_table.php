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
        Schema::table('user_videos', function (Blueprint $table) {
            // Thêm các cột mới vào bảng user_videos
            $table->unsignedBigInteger('workout_package_id'); // Thêm cột workout_package_id
            $table->integer('day_number'); // Thêm cột day_number

            // Tạo khóa ngoại (foreign key)
            $table->foreign('workout_package_id')->references('id')->on('workout_packages')->onDelete('cascade');
            $table->foreign('day_number')->references('day_number')->on('package_exercises')->onDelete('cascade'); // Liên kết với day_number trong package_exercises
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_videos', function (Blueprint $table) {
            // Xóa các cột và khóa ngoại
            $table->dropForeign(['workout_package_id']);
            $table->dropForeign(['day_number']);
            $table->dropColumn(['workout_package_id', 'day_number']);
        });
    }
};
