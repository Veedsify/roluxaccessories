<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table("order_details", function (Blueprint $table) {
            $table->string("product_name")->nullable()->after("product_id");
            $table
                ->decimal("product_price", 10, 2)
                ->nullable()
                ->after("product_name");
            $table->string("product_size")->nullable()->after("product_price");
            $table->string("product_color")->nullable()->after("product_size");
            $table->string("product_image")->nullable()->after("product_color");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table("order_details", function (Blueprint $table) {
            $table->dropColumn([
                "product_name",
                "product_price",
                "product_size",
                "product_color",
                "product_image",
            ]);
        });
    }
};
