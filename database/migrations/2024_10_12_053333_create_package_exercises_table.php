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
            $table->id(); // ID chính (PK)
            $table->unsignedBigInteger('exercise_id'); // ID bài tập (FK)
            $table->unsignedBigInteger('workout_packages_id'); // ID gói tập (FK)
            $table->timestamps();

            // Khóa ngoại (foreign key) liên kết đến bảng Exercises
            $table->foreign('exercise_id')->references('id')->on('exercises')->onDelete('cascade');

            // Khóa ngoại (foreign key) liên kết đến bảng WorkoutPackages
            $table->foreign('workout_packages_id')->references('id')->on('workout_packages')->onDelete('cascade');
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