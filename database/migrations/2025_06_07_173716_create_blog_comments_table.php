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
        Schema::create('blog_comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parent_id')->nullable(); // Optional parent comment ID for threaded comments
            $table->foreignId('user_id')
                ->nullable()
                ->constrained()
                ->onDelete('cascade'); // Foreign key to users table
            $table->foreignId('blog_id')
                ->constrained('blogs')
                ->onDelete('cascade'); // Foreign key to blog_posts table
            $table->text('comment'); // The comment text
            $table->string('commenter_name')->nullable(); // Optional name of the commenter
            $table->string('commenter_email')->nullable(); // Optional email of the commenter
            $table->boolean('is_verified')->default(false); // Indicates if the comment is verified
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog_comments');
    }
};
