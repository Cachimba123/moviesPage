<?php

namespace Database\Factories;

use App\Models\Movie;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Movie>
 */
class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
{
    $title = fake()->unique()->sentence(3);

    return [

        'title' => $title,

        'slug' => Str::slug($title),

        'description' => fake()->paragraphs(
            5,
            true
        ),

        'release_year' => fake()->numberBetween(
            1980,
            2026
        ),

        'duration' => fake()->numberBetween(
            80,
            240
        ),

        'rating_average' => 0
    ];
}
}
