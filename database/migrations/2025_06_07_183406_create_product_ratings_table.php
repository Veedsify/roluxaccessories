<?php

use App\Models\Product;
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
        Schema::create('product_ratings', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Product::class)->constrained()->onDelete('cascade');
            $table->unsignedTinyInteger('rating')->default(0); // Rating from 0 to 5
            $table->text('review')->nullable(); // Optional review text
            $table->string('reviewer_name')->nullable(); // Optional name of the reviewer
            $table->string('reviewer_email')->nullable(); // Optional email of the reviewer
            $table->boolean('is_verified_purchase')->default(false); // Indicates if the review is from a verified purchase
            $table->timestamp('reviewed_at')->nullable(); // Timestamp when the review was submitted
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_ratings');
    }
};
