<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        // Validator::make($data, [
        //     'name' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //     'password' => ['required', 'string', 'min:8', 'confirmed'],
        // ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    public function register_custom(Request $request)
    {
        // Validate the user input
        // dd($request->input());
        $rules = [
            'firstname' => 'required|string|max:255',
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
                $user->name = $data['firstname'];
                $user->lastname = $data['lastname'];
                $user->username = $data['username'];
                $user->email = $data['email'];
                $user->password = Hash::make($data['password']);
                $user->confirmpassword = Hash::make($data['password']);
        
                $user->save();

                return redirect('/')->with('success',"Registered Successfully");
			}
			catch(Exception $e){
				return back()->with('error',"Error Occured");
			}
		}
    }
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function showRegistrationForm()
    {
        // dd("TEST");
        return view('frontend.auth.register');
    }

    public function registeremailexistance(Request $request)
    {
        $output = '';
        $email = $request->input('email');
        
        $query = User::withTrashed()->where('email',$email)->get();
        if(count($query) == 1)
        {
            $output = 'error';
        }
        else
        {
            $output = 'success';
        }
        echo $output;
    }
}
