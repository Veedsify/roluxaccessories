<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // For PostgreSQL, we need to drop the old constraint and add a new one
        DB::statement("ALTER TABLE orders DROP CONSTRAINT IF EXISTS orders_status_check");
        DB::statement("ALTER TABLE orders ADD CONSTRAINT orders_status_check CHECK (status IN ('pending', 'confirmed', 'processing', 'completed', 'cancelled', 'shipped', 'delivered'))");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Revert back to the original constraint
        DB::statement("ALTER TABLE orders DROP CONSTRAINT IF EXISTS orders_status_check");
        DB::statement("ALTER TABLE orders ADD CONSTRAINT orders_status_check CHECK (status IN ('pending', 'processing', 'completed', 'cancelled', 'shipped', 'delivered'))");
    }
};
