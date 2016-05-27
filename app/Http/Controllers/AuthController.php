<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Auth;
use App\User;
class AuthController extends Controller
{
    public function login()
    {
        if(Auth::check())
        {
            return redirect('/');
        }
    	return view("auth.login");
    }

    public function check_login(Request $request)
    {
        if(Auth::check())
        {
            return redirect('/');
        }
    	$data=$request->only('email','password');
    	if(Auth::attempt($data)){
    		return redirect()->intended('/');
    	}
    	return back()->withInput();
    }

    public function logout()
    {
    	Auth::logout();
    	return redirect('login');
    }

    public function demo_user()
    {
    	$user=new User();
    	$user->email='mazed@gmail.com';
    	$user->password=bcrypt('123');
    	$user->name ="mazed"; 
    	$user->save();
    }
}
