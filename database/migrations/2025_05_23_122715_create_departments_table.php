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
         Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->string('department_name');
            $table->text('department_description')->nullable();
            $table->unsignedBigInteger('college_id');
            $table->foreign('college_id')->references('id')->on('colleges')->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('departments');
    }
};
