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
        Schema::create('collections', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); // Unique name for the collection
            $table->string('slug')->unique(); // Unique slug for the collection
            $table->text('description')->nullable(); // Optional description of the collection
            $table->string('image')->nullable(); // Optional image for the collection
            $table->boolean('is_active')->default(true); // Indicates if the collection is active
            $table->boolean('is_featured')->default(false); // Indicates if the collection is featured
            $table->foreignId('brand_id')
                ->nullable()
                ->constrained('brands')
                ->onDelete('set null'); // Foreign key to brands table, nullable if no brand is associated
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('collections');
    }
};
