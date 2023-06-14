<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Itineraries;

class ItineraryLocations extends Model
{
    use HasFactory;

    public function itineraries()
    {
        return $this->hasMany(Itineraries::class);
    }
}
