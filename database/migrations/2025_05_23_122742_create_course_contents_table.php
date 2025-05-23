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
        Schema::create('course_contents', function (Blueprint $table) {
            $table->id();
            $table->string('content_name');
            $table->text('content_description')->nullable();
            $table->unsignedBigInteger('course_id');
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->string('content_type');
            $table->string('content_url')->nullable();
            $table->integer('content_order')->default(0);
            $table->boolean('is_free')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_contents');
    }
};
