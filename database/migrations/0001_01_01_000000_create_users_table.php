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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('user_name');
            $table->string('email')->unique();
            $table->text('avatar')->default('no-image.jpg');
            $table->text('address')->nullable();
            $table->date('birthday')->nullable();
            $table->tinyInteger('gender')->nullable()->comment('1 - Nam, 0 - Nữ, 2 - Khác');
            $table->string('password');
            $table->text('phone_number')->nullable();
            $table->text('token')->nullable();
            $table->boolean('is_verified')->default(0);
            $table->tinyInteger('status')->nullable()->comment('1 - block, 0 - bình thường, 2 - Khác');
            $table->integer('role_012')->default('0')->comment('1 - pt, 0 - user, 2 - admin');
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};