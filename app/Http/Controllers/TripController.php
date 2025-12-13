<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Trip;
use Illuminate\Http\Request;

class TripController extends Controller
{
    public function index()
    {
        return response()->json(Trip::with(['passenger', 'driver'])->get(), 200, [], JSON_PRETTY_PRINT);
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'passenger_id' => 'required|exists:users,id',
            'driver_id' => 'required|exists:users,id',
            'trip_status' => 'required|string|max:255',
            'start_location' => 'required|string|max:255',
            'end_location' => 'required|string|max:255',
            'distance' => 'required|numeric',
        ]);

        $trip = Trip::create($validated);

        return response()->json($trip, 201, [], JSON_PRETTY_PRINT);
    }
    public function show(string $id)
    {
        return response()->json(Trip::with(['passenger', 'driver'])->findOrFail($id), 200, [], JSON_PRETTY_PRINT);
    }
    public function update(Request $request, string $id)
    {
        $trip = Trip::findOrFail($id);

        $validated = $request->validate([
            'passenger_id' => 'sometimes|required|exists:users,id',
            'driver_id' => 'sometimes|required|exists:users,id',
            'trip_status' => 'sometimes|required|string|max:255',
            'start_location' => 'sometimes|required|string|max:255',
            'end_location' => 'sometimes|required|string|max:255',
            'distance' => 'sometimes|required|numeric',
        ]);

        $trip->update($validated);

        return response()->json($trip, 200, [], JSON_PRETTY_PRINT);
    }
    public function destroy(string $id)
{
    $trip = Trip::findOrFail($id);
    $trip->delete();

    return response()->json(null, 201);
}
}
