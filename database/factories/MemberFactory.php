<?php

namespace Database\Factories;

use App\Models\Member;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Member>
 */
class MemberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'membership_id' => fake()->randomNumber(5),
            'name' => fake()->name(),
            'first_name' => fake()->firstName(),
            'street' => fake()->streetName(),
            'house_number' => fake()->randomNumber(2),
            'postal_code' => fake()->postcode(),
            'city' => fake()->city(),
            'phone' => fake()->phoneNumber(),
            'email' => fake()->email(),
            'birth_date' => fake()->date('Y-m-d', '2000-01-01'),
            'join_date' => fake()->date(),
        ];
    }
}
