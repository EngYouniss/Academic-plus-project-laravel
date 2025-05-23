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
         Schema::create('colleges', function (Blueprint $table) {
            $table->id();
            $table->string('college_name');
            $table->text('college_description')->nullable();
            $table->unsignedBigInteger('university_id');
            $table->foreign('university_id')->references('id')->on('universities')->onDelete('cascade');
            $table->string('college_logo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('colleges');
    }
};
