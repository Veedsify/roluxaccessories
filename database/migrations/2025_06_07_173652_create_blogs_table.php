<?php

use App\Models\BlogCategory;
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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(BlogCategory::class)->constrained();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->json('tag')->nullable();
            $table->string('title');
            $table->string('thumbImg')->nullable();
            $table->string('coverImg')->nullable();
            $table->longText('description')->nullable();
            $table->longText("content");
            $table->string('slug')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
