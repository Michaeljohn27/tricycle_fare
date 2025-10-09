<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Fare;
use Illuminate\Http\Request;

class FareController extends Controller
{
    public function index()
    {
        return response()->json(Fare::all(), 200, [], JSON_PRETTY_PRINT);
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'origin' => 'required|string|max:255',
            'destination' => 'required|string|max:255',
            'baseFare' => 'required|numeric',
            'distance' => 'required|numeric',
            'discount' => 'nullable|numeric',
            'time' => 'required|date_format:H:i:s',
            'final_fare' => 'required|numeric',
        ]);

        $fare = Fare::create($validated);

        return response()->json($fare, 201, [], JSON_PRETTY_PRINT);
    }
    public function show(string $id)
    {
        return response()->json(Fare::findOrFail($id), 200, [], JSON_PRETTY_PRINT);
    }
    public function update(Request $request, string $id)
    {
        $fare = Fare::findOrFail($id);

        $validated = $request->validate([
            'origin' => 'sometimes|required|string|max:255',
            'destination' => 'sometimes|required|string|max:255',
            'baseFare' => 'sometimes|required|numeric',
            'distance' => 'sometimes|required|numeric',
            'discount' => 'nullable|numeric',
            'time' => 'sometimes|required|date_format:H:i:s',
            'final_fare' => 'sometimes|required|numeric',
        ]);

        $fare->update($validated);

        return response()->json($fare, 200, [], JSON_PRETTY_PRINT);
    }
    public function destroy(string $id)
    {
        $fare = Fare::findOrFail($id);
        $fare->delete();

        return response()->json(null, 204);
    }
}
