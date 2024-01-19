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
        Schema::create('book_details', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('image');
            $table->text('book_name')->nullable();
            $table->text('status')->nullable();
            $table->text('stock_status')->nullable();
            $table->decimal('price'); 
            $table->unsignedBigInteger('class_id'); // Ensure this is unsigned
            $table->foreign('class_id')->references('id')->on('classes'); 
            $table->text('description')->nullable();
            $table->text('part')->nullable();
            $table->text('publisher')->nullable();
            $table->integer('quantity')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_details');
    }
};
