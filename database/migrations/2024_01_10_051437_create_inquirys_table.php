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
        Schema::create('inquirys', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->integer('created_by');
            $table->integer('to');
            $table->text('description');
            $table->string('status')->default('Un-read');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inquirys');
    }
};
