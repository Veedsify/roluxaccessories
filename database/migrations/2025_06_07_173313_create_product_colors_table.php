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
        Schema::create('product_colors', function (Blueprint $table) {
            $table->id();
            $table->string("name")->nullable();
            $table->string("slug")->nullable();
            $table->string("image")->nullable();
            $table->timestamps();
        });

        Schema::create("product_color_pivot", function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("product_color_id")->contstrained();
            $table->unsignedBigInteger("product_id")->contstrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_colors');
    }
};
