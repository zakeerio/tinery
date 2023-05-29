<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Itineraries;
use App\Models\ItineraryDays;

class ItineraryActivities extends Model
{
    use HasFactory;

    public function itineraries()
    {
        return $this->belongsTo(Itineraries::class);
    }

    public function days()
    {
        return $this->hasMany(ItineraryDays::class);
    }
}
