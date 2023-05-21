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

        return view('frontend.pages.home')->with('itineraries', $itineraries)->with('user');
    }
    public function username($username = '')
    {
        if(!empty($username)) {
            $user = User::where('username', $username)->first();
            $itineraries = $user->itineraries;

            if($user->count() >  0) {
                return view('frontend.pages.profile', compact('user','itineraries'));
            } else {
                abort(403);
            }

        } else {
            abort(403);
        }

    }
    public function itinerary($slug)
    {
        $itinerary = Itineraries::where('slug',$slug)->first();
        return view('frontend.pages.about',compact('itinerary'));
    }

}
