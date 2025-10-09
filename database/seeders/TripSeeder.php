<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Trip;

class TripSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Trip::create([
            'passenger_id' => 1,
            'driver_id' => 2,
            'trip_status' => 'completed',
            'start_location' => 'Location A',
            'end_location' => 'Location B',
            'distance' => 5.0,
        ]);

        Trip::create([
            'passenger_id' => 2,
            'driver_id' => 1,
            'trip_status' => 'in_progress',
            'start_location' => 'Location C',
            'end_location' => 'Location D',
            'distance' => 10.0,
        ]);
    }
}
