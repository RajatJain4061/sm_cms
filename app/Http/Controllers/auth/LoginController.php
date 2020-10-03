<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\User;
use Session;

class LoginController extends Controller
{
    public function user_login()
    {
        return view('auth/login');
    }
    public function login(Request $request)
    {
    	$validator = Validator::make($request->all(),[
    		'email' => 'required|email',
    		'password' => 'required'
    	]);
    	if($validator->fails())
    	{
    		return redirect('/')->withErrors($validator)->withInput();
    	}
    	else
    	{
    		$user = User::where('email',$request->email)->where('password',md5($request->password))->get();
    		if(count($user) == 1)
    		{
                session()->put('admin_data',$request->email);
                return redirect('customer-list');
    		}
    		else
    		{
    			return redirect('/')->with('error','Email does not Exist');
    		}
    		
    	}
    }
    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect()->intended('/');
    }
}
