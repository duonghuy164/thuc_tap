<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class LoginController extends Controller
{
    public function login()
    {
    	return view('login.index');
    }

    // public function handleLogin(Request $request)
    // {
    // 	$email = $request->email;
    // 	$pass = $request->pass;
    // 	if(Auth::attempt(['email' => $email, 'password' => $pass])){
    // 		$user = Auth::user();
    // 		if($user->status == 1){
    // 			return redirect()->route('home');
    // 		}else{
    // 			return redirect()->back();
    // 		}
    // 	}else{
    // 		  return redirect()->back()->with('fail','Tài khoản và mật khẩu không chính xác!');
    // 	}

    // }
}
