<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
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
        $output = '';

        $firstname = $request->input('firstname');
        $email = $request->input('email');
        $password = $request->input('password');
        $lastname = $request->input('lastname');
        $username = $request->input('username');
        $confirm_password = $request->input('confirm_password');

        $q1 = User::where('email',$email)->get();
        if(count($q1) == 1)
        {
            $output = 'erroremail';
        }
        $q2 = User::where('username',$username)->get();
        if(count($q2) == 1)
        {
            $output = 'errorusername';
        }

        $user = new User;
        $user->name = $firstname;
        $user->lastname = $lastname;
        $user->username = $username;
        $user->email = $email;
        $user->password = Hash::make($password);
        $user->confirmpassword = Hash::make($confirm_password);
        $user->save();

        $credentials = $request->only('email', 'password');
        $attempt = Auth::guard('user')->attempt($credentials);
        if ($attempt) {

            $output = 'success';
        }
        else
        {
            $output ='registrationfailed';
        }
        echo $output;
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

    public function registerusernameexistance(Request $request)
    {
        $output = '';
        $username = $request->input('username');

        if($username == '')
        {
            $output = 'error';
        }
        
        $query = User::withTrashed()->where('username',$username)->get();
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
