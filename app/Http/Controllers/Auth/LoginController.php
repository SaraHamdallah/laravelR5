<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
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
    protected $title;
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
        $this->title = 'Login Page';
    }

    public function showLoginForm()
    {
        return view('auth.login', ['title' => $this->title]);
    }

    public function login(Request $request)
    {
       # Validate the form data
        $request->validate([
            //'email' => 'required|email',
            'username' => 'required|string',
            'password' => 'required|string',
            
        ]);

        # Attempt to log the user in
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password], $request->remember)) {
            return redirect()->intended(route('home'));
         } else {
        # Authentication failed...
        return back()->withErrors(['username' => 'These credentials do not match our records.'])->withInput($request->only('username', 'remember'));
        }
    }
}