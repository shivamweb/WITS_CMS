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
        Schema::create('school_details', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('user_type')->nullable();
            $table->string('image')->nullable();
            $table->text('school_name')->nullable();
            $table->string('email')->unique();
            $table->text('password');
            $table->integer('mobile_number')->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('address')->nullable();
            $table->integer('pin_code')->nullable();
            $table->text('city')->nullable();
            $table->text('school_zone')->nullable();
            $table->text('faculity_name')->nullable();
            $table->text('faculity_email')->nullable();
            $table->text('faculity_mobileno')->nullable();
            $table->text('faculity_gender')->nullable();
            $table->string('school_doc_image')->nullable();
            $table->text('designation')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('school_details');
    }
};
