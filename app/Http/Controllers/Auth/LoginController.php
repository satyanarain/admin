<?php
namespace App\Http\Controllers\Auth;

use DB;
use Auth;
use App\Http\Requests;
use App\Models\Chatter;
use Illuminate\Http\Request;
use Illuminate\Http\Respons;
use App\Http\Controllers\Controller;
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
    //protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    //protected $redirectTo = '/dashboard';
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    public function login(Request $request)
    {
        $this->validate($request, ['user_name' => 'required', 'password' => 'required']);
        Auth::attempt(['user_name' => $request['user_name'], 'password' => $request['password']]);
        if(!Auth::attempt(['user_name' => $request['user_name'], 'password' => $request['password']])) {
            return redirect()->back()->with('fail', 'Either username or password is incorrect!');
        }else
        { 
            return redirect('/dashboard');
        }

   }
    
}
