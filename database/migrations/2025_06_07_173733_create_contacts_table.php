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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Name of the contact
            $table->string('email'); // Email address of the contact
            $table->string('phone')->nullable(); // Optional phone number of the contact
            $table->text('message'); // Message or inquiry from the contact
            $table->boolean('is_read')->default(false); // Indicates if the contact message has been read
            $table->boolean('is_responded')->default(false); // Indicates if a response has been sent
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
