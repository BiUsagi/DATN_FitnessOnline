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
        Schema::create('workout_packages', function (Blueprint $table) {
            $table->id(); // ID chính (PK)
            $table->string('package_name'); // Tên gói
            $table->text('image')->nullable(); //Hình ảnh
            $table->text('description'); // Mô tả gói
            $table->string('level'); // Cấp độ (ví dụ Beginner, Intermediate, Advanced)
            $table->integer('price',8); // Giá gói
            $table->integer('duration_days'); // Thời lượng gói (ngày, tháng...)
            $table->unsignedBigInteger('staff_id'); // ID huấn luyện viên (FK)
            $table->string('goal')->nullable(); // Mục tiêu tập luyện
            $table->boolean('status')->default(false);
            $table->timestamps();                // Thời gian tạo và cập nhật          
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workout_packages');
    }
};