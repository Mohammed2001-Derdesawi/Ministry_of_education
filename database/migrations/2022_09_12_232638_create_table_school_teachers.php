<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableSchoolTeachers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_teacher', function (Blueprint $table) {

            $table->foreignId('school_id')->constrained('schools')->onDelete('cascade');
            $table->foreignId('Specialization_id')->constrained('Specializations')->onDelete('cascade');
            $table->integer('teachers_num');
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
        Schema::dropIfExists('school_teacher');
    }
}
