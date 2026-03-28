<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
   public function run(): void
 {
    // 1. Create 5 Users
    // 2. Each User gets 3 Posts
    // 3. Each Post gets 2 Comments
    \App\Models\User::factory(5)
        ->has(
            \App\Models\Post::factory()->count(3)->hasComments(2)
        )
        ->create();

    // Your manual test user for logging in easily
    \App\Models\User::factory()->create([
        'name' => 'Test User',
        'email' => 'test@example.com',
        'password' => bcrypt('password'), // Always set a password for testing!
    ]);
 }
}
