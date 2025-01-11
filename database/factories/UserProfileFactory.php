<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserProfile>
 */
class UserProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'gender' => fake()->randomElement(['MALE', 'FEMALE']),
            'address' => fake()->address(),
            // 'birth' => fake()->date(),
            'phone' => fake()->phoneNumber(),
            'religion' => 'Islam'//fake()->randomElement(['Islam', 'Kristen', 'Hindu', 'Budha']),
        ];
    }
}
