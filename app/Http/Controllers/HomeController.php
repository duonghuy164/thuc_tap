<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brands;
use App\Models\Price;
use App\Models\Images;
use DB;
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
    public function index(Request $request)
    {
        $product = Product::all();
        $pd_phone = Product::select('id','name','avatar','sale','price')->where('category_id',2)->take(3)->get();
        $pd_lap = Product::select('id','name','avatar','sale','price')->where('category_id',1)->take(3)->get();
  
       
        $product_sale = Product::select('id','name','avatar','sale','price')->orderBy('sale','asc')->take(10)->get();
        $product_sales = Product::select('name','avatar','sale','price')->orderBy('sale','asc')->take(5)->get();
        $brand = Brands::all();
        $price = Price::all();
        $city  = DB::table('city')->select('id','name')->get()->toArray();
    
        $product_new = Product::select('id','name','avatar','sale','price');

        if($request->name_search){
            $name_search = $request->name_search;
            $product_new = $product_new->where('name','like','%'.$name_search.'%');
        }
        if($request->name_price){
            $name_price = $request->name_price;
            $product_new = $product_new->where('price_id',$name_price);
        }

        if($request->name_brand){
            $name_brands = $request->name_brand;
            $product_new = $product_new->where('brand_id',$name_brands);
        }else{
            $name_brands = [];
        }
        //$product_new = $product_new->orderBy('created_at','asc')->take(12)->get();

        return view('index',compact('pd_phone','brand','pd_lap','product_new','product_sale','product_sales','price','name_brands','city'));
    }

    public function detail($id)
    {
        try{
            $pr = Product::find($id);
            $image = Images::where('product_id',$id)->get();
            $product_sales = Product::select('name','avatar','sale','price')->orderBy('sale','asc')->take(5)->get();
             $city  = DB::table('city')->select('id','name')->get()->toArray();
            return view('pages.single',compact('pr','image','product_sales','city'));
        }catch (\Exception $e) {
          return $this->renderJsonResponse( $e->getMessage() );
        }
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
