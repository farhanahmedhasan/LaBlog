<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $randomNumber = $this->faker->numberBetween($min = 1, $max = 5);

        return [
            'title' => $this->faker->unique()->sentence(),
            'excerpt' => $this->faker->realText($maxNbChars = 50),
            'body' => $this->faker->paragraph($nbSentences = $randomNumber),
            'min_to_read' => $randomNumber,
            'image_path' => $this->faker->imageUrl(640,480),
            'is_published' => false
        ];
    }
}
