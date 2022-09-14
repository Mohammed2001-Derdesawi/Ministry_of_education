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
            $table->foreignId('direction_id')->constrained('directions')->cascadeOnDelete();
            $table->string('civil');
            $table->foreignId('specialization_id')->constrained('specializations')->cascadeOnDelete();
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
