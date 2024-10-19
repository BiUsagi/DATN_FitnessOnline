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
        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('staff_name');
            $table->string('email')->unique();
            $table->text('avatar')->default('no-image.jpg');
            $table->tinyInteger('gender')->nullable();
            $table->tinyInteger('rating')->nullable()->default(0)->comment('Đánh giá từ 1 đến 5');
            $table->text('address')->nullable();
            $table->string('password');
            $table->text('phone_number')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff');
    }
};