<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Itineraries;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        $itineraries = \App\Models\Itineraries::where('featured','1')
        ->where('status','published')
        ->get();

        return view('frontend.pages.home')->with('itineraries', $itineraries);
    }
    public function username($username = '')
    {
        // if(!empty($username)) {
        //     if(User::where('username', $username)->count() >  0) {
        //         dd('user found');
        //     } else {
        //         dd('user not found');
        //     }
        //     dd($username);
        // }
        // return view('frontend.pages.home');
    }
    public function itinerary($slug)
    {
        $itinerary = Itineraries::where('slug',$slug)->first();
        return view('frontend.pages.about',compact('itinerary'));
    }

}
