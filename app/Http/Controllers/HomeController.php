<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Itineraries;
use App\Models\User;
use App\Models\Favorites;

class HomeController extends Controller
{
    public function index()
    {
        $itineraries = \App\Models\Itineraries::where('featured','1')
        ->where('status','published')
        ->get();
        $users = User::limit('8')->get();
        return view('frontend.pages.home')->with('itineraries', $itineraries)->with('user')->with('users', $users);
    }
    public function username($username = '')
    {
        if(!empty($username)) {
            $user = User::where('username', $username)->with('favorites.itineraries')->first();
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
        return view('frontend.pages.single-itinerary',compact('itinerary'));
    }

    public function favourites(Request $request)
    {
        $output = array();
        $id = $request->input('id');

        $query = Favorites::where('user_id',Auth::guard('user')->user()->id)
        ->where('itineraries_id',$id)->get();
        if(count($query) == 1)
        {
            $output['error'] = 'Already in List';
        }
        else
        {
            $arr = new Favorites;
            $arr->user_id = Auth::guard('user')->user()->id;
            $arr->itineraries_id = $id;

            $arr->save();

            $output['success'] = 'Added Successfully';
        }

        echo json_encode($output);
    }

    public function removefavourites(Request $request)
    {
        $output = array();
        $id = $request->input('id');

        $query = Favorites::where('user_id',Auth::guard('user')->user()->id)
        ->where('itineraries_id',$id)->delete();

        $output['success'] = 'Deleted Successfully';

        echo json_encode($output);
    }
}
