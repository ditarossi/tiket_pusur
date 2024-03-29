<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
// use Auth;
use Illuminate\Support\Facades\Auth;

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
    public function index()
    {
        return view('user_view.login');
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request){
        $input = $request->all();
        $this->validate($request,[
            'email'=> 'required|email',
            'password'=> 'required',
        ]);

        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
        {
            if(auth()->user()->is_admin == 1)
            {
                return redirect()->route('admin');
            } else if (auth()->user()->is_admin == 0)
            {
                return redirect()->route('user_view');
            } else {
                return redirect('form-login')->with('warning', 'Username dan Password Tidak Sesuai!');
            }
        } else {
            return redirect('form-login')->with('warning', 'Username dan Password Tidak Sesuai!');
        }
    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect('/');
      }
}

//1. admin.home -> admin.dashboard
//2. homw -> user_view