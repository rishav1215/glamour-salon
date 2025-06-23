<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('salons', function (Blueprint $table) {
             $table->id();

            // Foreign key to users table (salon owner)
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            // Basic salon information
            $table->string('name');
            $table->string('contact_number');
            $table->text('description')->nullable();
            $table->string('image'); // main image
            $table->text('gallery')->nullable(); // comma-separated or JSON for additional images

            // Owner information
            $table->string('owner_name');
            $table->string('owner_email');
            $table->string('owner_image');
            $table->text('owner_bio')->nullable();

            // Location
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->string('postal_code');
            $table->string('country');

            // Services
            $table->text('services'); // comma-separated services
            $table->string('specializations')->nullable();

            // Business Info
            $table->string('opening_hours');
            $table->integer('years_in_business')->nullable();
            $table->integer('number_of_stylists')->nullable();
            $table->boolean('accepts_credit_cards')->default(false);

            // Approval status
            $table->boolean('is_approved')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salons');
    }
};
