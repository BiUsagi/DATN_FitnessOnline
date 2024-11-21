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
    Schema::create('reports', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('comment_id');
        $table->unsignedBigInteger('reported_by'); // ID của người báo cáo
        $table->text('report_content'); // Nội dung báo cáo
        $table->timestamps();

        $table->foreign('comment_id')->references('id')->on('comments')->onDelete('cascade');
        $table->foreign('reported_by')->references('id')->on('users')->onDelete('cascade');
    });
}

    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
