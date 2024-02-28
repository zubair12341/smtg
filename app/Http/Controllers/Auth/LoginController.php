<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = '/';

    public function redirectTo()
    {
        // Customize the redirection based on the user's user_type
        $userType = Auth::user()->user_type;

   

        switch ($userType) {
            case 'Admin':
                return url('admin/dashboard');
            case 'Hotel':
                return url('/hotel/vendor/dashboard');
            case 'Tourist':
                return url('/');
            case 'Driver':
                return url('/driver/vendor/dashboard');
            default:
                return url('/');
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
