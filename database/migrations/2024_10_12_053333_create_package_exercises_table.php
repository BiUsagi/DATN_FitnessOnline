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
        $table->id(); // Khóa chính
        $table->foreignId('workout_package_id')->constrained('workout_packages')->onDelete('cascade');
        $table->foreignId('exercise_id')->constrained('exercises')->onDelete('cascade');
        $table->foreignId('pt_id')->nullable()->constrained('staff')->onDelete('set null'); // PT tạo bài tập trong gói
        $table->integer('day_number'); // Ngày thứ mấy trong lộ trình
        $table->integer('sequence'); // Thứ tự bài tập trong ngày
        $table->boolean('is_day_off')->default(false); // Trạng thái ngày nghỉ
        $table->timestamps();
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