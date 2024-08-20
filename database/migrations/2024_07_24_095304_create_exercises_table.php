<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExercisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('exercises')) {
            Schema::create('exercises', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('id_gym_package');
                $table->string('name_exercise');
                $table->text('description')->nullable();
                $table->text('video_exercise')->nullable();
                $table->timestamps();

                $table->foreign('id_gym_package')->references('id')->on('gym_packages')->onDelete('cascade');
            });
        }
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exercises');
    }
}