<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Session;
use Validator;

class AdminLoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/admin/login';
    
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }
    
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
      $this->validate($request,[
        'email'=>'required|email',
        'password'=>'required'
      ]);
      
      if(Auth::guard('admin')->attempt(['email'=>$request->email,'password'=>$request->password],$request->remember)){
        return redirect('/admin/home');
      }

      return redirect()->back()->withInput($request->only('email','remember'));
    }

    public function logout()
    {
        auth()->guard('admin')->logout();      
        return redirect(route('admin-login'));
    }

}