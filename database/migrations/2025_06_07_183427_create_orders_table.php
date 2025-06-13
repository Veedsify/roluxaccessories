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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('address_id')
                ->nullable()
                ->constrained('addresses'); // Allow null for guest orders
            $table->foreignId('user_id')
                ->nullable() // Allow null for guest orders
                ->constrained('users')
                ->onDelete('cascade'); // Foreign key to users table
            $table->string('order_number')->unique(); // Unique order number
            $table->decimal('total_amount', 10, 2); // Total amount for the order
            $table->enum('status', ['pending', 'processing', 'completed', 'cancelled', 'shipped', 'delivered'])
                ->default('pending');
            // Order status (e.g., pending, completed, cancelled)
            $table->string('tracking_number')->nullable(); // Tracking number for the order shipment
            $table->timestamp('shipped_at')->nullable(); // Timestamp when the order was shipped
            $table->timestamp('delivered_at')->nullable(); // Timestamp when the order was delivered
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
