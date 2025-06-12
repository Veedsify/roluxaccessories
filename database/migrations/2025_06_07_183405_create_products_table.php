<?php

use App\Models\Brand;
use App\Models\Category;
use App\Models\Collection;
use App\Models\ProductType;
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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Category::class)->nullable()->constrained()->nullOnDelete();
            $table->foreignIdFor(ProductType::class)->constrained()->nullOnDelete()->nullable();
            $table->foreignIdFor(Collection::class)->nullable()->constrained()->nullOnDelete();
            $table->foreignIdFor(Brand::class)->nullable()->constrained()->nullOnDelete();
            $table->string('name')->nullable();
            $table->enum("gender", ["Male", "Female"]);
            $table->boolean("new")->default(false);
            $table->boolean("active")->default(true);
            $table->boolean("sale")->default(false);
            $table->integer("rate")->default(0);
            $table->integer("price")->default(0);
            $table->integer("originPrice")->default(0);
            $table->string('slug')->unique()->nullable();
            $table->integer("sold")->default(0);
            $table->boolean("is_featured")->default(false);
            $table->integer("qunatity")->default(0);
            $table->text('description')->nullable();
            $table->string("action")->default("buy now");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
