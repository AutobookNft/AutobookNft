<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'comment' => $this->faker->paragraph,
            'post_id' => $this->faker->numberBetween(1, 1000),
            'author_id' => $this->faker->numberBetween(1, 100),
        ];
    }
}
