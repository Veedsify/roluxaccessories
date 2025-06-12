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
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')
                ->constrained('orders')
                ->onDelete('cascade'); // Foreign key to orders table
            $table->foreignId('product_id')
                ->constrained('products')
                ->onDelete('cascade'); // Foreign key to products table
            $table->json('product_details'); // JSON field for additional product details (e.g., size, color)
            $table->integer('quantity'); // Quantity of the product in the order
            $table->decimal('price', 10, 2); // Price of the product at the time of order
            $table->decimal('total', 10, 2); // Total price for this order detail (quantity * price)
            $table->string('status')->default('pending'); // Status of the order detail (e.g., pending, shipped, delivered)
            $table->string('tracking_number')->nullable(); // Tracking number for this order detail, if applicable
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_details');
    }
};
