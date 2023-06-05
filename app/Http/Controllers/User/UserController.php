<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Itineraries;
use Illuminate\Support\Facades\Hash;


use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('user.home');
    }

    public function profile()
    {
        $user = Auth::guard('user')->user();

        $user_loggedin = Auth::guard('user')->user();

        $user = User::where('id', $user_loggedin->id)->with('favorites.itineraries')->first();

        $itineraries = $user->itineraries;
        $isloggedin = true;

        $tagsnames = array();
        if(!empty($username)) {
            $user = User::where('username', $username)->with('favorites.itineraries')->first();
            $itineraries = $user->itineraries;
            foreach($itineraries as $itineraries)
            {
                $singleitinerary = Itineraries::where('id',$itineraries->id)->first();
                $tags = json_decode($singleitinerary->tags);
                foreach($tags as $tags)
                {
                    $tag = Tags::where('id',$tags)->first();

                    array_push($tagsnames,$tag->name);
                }
            }
        }


        $singletag = array_unique($tagsnames);

        return view('frontend.pages.profile')->with('user',$user)->with('itineraries', $itineraries)->with('isloggedin',$isloggedin)->with('singletag', $singletag);
    }

    public function profileupdate(Request $request)
    {
        $rules = [
            'username'     =>  'required|string|unique:users,username,'.$request->id,
            'email'     =>  'required|string',
		];

		$validator = Validator::make($request->all(),$rules);
		if ($validator->fails()) {
			return back()
			->withInput()
			->withErrors($validator);
		}
		else{
            $data = $request->input();

			try{
                $user = User::find($data['id']);
                $user->username = $data['username'];
                $user->password = Hash::make($request['new_password']);
                $user->email = $data['email'];
                $user->save();

                return redirect('/profile')->with('success',"Updated Successfully")->with('user');
			}
			catch(Exception $e){
				return back()->with('error',"Error Occured");
			}
		}
    }

    public function bioupdate(Request $request)
    {
        $rules = [
            'bio'     =>  'required|string',
		];

		$validator = Validator::make($request->all(),$rules);
		if ($validator->fails()) {
			return back()
			->withInput()
			->withErrors($validator);
		}
		else{
            $data = $request->input();

			try{
                $user = User::find($data['id']);
                $user->bio = $data['bio'];
                $user->save();

                if($request->hasFile('file'))
                {
                    $file = $request->file('file');
                    $input['file'] = time().'.'.$file->getClientOriginalExtension();

                    $destinationPath = public_path('/frontend/profile_pictures');
                    $file->move($destinationPath, $input['file']);

                    $user = User::find($data['id']);
                    $user->profile = $input['file'];
                    $user->save();
                }


                return redirect('/profile')->with('success',"Updated Successfully");
			}
			catch(Exception $e){
				return back()->with('error',"Error Occured");
			}
		}
    }

    public function socialprofileupdate(Request $request)
    {
        $data = $request->input();

        $user = User::find($data['id']);
        $user->facebook = $data['facebook'];
        $user->twitter = $data['twitter'];
        $user->instagram = $data['instagram'];
        $user->tiktok = $data['tiktok'];
        $user->website = $data['website'];

        $user->save();

        return redirect('/profile')->with('success',"Updated Successfully")->with('user');
    }
}
