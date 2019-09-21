<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class LoginController extends Controller
{
    public function index()
    {
    	return view('admin.login.index');
    }

    public function handleLogin(Request $request)
    {
    	$data = Auth::guard('admin')->attempt(['email' => $request->get('email'),'password' => $request->get('pass')]);
    	if($data){
    		$request->session()->put('admin_login','true');
    		return redirect()->route('system_admin.dashboard');
    	}else{
  
    		return redirect()->back();
    	}
    }
}
