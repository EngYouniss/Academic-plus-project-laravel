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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('course_name');
            $table->string('course_code')->unique();
            $table->text('course_description')->nullable();
            $table->unsignedBigInteger('semester_id');
            $table->unsignedBigInteger('level_id');
            $table->unsignedBigInteger('department_id');
            $table->unsignedBigInteger('college_id');
            $table->unsignedBigInteger('university_id');

            $table->foreign('semester_id')->references('id')->on('semesters')->onDelete('restrict');
            $table->foreign('level_id')->references('id')->on('levels')->onDelete('restrict');
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('restrict');
            $table->foreign('college_id')->references('id')->on('colleges')->onDelete('restrict');
            $table->foreign('university_id')->references('id')->on('universities')->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
