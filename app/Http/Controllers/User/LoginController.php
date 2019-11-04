<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Jobs\Vertifi;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
   	public function signUp(Request $request)
   	{

   		$email = $request->email;
   		$check_mail = User::where('email',$email)->first();
   		if($check_mail){
   			return response()->json([
   			'msg'=> 'FAIL1'
   		]);
   		}else{
   			$us= new User();
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
   		$uss = User::find($id);
   		$uss->status = 1;
   		$uss->save();
   		return redirect()->route('home');
   	}

   	public function login(Request $request)
   	{
   		$email = $request->email;
         $password = $request->password;
         $ifo = [
            'email'=>$email,
            'password' => $password
        ];
   		$check_mail = User::where('email',$email)->first();
   		if($check_mail){
   			if($check_mail->status == 0){
   				return response()->json([
   					'msg'=>'FAIL2'
   				]);
   			}else{
               if(Auth::attempt($ifo)){
      				return response()->json([
      					'msg'=>'OK'
      				]);
               }
   			}
   		}else{
   			return response()->json([
   				'msg'=>'FAIL1'
   			]);
   		}
   	}

      public function logout(){
         Auth::logout();
         return redirect()->route('homes');
      }

      public function update(Request $request)
      {
         $id = $request->idUser;
         $us = User::find($id);
         $us->name = $request->nameUser;
         $us->phone = $request->phoneUser;
         $us->date = $request->dateUser;
         $us->address = $request->addressUser;
         $us->save();

         return response()->json([
            'msg' => 'OK'
         ]);
      }

      public function updatePass(Request $request)
      {
         $id = $request->idUser;
         $us = User::find($id);
         $passOl = $request->passOldUser;

         if(Hash::check($passOl, $us->password)){
            $passNew = $request->passNewUser;

            $us->password = bcrypt($passNew);
            $us->save();
            return response()->json([
               'msg' => 'OK'
            ]);
         }else{
            return response()->json([
               'msg' => 'FAIL'
            ]);
         }
      }
}
