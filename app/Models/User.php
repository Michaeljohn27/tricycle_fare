<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'firstName',
        'lastName',
        'email',
        'password',
        'mobileNumber',
    ];

    protected $hidden = [
        'password',
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    /**
     * Get all trips where the user is a passenger
     */
    public function tripsAsPassenger(): HasMany
    {
        return $this->hasMany(Trip::class, 'passenger_id');
    }

    /**
     * Get all trips where the user is a driver
     */
    public function tripsAsDriver(): HasMany
    {
        return $this->hasMany(Trip::class, 'driver_id');
    }

    /**
     * Check if the user has any trips (as passenger or driver)
     */
    public function hasAnyTrips(): bool
    {
        return $this->tripsAsPassenger()->exists() || $this->tripsAsDriver()->exists();
    }
}