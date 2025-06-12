<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'test@example.com',
            'is_admin' => true,
            'is_active' => true,
            'is_verified' => true,
            'user_id' => 'admin_user',
            'role' => 'admin', // customer, admin, vendor
            'status' => 'active', // active, inactive, suspended
            'phone' => '1234567890',
            'country' => 'NGN',
            'address' => '123 Admin Street, Admin City',
            'gender' => 'female',
            'profile_picture' => fake()->imageUrl(640, 480, 'people', true, 'Admin User'),
            'two_factor_secret' => null,
            'last_login_at' => now(),
            'email_verified_at' => now(),
        ]);
    }
}
