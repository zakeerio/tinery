<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Itineraries;
use App\Models\ItineraryActivities;

class ItineraryDays extends Model
{
    use HasFactory;

    public function itineraries()
    {
        return $this->belongsTo(Itineraries::class);
    }

    public function itineraryactivities()
    {
        return $this->belongsTo(ItineraryActivities::class);
    }
    
}
