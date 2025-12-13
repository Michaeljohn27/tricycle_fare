<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class FareFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $locations = [
            'Manila', 'Quezon City', 'Makati', 'Taguig', 'Pasig',
            'Mandaluyong', 'San Juan', 'Pasay', 'Parañaque', 'Las Piñas',
            'Muntinlupa', 'Marikina', 'Caloocan', 'Valenzuela', 'Malabon',
            'Navotas', 'Cainta', 'Taytay', 'Antipolo', 'San Mateo'
        ];

        $origin = $this->faker->randomElement($locations);
        
        // Ensure destination is different from origin
        do {
            $destination = $this->faker->randomElement($locations);
        } while ($origin === $destination);

        $baseFare = $this->faker->randomFloat(2, 50, 200);
        $distance = $this->faker->randomFloat(2, 1, 50);
        $hasDiscount = $this->faker->boolean(30); // 30% chance of having a discount
        $discount = $hasDiscount ? $this->faker->randomFloat(2, 5, 30) : null;
        
        // Calculate final fare
        $finalFare = $baseFare + ($distance * 5); // Assuming 5 pesos per km
        if ($discount) {
            $finalFare = $finalFare * (1 - ($discount / 100));
        }

        return [
            'origin' => $origin,
            'destination' => $destination,
            'baseFare' => $baseFare,
            'distance' => $distance,
            'discount' => $discount,
            'time' => $this->faker->time('H:i:s'),
            'final_fare' => round($finalFare, 2),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
