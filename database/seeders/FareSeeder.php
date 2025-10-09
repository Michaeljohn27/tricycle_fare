<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Fare;

class FareSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Fare::create([
            'origin' => 'Location A',
            'destination' => 'Location B',
            'baseFare' => 50.00,
            'distance' => 5.0,
            'discount' => 5.00,
            'time' => '00:15:00',
            'final_fare' => 50.00,
        ]);

        Fare::create([
            'origin' => 'Location C',
            'destination' => 'Location D',
            'baseFare' => 70.00,
            'distance' => 10.0,
            'discount' => 10.00,
            'time' => '00:30:00',
            'final_fare' => 60.00,
        ]);
    }
}
