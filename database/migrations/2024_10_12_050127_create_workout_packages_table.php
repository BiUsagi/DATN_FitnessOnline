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
            $table->decimal('price', 8, 2); // Giá gói
            $table->integer('duration'); // Thời lượng gói (ngày, tháng...)
            $table->unsignedBigInteger('staff_id'); // ID huấn luyện viên (FK)
            $table->timestamps();

            // Khóa ngoại (foreign key) liên kết đến bảng Trainer
            $table->foreign('staff_id')->references('id')->on('staff')->onDelete('cascade');
            $table->id();                       // Khóa chính
            $table->foreignId('pt_id')          // Khóa ngoại liên kết đến huấn luyện viên
                  ->constrained('staff')
                  ->onDelete('cascade');
            $table->string('name');             // Tên gói tập
            $table->text('description')->nullable(); // Mô tả gói tập
            $table->string('goal')->nullable(); // Mục tiêu tập luyện
            $table->integer('duration_days');   // Thời gian lộ trình (30, 60, 90 ngày, v.v.)
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