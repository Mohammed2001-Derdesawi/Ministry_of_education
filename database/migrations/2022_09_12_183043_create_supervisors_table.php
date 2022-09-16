<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupervisorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supervisors', function (Blueprint $table) {
            // المشرفين
            $table->id();
            $table->string('name');
            $table->enum('gender',['male','female']);
            $table->string('civil');
            $table->foreignId('specialization_id')->constrained('specializations')->cascadeOnDelete();
            $table->unsignedBigInteger('direction_id')->nullable();
            $table->foreign('direction_id')->references('id')->on('directions')->nullable()->nullOnDelete();
            $table->unsignedBigInteger('old_direction_id')->nullable();
            $table->foreign('old_direction_id')->references('id')->on('old_directions')->nullable()->nullOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('supervisors');
    }
}
