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
        Schema::create('product_rating_comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_rating_id')
                ->constrained('product_ratings')
                ->onDelete('cascade'); // Foreign key to product_ratings table
            $table->unsignedBigInteger(('parent_id'))->nullable(); // Optional parent comment ID for threaded comments
            $table->text('comment'); // The comment text
            $table->string('commenter_name')->nullable(); // Optional name of the commenter
            $table->string('commenter_email')->nullable(); // Optional email of the commenter
            $table->boolean('is_verified_purchase')->default(false); // Indicates if the comment is from a verified purchase
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_rating_comments');
    }
};
