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
        Schema::create('video_feedback', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('video_id');
            $table->unsignedBigInteger('pt_id'); // PT đánh giá video
            $table->text('feedback')->comment('Phản hồi của PT cho video');
            $table->timestamps();

            $table->foreign('video_id')->references('id')->on('user_videos')->onDelete('cascade');
            $table->foreign('pt_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('video_feedbacks');
    }
};
