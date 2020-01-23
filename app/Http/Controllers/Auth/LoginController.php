<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use App\User;
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

    public function showLoginForm()
    {
        $user=User::all();
        if (count($user)>0) {
            # code...
        return view('admin.users.login-form');
        // return view('auth.login');
        }else{
            $user=new User();
            $user->role='Admin';
            $user->name='Admin';
            $user->mobile='01766921701';
            $user->email='julfikar6262@gmail.com';
            $user->password=Hash::make('johny147');
            $user->save();

            return view('admin.users.login-form');
        }
    }

     public function username()
    {
        return 'mobile';
        
    }

     protected function loggedOut(Request $request)
    {
        return redirect('/home');
    }



    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

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
