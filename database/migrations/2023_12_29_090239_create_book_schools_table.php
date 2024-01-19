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
        Schema::create('book_schools', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('book_id'); // Ensure this is unsigned
            $table->foreign('book_id')->references('id')->on('book_details'); 
            $table->unsignedBigInteger('school_id'); // Ensure this is unsigned
            $table->foreign('school_id')->references('id')->on('school_details'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_schools');
    }
};
