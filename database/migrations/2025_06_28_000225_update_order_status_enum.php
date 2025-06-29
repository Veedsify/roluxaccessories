<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // For PostgreSQL, we need to use raw SQL to update the enum
        DB::statement(
            "ALTER TABLE orders DROP CONSTRAINT IF EXISTS orders_status_check"
        );

        // Remove default first
        DB::statement("ALTER TABLE orders ALTER COLUMN status DROP DEFAULT");

        // Change column to text temporarily
        DB::statement("ALTER TABLE orders ALTER COLUMN status TYPE TEXT");

        // Drop the old enum type if it exists
        DB::statement("DROP TYPE IF EXISTS order_status_enum CASCADE");

        // Create new enum type
        DB::statement(
            "CREATE TYPE order_status_enum AS ENUM ('pending', 'confirmed', 'processing', 'completed', 'cancelled', 'shipped', 'delivered')"
        );

        // Change column back to enum with new values
        DB::statement(
            "ALTER TABLE orders ALTER COLUMN status TYPE order_status_enum USING status::order_status_enum"
        );

        // Set default value
        DB::statement(
            "ALTER TABLE orders ALTER COLUMN status SET DEFAULT 'pending'"
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Revert to original enum values
        DB::statement("ALTER TABLE orders ALTER COLUMN status TYPE TEXT");
        DB::statement("DROP TYPE IF EXISTS order_status_enum CASCADE");
        DB::statement(
            "CREATE TYPE order_status_enum AS ENUM ('pending', 'processing', 'completed', 'cancelled', 'shipped', 'delivered')"
        );
        DB::statement(
            "ALTER TABLE orders ALTER COLUMN status TYPE order_status_enum USING status::order_status_enum"
        );
        DB::statement(
            "ALTER TABLE orders ALTER COLUMN status SET DEFAULT 'pending'"
        );
    }
};
