<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Itineraries;

class HomeController extends Controller
{
    public function itinerary_detail($slug)
    {
        $array = Itineraries::where('slug',$slug)->get();
        return view('frontend.pages.about',compact('array'));
    }
}
