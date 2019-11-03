<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Users;
use App\Jobs\Vertifi;
class LoginController extends Controller
{
   	public function signUp(Request $request)
   	{
   		

   		$email = $request->email;
   		$check_mail = Users::where('email',$email)->first();
   		if($check_mail){
   			return response()->json([
   			'msg'=> 'FAIL1'
   		]);
   		}else{
   			$us= new Users();
   			$us->name = $request->name;
   			$us->email = $request->email;
   			$us->password = bcrypt($request->password);
   			$us->status = 0;
   			$us->save();
   			$data = array();
   			$data['id'] = $us->id;
   			$data['email'] = $us->email;
   			$this->dispatch(new Vertifi($data));
   			return response()->json([
   				'msg'=>'OK'
   			]);
   		}
   		
   	}

   	public function confirm(Request $request)
   	{
   		$id = $request->id;
   		$uss = Users::find($id);
   		$uss->status = 1;
   		$uss->save();
   		return redirect()->route('home');
   	}

   	public function login(Request $request)
   	{
   		$email = $request->email;

   		$check_mail = Users::where('email',$email)->first();
   		if($check_mail){
   			if($check_mail->status == 0){
   				return response()->json([
   					'msg'=>'FAIL2'
   				]);
   			}else{
   				return response()->json([
   					'msg'=>'OK'
   				]);
   			}
   		}else{
   			return response()->json([
   				'msg'=>'FAIL1'
   			]);
   		}
   	}
}
