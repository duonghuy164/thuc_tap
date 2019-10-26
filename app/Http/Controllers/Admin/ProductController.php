<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Categories;
use App\Models\Brands; 
use App\Models\Color;
use App\Models\Hard;
use App\Models\Screen;
use App\Models\Ram;
use App\Models\Price;
use App\Models\Cpu;
use App\Models\Images;
class ProductController extends Controller
{
  /*
  |--------------------------------------------------------------------------
  | Post Index
  |--------------------------------------------------------------------------
  */ 
  
      const TAKE =15;
  		const ORDERBY = 'desc'; 
  public function index(Request $request)
  {
    $status =  $request->status;
    try {
      $conditions = Product::select('id','name','status','created_at');
      if($status){
        $conditions = $conditions->where('status', '=', $status);
      }
      if ( $request->has('keyword') ) {
        $valSearch = $request->query('keyword');
        $conditions->where(function ($query) use ($valSearch) {
          $query->where('title', 'like', '%' . $valSearch. '%');
        });
      }
      $conditions->orderBy('id', self::ORDERBY);
      $product = $conditions->paginate( self::TAKE );
      return view('admin.product.index', compact('product'));
      
    } catch (\Exception $e) {
      return $this->renderJsonResponse( $e->getMessage() );
    }
  }

  public function create()
  {
    try{
      $category = Categories::all();
      $brand  = Brands::all();
      $color  = Color::all();
      $hard  = Hard::all();
      $ram = Ram::all();
      $price = Price::all();
      $screen = Screen::all();
      $cpu = Cpu::all();
      return view('admin.product.create',compact('category','brand','color','hard','ram','price','screen','cpu'));
    } catch (\Exception $e) {
      return $this->renderJsonResponse( $e->getMessage() );
    }
  }

  public function store(Request $request)
  {
    try{

      $pd = new Product();
      $pd->name = $request->name_product;
      $pd->category_id = $request->category;
      $pd->brand_id = $request->brand;
      $pd->price_id = $request->price;
      $pd->color_id = $request->brand;
      $pd->ram_id = $request->ram;
      $pd->screen_id = $request->screen;
      $pd->hard_drive_id = $request->hard;
      $pd->cpu_id = $request->cpu;
      $pd->promotion = $request->promotion;
      $pd->price = $request->price_product;
      $pd->qty = $request->qty_product;
      $pd->sale = $request->sale_product;
      $pd->description = $request->description;
      $pd->status = $request->status;
      $pd->created_at = date('Y-m-d H:i:s', time());
      $pd->save();
      if (count(json_decode($request->cruise_gallery)) > 0) {
        foreach (json_decode($request->cruise_gallery) as $key => $value) {
          $image = new Images();
          $image->product_id = $pd->id;
          $image->name = $value;
          $image->save();
        }
      }
      return redirect()->route('system_admin.product.index');
    }catch (\Exception $e) {
      return $this->renderJsonResponse( $e->getMessage() );
    }
  }
}
