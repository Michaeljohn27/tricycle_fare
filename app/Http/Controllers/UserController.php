<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return response()->json(User::all(), 200, [], JSON_PRETTY_PRINT);
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'mobileNumber' => 'required|string|max:20',
        ]);

        $user = User::create([
            'firstName' => $validated['firstName'],
            'lastName' => $validated['lastName'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'mobileNumber' => $validated['mobileNumber'],
        ]);

        return response()->json($user, 201, [], JSON_PRETTY_PRINT);
    }
    public function show(string $id)
    {
        return response()->json(User::findOrFail($id), 200, [], JSON_PRETTY_PRINT);
    }
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'firstName' => 'sometimes|required|string|max:255',
            'lastName' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'sometimes|required|string|min:8',
            'mobileNumber' => 'sometimes|required|string|max:20',
        ]);

        if ($request->has('password')) {
            $validated['password'] = Hash::make($validated['password']);
        }

        $user->update($validated);

        return response()->json($user, 200, [], JSON_PRETTY_PRINT);
    }
  public function destroy(string $id)
{
    $user = User::findOrFail($id);
    
    // Check if user has any trips
    if ($user->tripsAsPassenger()->exists() || $user->tripsAsDriver()->exists()) {
        return response()->json([
            'message' => 'Cannot delete user because they have associated trips.'
        ], 422);
    }
    
    $user->delete();
    return response()->json(null, 204);
}
}
