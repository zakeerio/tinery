<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Itineraries;

class HomeController extends Controller
{
    public function itinerary($slug)
    {
        $itinerary = Itineraries::where('slug',$slug)->first();
        return view('frontend.pages.about',compact('itinerary'));
    }
}
