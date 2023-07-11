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
        Schema::create('student_course', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_grade_fk');
            $table->unsignedBigInteger('id_course_fk');
            $table->unsignedBigInteger('id_student_fk');
            $table->foreign('id_course_fk')->references('id')->on('courses');
            $table->foreign('id_student_fk')->references('id')->on('students');
            $table->foreign('id_grade_fk')->references('id')->on('grades');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_course');
    }
};
