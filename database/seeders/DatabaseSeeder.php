<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
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
        Post::factory(100)->create();
        Category::factory(5)->create();

        User::factory()->create([
            'name' => 'Abderrazzak Lakhtyari',
            'email' => 'lakhtyari.abderrazzak@gmail.com',
            'pasword' => bcrypt('123456789'),
            'status' => 'admin'
        ]);
    }
}
