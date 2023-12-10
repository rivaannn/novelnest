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

    /**
     * Indicate that the model's status is draft.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blogs>
     */

    public function draft(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'status' => 'draft',
            ];
        });
    }

    /**
     * Indicate that the model's status is published.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blogs>
     */

    public function published(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'status' => 'published',
            ];
        });
    }

    /**
     * Indicate that the model's status is published.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blogs>
     */

    public function withImage(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'image' => $this->faker->imageUrl(),
            ];
        });
    }

    /**
     * Indicate that the model's status is published.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blogs>
     */

    public function withoutImage(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'image' => null,
            ];
        });
    }

    /**
     * Indicate that the model's status is published.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blogs>
     */

    public function withAuthor(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'author' => $this->faker->name(),
            ];
        });
    }

    /**
     * Indicate that the model's status is published.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blogs>
     */

    public function withoutAuthor(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'author' => null,
            ];
        });
    }

    /**
     * Indicate that the model's status is published.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blogs>
     */

    public function withCategory(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'category' => $this->faker->sentence(),
            ];
        });
    }

    /**
     * Indicate that the model's status is published.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blogs>
     */

    public function withoutCategory(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'category' => null,
            ];
        });
    }
}
