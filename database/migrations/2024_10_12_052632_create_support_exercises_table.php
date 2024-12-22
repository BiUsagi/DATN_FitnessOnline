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
        Schema::create('support_exercises', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('exercise_id'); // Khóa ngoại đến bảng exercises
            $table->unsignedBigInteger('user_id'); // Khóa ngoại đến bảng users
            $table->unsignedBigInteger('staff_id'); // Khóa ngoại đến bảng staff
            $table->integer('rep')->nullable();
            $table->text('content');
            $table->timestamps();

            // Đặt ràng buộc khóa ngoại
            $table->foreign('exercise_id')->references('id')->on('exercises')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('staff_id')->references('id')->on('staff')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('support_exercises');
    }
};