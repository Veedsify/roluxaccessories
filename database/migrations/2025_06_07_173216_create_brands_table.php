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
        Schema::create('brands', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); // Unique name for the brand
            $table->string('slug')->unique(); // Unique slug for the brand
            $table->string('logo')->nullable(); // Optional logo for the brand
            $table->text('description')->nullable(); // Optional description of the brand   
            $table->string('website')->nullable(); // Optional website URL for the brand
            $table->string('contact_email')->nullable(); // Optional contact email for the brand
            $table->string('contact_phone')->nullable(); // Optional contact phone number for the brand
            $table->boolean('is_active')->default(true); // Indicates if the brand is active
            $table->boolean('is_featured')->default(false); // Indicates if the brand is featured
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brands');
    }
};
