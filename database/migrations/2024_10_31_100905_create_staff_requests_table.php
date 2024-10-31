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
            $table->string('new_email')->nullable();
            $table->text('new_avatar')->nullable();
            $table->text('new_address')->nullable();
            $table->text('new_phone_number')->nullable();
            $table->text('certificate')->nullable();
            $table->tinyInteger('status');
            $table->timestamp('approved_at');
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
