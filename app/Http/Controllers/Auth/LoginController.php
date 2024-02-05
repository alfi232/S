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
    protected $redirectTo = RouteServiceProvider::HOME;
    public function credentials(Request $request)
    {
        return [
            'email'     => $request->email,
            'password'  => $request->password,
            'flag' => '0'
        ];
    }
    
    protected function redirectTo()
    {
        if (auth()->user()->role == 0) {
            $this->redirectTo = '/admin';
            return $this->redirectTo;
        } else 
        if (auth()->user()->role == 1) {
            $this->redirectTo = '/operator-surat';
            return $this->redirectTo;
        } else 
        if (auth()->user()->role == 2) {
            $this->redirectTo = '/operator-kepegawaian';
            return $this->redirectTo;
        }else 
        if (auth()->user()->role == 3) {
            $this->redirectTo = '/user-disposisi';
            return $this->redirectTo;
        } else{
            $this->redirectTo = '/login';
            return $this->redirectTo;
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
