<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Tags;
use Illuminate\Support\Facades\Validator;
use App\Models\Itineraries;
use App\Models\User;
use App\Models\Favorites;
use Illuminate\Support\Str;

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

    public function create_itinerary_load()
    {
        $array = new Itineraries;
        $array->title = '';
        $array->slug = '';
        $array->user_id = '0';
        $array->save();
        return redirect('/create_itinerary/'.$array->id);
    }

    public function create_itinerary($itineraryid)
    {
        $tags = Tags::get();
        $itinerary = Itineraries::find($itineraryid);
        return view('frontend.pages.create-itinerary',compact('itinerary','itineraryid','tags'));
    }

    public function itineraries_store(Request $request)
    {
        $rules = [
            'title' => 'required|max:255',
        ];

        $messages = [
            'title.required' => 'The title field is required.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }
        else{
            $data = $request->input();

            $array = Itineraries::find($data['id']);
            $array->title = $data['title'];
            $array->slug = Str::slug($data['slug']);
            $array->description = $data['description'];
            $array->tags = json_encode($data['tags']);
            $array->address_street = $data['address_street'];
            $array->duration = $data['duration'];
            $array->website = $data['website'];
            $array->user_id = auth('user')->user()->id;

            $array->save();

        }
        // Logic for storing the data goes here...
        return redirect('/create_itinerary/'.$array->id)->with('success','Updated Successfully');
    }
}
