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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->nullable() // Allow null for guest addresses
                ->constrained('users')
                ->onDelete('cascade'); // Foreign key to users table
            $table->string('address_line1'); // First line of the address
            $table->string('address_line2')->nullable(); // Second line of the address (optional)
            $table->string('city'); // City of the address  
            $table->string('state'); // State or region of the address
            $table->string('postal_code'); // Postal or ZIP code of the address
            $table->string('country'); // Country of the address
            $table->string('phone_number')->nullable(); // Phone number associated with the address (optional)
            $table->boolean('is_default')->default(false); // Flag to indicate if this is the default address
            $table->boolean('is_billing')->default(false); // Flag to indicate if this is a billing address 
            $table->boolean('is_shipping')->default(false); // Flag to indicate if this is a shipping address
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
