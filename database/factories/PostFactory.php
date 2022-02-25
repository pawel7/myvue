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
        $user_id = random_int(1, 10);
        return [
            'title' => "Post created by user #$user_id. ".$this->faker->text(20),
            'body'  => $this->faker->text(100),
            'user_id' => $user_id
        ];
    }
}
