<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools', function (Blueprint $table) {
            // المدرسة
            $table->id();
            $table->string('name');
            $table->enum('level',['children','secondary','primary','medium']);
            $table->enum('building_type',['state','tenant','loaned']);
            $table->enum('work_time',['night','morning']);
            $table->enum('gender',['male','female']);
            $table->string('ministerial_number');
            $table->integer('teachers_num');
            $table->integer('students_num');
            $table->integer('agents_num');
            $table->integer('mentors_num');
            $table->integer('activity_pioneers_num');
            $table->integer('exam_preparers_num');
            $table->integer('computer_laboratories_num');
            $table->string('street');
            $table->string('region');
            $table->integer('admins_num');  // عدد الإدرايين
            $table->boolean('status')->default(true);
            $table->foreignId('school_rating_id')->constrained('school_ratings');
            $table->unsignedBigInteger('direction_id')->nullable();
            $table->foreign('direction_id')->references('id')->on('directions')->nullable()->nullOnDelete();
            $table->unsignedBigInteger('old_direction_id')->nullable();
            $table->foreign('old_direction_id')->references('id')->on('old_directions')->nullable()->nullOnDelete();

            $table->foreignId('director_id')->constrained('directors');

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
        Schema::dropIfExists('schools');
    }
}
