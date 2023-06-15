<?php

namespace App\Http\Controllers\User\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }

    public function login_new(Request $request)
    {
        // Validate the user input
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to authenticate the user
        $attempt = Auth::guard('user')->attempt($credentials);

        // Check if authentication was successful
        if ($attempt) {
            // dd($request);
            // Authentication successful
            return redirect()->intended('/');
        } else {
            // dd($request->input());
            // Authentication failed
            return back()->withErrors(['error' => 'Invalid credentials']);
        }
    }

    public function showLoginForm()
    {
        return view('frontend.auth.login');
    }

    public function showRegistrationForm()
    {
        return view('frontend.auth.register');
    }

    public function loginemailexistance(Request $request)
    {
        $output = '';
        $email = $request->input('email');
        
        $query = User::where('email',$email)->get();
        if(count($query) == 1)
        {
            $output = 'success';
        }
        else
        {
            $output = 'error';
        }
        echo $output;
    }

    public function loginpasswordcheck(Request $request)
    {
        $output = '';
        $email = $request->input('email');
        $pass = $request->input('pass');
        
        $query = User::where('email',$email)->first();
        if (Hash::check($pass, $query->password))
        {
            echo 'success';
        }
        else
        {
            echo 'error';
        }
        echo $output;
    }
}
