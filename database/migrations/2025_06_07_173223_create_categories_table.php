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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); // Unique name for the category
            $table->string('slug')->unique(); // Unique slug for the category
            $table->text('description')->nullable(); // Optional description of the category
            $table->string('icon')->nullable(); // Optional icon for the category
            $table->string('image')->nullable(); // Optional image for the category
            $table->boolean('is_active')->default(true); // Indicates if the category is active
            $table->boolean('is_featured')->default(false); // Indicates if the category is featured
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
