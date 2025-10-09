<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Trip>
 */
class TripFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'passenger_id' => \App\Models\User::inRandomOrder()->first()->id,
            'driver_id' => \App\Models\User::inRandomOrder()->first()->id,
            'trip_status' => $this->faker->randomElement(['completed', 'in_progress', 'cancelled']),
            'start_location' => $this->faker->address,
            'end_location' => $this->faker->address,
            'distance' => $this->faker->randomFloat(2, 1, 50),
        ];
    }
}
