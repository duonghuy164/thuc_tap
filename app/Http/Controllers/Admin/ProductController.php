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
use App\Models\ProductColor;
use App\Models\Cpu;
use App\Models\Images;
use DB;
use Auth;
use App\Http\Requests\Admin\FormCreateProduct;
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
      $conditions = Product::select('id','name','status','avatar','created_at');
      if($status){
        $conditions = $conditions->where('status', '=', $status);
      }
      if ( $request->has('keyword') ) {
        $valSearch = $request->query('keyword');
        $conditions->where(function ($query) use ($valSearch) {
          $query->where('name', 'like', '%' . $valSearch. '%');
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

  public function store(FormCreateProduct $request)
  {
    try{
      $pd = new Product();
      $pd->name = $request->name_product;
      $pd->category_id = $request->category;
      $pd->brand_id = $request->brand;
      $pd->price_id = $request->price;

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
      $pd->avatar = $request->thumbnail;
      $pd->save();
      foreach($request->color as $cl){
        $cp = new ProductColor();
        $cp->color_id = $cl;
        $cp->product_id = $pd->id;
        $cp->save();
      }
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

  public function edit(Request $request,$id)
  {
    try{
      $product = Product::find($id);
      $colors = ProductColor::where('product_id',$id)->get();
    
      $category = Categories::all();
      $brand  = Brands::all();
      $color  = Color::all();
      $hard  = Hard::all();
      $ram = Ram::all();
      $price = Price::all();
      $screen = Screen::all();
      $cpu = Cpu::all();
      $cruise_gallery = Images::where('product_id', $id)->select('name')->get();
      return view('admin.product.edit',compact('product','category','brand','color','hard','ram','price','screen','cpu','cruise_gallery','colors'));
    }catch (\Exception $e) {
      return $this->renderJsonResponse( $e->getMessage() );
    }
  }

  public function update(Request $request,$id)
  {
    try{
     $cruise_in_id = Images::where('product_id',$id)->delete();

      DB::beginTransaction();
      $pd = Product::find($id);
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
      $pd->avatar = $request->thumbnail;
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

  public function destroy(Request $request)
  {
    try {
      $category = Product::where('id', $request->id)->first();
      if ( $category->status == Product::PUBLISHED ) {
        $category->status = Product::PENDING;
        $category->save();
        return response()->json(array('status' => true, 'html'=>'Thành công')); 
      } else {
        return response()->json(array('msg'=>'Danh mục chưa tồn tại hoặc chưa được kích hoạt')); 
      }
    } catch (\Exception $e) {
      return $this->renderJsonResponse( $e->getMessage() );
    }
  }
  /*
  |--------------------------------------------------------------------------
  | Category Destroy All
  |--------------------------------------------------------------------------
  */
  public function destroyAll(Request $request)
  {
    try {
      $ids = $request->id;
      $arr_id = explode( ',',$ids );
      $categories = Product::whereIn('id', $arr_id)->select('id','status')->get();
      foreach ($categories as $category) {
        $category->status = Product::PENDING;
        $category->save();
      }
      return response()->json(array('status' => true, 'msg'=>'Thành công')); 
    } catch (\Exception $e) {
      return $this->renderJsonResponse( $e->getMessage() );
    }
  }
  /*
  |--------------------------------------------------------------------------
  | Category Restore All
  |--------------------------------------------------------------------------
  */
  public function restore(Request $request)
  {
    try {
      $ids = $request->id;
      $arr_id = explode( ',',$ids );
      $categories = Product::whereIn('id', $arr_id)->select('id','status')->get();
      foreach ($categories as $category) {
        $category->status = Product::PUBLISHED;
        $category->save();
      }
      return response()->json(array('status' => true, 'msg'=>'Thành công')); 
    } catch (\Exception $e) {
      return $this->renderJsonResponse( $e->getMessage() );
    }
  }
}
