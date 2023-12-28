<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Writter;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(5)->create();

        User::factory()->create([
            'name' => 'rivan',
            'email' => 'rivan@gmail.com',
            'image' => 'images/users/default.png',
        ]);
        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'is_admin' => true,
        ]);
        User::factory()->create([
            'name' => 'user',
            'email' => 'user@gmail.com',
        ]);

        $this->call([
            CategorySeeder::class,
            RoleSeeder::class,
            PublishersSeeder::class,
            WritterSeeder::class,
            BookSeeder::class,
            BlogsSeeder::class
        ]);
    }
}