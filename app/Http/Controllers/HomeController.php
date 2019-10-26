<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home.index');
    }

    public function saveImage(Request $request)
    {
        $image = $request->file('file');
        $imageName = $image->getClientOriginalName();
        $uploadPath = 'uploads';
        $image->move(public_path($uploadPath),time().$imageName);
        $data = '/'.$uploadPath.'/'.time().$imageName;
        return $data;
    }

    public function deleteImage(Request $request)
    {
        $filename =  $request->get('filename');
        $path=public_path().'/uploads/'.$filename;
        if (file_exists($path)) {
            unlink($path);
        }
        if(isset($request->cruise_id) && $request->cruise_id){
          $image = Image::where([['link', '/uploads/'.$filename],['cruise_id',$request->cruise_id]])->delete();
        }
        if(isset($request->cruise_room_id) && $request->cruise_room_id){
          $image = Image::where([['link', '/uploads/'.$filename],['cruise_room_id',$request->cruise_room_id]])->delete();
        }
        return $filename;  
    }
}
