<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Letter>
 */
class LetterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'letter' => fake()->randomLetter(),
            'type' => fake()->word(),
            'sound' => fake()->url(),
            'image' => fake()->imageUrl(640,480),
            'video' => fake()->url()
        ];
    }
}
