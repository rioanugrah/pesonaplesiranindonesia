<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
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
    protected $redirectTo = '/home';
    protected $maxAttempts = 3;
    protected $decayMinutes = 2;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    protected function authenticated(Request $request, $user)
    {
        // return redirect('/dashboard');
        // return redirect()->intended('');
        if (\Auth::user()->hasRole('Administrator')) {
            return redirect(route('admin.home'));
        }elseif(\Auth::user()->hasRole('Partnership')) {
            return redirect(route('member.dashboard'));
        }
        else{
            return redirect(route('user.home'));
        }
    }

    public function logout(Request $request)
    {
        \Auth::logout(); // Use the Auth facade to log out the user

        $request->session()->invalidate(); // Invalidate the session
        $request->session()->regenerateToken(); // Regenerate the CSRF token for security

        return redirect(route('frontend.index')); // Redirect to your desired URL (e.g., '/login')
    }
}
