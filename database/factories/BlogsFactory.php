<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blogs>
 */
class BlogsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
            'slug' => $this->faker->slug(),
            'category' => $this->faker->sentence(),
            'author' => $this->faker->name(),
            'body' => $this->faker->paragraph(),
            'image' => $this->faker->imageUrl(),
            'status' => $this->faker->randomElement(['draft', 'published'])
        ];
    }
}
