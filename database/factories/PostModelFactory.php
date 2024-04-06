<?php

namespace Database\Factories;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PostModel>
 */
class PostModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = $this->faker;
        $userIds = User::pluck('id')->toArray();

        return [
            'title' => $faker->sentence,
            'body' => $faker->paragraph,
            'image' => $faker->image('public/storage/images', 640, 480, null, false),
            'user_id' => $faker->randomElement($userIds),
        ];
    }
}
