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
        Schema::create('staff_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('new_name')->nullable();
            $table->string('new_email')->unique();
            $table->text('new_avatar')->nullable();
            $table->text('new_address')->nullable();
            $table->text('new_phone_number')->nullable();
            $table->text('introduction')->nullable();
            $table->text('certificate')->nullable();
            $table->tinyInteger('status')->default(0)->comment('0 - Chờ duyệt, 1 - Đã duyệt, 2 - Bị từ chối');
            $table->timestamp('approved_at')->nullable()->comment('Thời gian phê duyệt yêu cầu');
            $table->timestamps();

            // Khóa ngoại
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff_requests');
    }
};
