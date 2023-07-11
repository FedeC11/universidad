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
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_student_fk');
            $table->unsignedBigInteger('id_course_fk');
            $table->string('text');
            $table->boolean('read_it');
            $table->decimal('calificacion', 4, 2)->nullable();
            $table->foreign('id_course_fk')->references('id')->on('courses');
            $table->foreign('id_student_fk')->references('id')->on('students');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notes');
    }
};
