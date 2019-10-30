<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brands;
use App\Models\Price;
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
        $product = Product::all();
        $pd_phone = Product::select('id','name')->where('category_id',2)->get();
        $pd_lap = Product::select('id','name')->where('category_id',1)->get();
        $product_new = Product::select('name','avatar','sale','price')->orderBy('created_at','asc')->take(12)->get();
       
        $product_sale = Product::select('name','avatar','sale','price')->orderBy('sale','asc')->take(10)->get();
        $product_sales = Product::select('name','avatar','sale','price')->orderBy('sale','asc')->take(5)->get();
        $brand = Brands::all();
        $price = Price::all();
        return view('index',compact('pd_phone','brand','pd_lap','product_new','product_sale','product_sales','price'));
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
