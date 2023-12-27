<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Blogs;

class BlogsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('id_ID');
        for ($i = 0; $i < 10; $i++) {
            Blogs::create([
                'title' => $faker->sentence(),
                'slug' => $faker->slug(),
                'category' => $faker->sentence(),
                'author' => $faker->name(),
                'body' => '<p>' . implode('</p><p>', $faker->paragraphs(20)) . '</p>',
                'status' => $faker->randomElement(['draft', 'published'])
            ]);
        }
    }
}
