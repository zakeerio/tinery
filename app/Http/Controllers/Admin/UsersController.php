<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Models\User;
use App\Models\Itineraries;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use App\Interfaces\AdminInterface;
use Illuminate\Support\Facades\Validator;

class UsersController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->setPageTitle("Users","Users List");
        $data = User::get();
        return view('admin.users.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->setPageTitle("Users","Create User");
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',    
            'email' => 'required|string|email|unique:users|max:255',
            'password' => 'required|string|min:8',
            'confirm_password' => 'required_with:password|same:password|min:8'
		];

		$validator = Validator::make($request->all(),$rules);
		if ($validator->fails()) {
			return back()->with('error','Fields Error')
			->withInput()
			->withErrors($validator);
		}
		else{
            $data = $request->input();

			try{
                $user = new User;
                $user->name = $data['name'];
                $user->lastname = $data['lastname'];
                $user->username = $data['username'];
                $user->email = $data['email'];
                $user->password = Hash::make($data['password']);
                $user->confirmpassword = Hash::make($data['password']);
                $user->facebook = $data['facebook'];
                $user->twitter = $data['twitter'];
                $user->instagram = $data['instagram'];
                $user->tiktok = $data['tiktok'];
                $user->website = $data['website'];
                $user->tags = $data['tags'];
                $user->bio = $data['bio'];

                if($request->hasFile('file'))
                {
                    $file = $request->file('file');
                    $input['file'] = time().'.'.$file->getClientOriginalExtension();

                    $destinationPath = public_path('/frontend/profile_pictures');
                    $file->move($destinationPath, $input['file']);

                    $user->profile = $input['file'];
                }
        
                $user->save();

                return redirect()->route('admin.users.index')->with('success',"Registered Successfully");
			}
			catch(Exception $e){
				return back()->with('error',"Error Occured");
			}
		}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->setPageTitle("Users","View User");
        $user = User::findOrFail($id);
        return view('admin.users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->setPageTitle("Users","Edit User");
        $user = User::find($id);
    
        return view('admin.users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,'.$id,    
            'email' => 'required|string|max:255|email|unique:users,email,'.$id,
		];

		$validator = Validator::make($request->all(),$rules);
		if ($validator->fails()) {
			return back()->with('error','Fields Error')
			->withInput()
			->withErrors($validator);
		}
		else{
            $data = $request->input();

			try{
                $user = User::find($id);
                $user->name = $data['name'];
                $user->lastname = $data['lastname'];
                $user->username = $data['username'];
                $user->email = $data['email'];
                $user->password = Hash::make($data['password']);
                $user->confirmpassword = Hash::make($data['password']);
                $user->facebook = $data['facebook'];
                $user->twitter = $data['twitter'];
                $user->instagram = $data['instagram'];
                $user->tiktok = $data['tiktok'];
                $user->website = $data['website'];
                $user->tags = $data['tags'];
                $user->bio = $data['bio'];

                if($request->hasFile('file'))
                {
                    $file = $request->file('file');
                    $input['file'] = time().'.'.$file->getClientOriginalExtension();

                    $destinationPath = public_path('/frontend/profile_pictures');
                    $file->move($destinationPath, $input['file']);

                    $user->profile = $input['file'];
                }
        
                $user->save();

                return redirect()->route('admin.users.index')->with('success',"Updated Successfully");
			}
			catch(Exception $e){
				return back()->with('error',"Error Occured");
			}
		}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id)->delete();
        Itineraries::where('user_id',$id)->delete();
        if(!$user){
			return $this->responseRedirectBack('Error occurred while deleting user', 'error', true, true);
		}
		return $this->responseRedirect('admin.users.index', 'User has been deleted successfully', 'success');

    }
}
