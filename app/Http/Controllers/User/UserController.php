<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
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
        return view('frontend.pages.profile');
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

                return redirect('/profile')->with('success',"Updated Successfully");
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

        return redirect('/profile')->with('success',"Updated Successfully");
    }
}
