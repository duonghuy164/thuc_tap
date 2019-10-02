<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Auth;
use App\Models\Users;
use App\Models\CodeMail;
use App\Jobs\SendCodeMail;
use Carbon;
class LoginController extends Controller
{
    public function login()
    {
    	return view('login.index');
    }

    public function handleLogin(Request $request)
    {
    	$email = $request->email;
    	$pass = $request->pass;
    	if(Auth::attempt(['email' => $email, 'password' => $pass])){
    		$user = Auth::user();
    		if($user->status == 1){
    			return redirect()->route('home');
    		}else{
    			return redirect()->back();
    		}
    	}else{
    		  return redirect()->back()->with('fail','Tài khoản và mật khẩu không chính xác!');
    	}

    }

    public function register()
    {
        return view('login.register.index');
    }

    public function handleRegister(Request $request)
    {
        $email = $request->email;
        $data = Users::where('email',$email)->first();
        if($data){
            if($data->status == 1){
                return redirect()->back()->with('fail','Tài khoản đã tồn tại.Vui lòng thử lại sau!');
            }else{
                return redirect()->back()->with('fail','Vui lòng xác thực tài khoản!');
            }
        }else{
             $user = new Users();
             $user->name = null;
             $user->email = $request->email;
             $user->password = bcrypt($request->pass);
             $user->phone = null;
             $user->date = null;
             $user->address = null;
             $user->gender = null;
             $user->status = 0;
             $user->created_at = Carbon\Carbon::now()->toDateString('d-m-Y H:i:s');
             $user->save();

             $codeMail = new CodeMail();
             $codeMail->user_id = $user->id;
             $codeMail->code = str_random(6);
             $codeMail->save();
             
          
            //Mail::to($email)->send(new CodeMail($code));
             $data = array();
             $data['email'] = $user->email;
             $data['id'] = $user->id;
             $data['code'] = $codeMail->code;
             // dd($data);
              //Mail::to($data['email'])->send(new \App\Mail\CodeMail($data));
             $this->dispatch(new SendCodeMail($data));
             return redirect()->route('code.mail',['id'=>$user->id]);
        }
    }
    public function codeMail(Request $request,$id)
    {
        try{
            $dt = Users::find($id);
            return view('login.verification.index',compact('dt'));
        }catch (\Exception $e) {
          return $this->renderJsonResponse( $e->getMessage() );
        }
    } 

    public function handleCode(Request $request)
    {
        try{
            $cd = CodeMail::where('user_id',$request->id)->first();
            if($cd->code == $request->code){
                $us = Users::where('id',$request->id)->first();
                $us->status = 1;
                $us->save();
                return redirect()->route('home');
            }else{
                return redirect()->back()->with('fail','Mã xác nhận không hợp lệ!');
            }
        }catch (\Exception $e) {
          return $this->renderJsonResponse( $e->getMessage() );
        }
    }

    public function forget()
    {
        try{
            return view('login.forget.index');
        }catch (\Exception $e) {
          return $this->renderJsonResponse( $e->getMessage() );
        }
    }

    public function handleForget(Request $request)
    {
        try{
            $email = $request->email;
            $dt = Users::where('email',$email)->first();
            if($dt){
                $id = $dt->id;
                $cm = new CodeMail();

                $cm->user_id = $id;
                $cm->code = str_random(6);
                $cm->save();
                $data['id'] = $id;
                $data['email'] = $email;
                $data['code'] = $cm->code;
                $this->dispatch(new SendCodeMail($data));
                return redirect()->route('confirm.mail',['id'=>$id]);
            }else{
                return redirect()->back()->with('fail','Email không tồn tại!');
            }
        }catch (\Exception $e) {
          return $this->renderJsonResponse( $e->getMessage() );
        }
    }
    public function confirmMail(Request $request , $id)
    {
        try{
            $id = $request->id;

            return view('login.forget.confirm',compact('id'));
        }catch (\Exception $e) {
          return $this->renderJsonResponse( $e->getMessage() );
        }
    }
    public function hanldeConfirmMail(Request $request)
    {
        try{
            $id = $request->id;
            $cm = CodeMail::where('id',$id)->first();

            if($cm){
                $code = $request->code;
                if($code == $cm->code){
                    $pass = $request->pass;
                    $us = Users::where('id',$id)->first();
                    $us->password = bcrypt($pass);
                    $us->save();
                    return redirect()->route('login');

                }else{
                    return redirect()->back()->with('fail','Mã xác nhận không chính xác!');
                }
            }else{
                return redirect()->back()->with('fail','Mã xác nhận không chính xác!');
            }
        }catch (\Exception $e) {
          return $this->renderJsonResponse( $e->getMessage() );
        }
    }


}
