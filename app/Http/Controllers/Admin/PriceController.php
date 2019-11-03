<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Price;
use DB;
class PriceController extends Controller
{
    const TAKE =15;
  	const ORDERBY = 'desc'; 
  public function index(Request $request)
  {
    $status =  $request->status;
    try {
      $conditions = Price::select('id','name','status','created_at');
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
      return view('admin.price.index', compact('product'));
      
    } catch (\Exception $e) {
      return $this->renderJsonResponse( $e->getMessage() );
    }
  }

  public function create()
  {
    try{
      
      return view('admin.price.create');
    } catch (\Exception $e) {
      return $this->renderJsonResponse( $e->getMessage() );
    }
  }

  public function store(Request $request)
  {
    try {
		      DB::beginTransaction();
		      $cpu = new Price();
		      $cpu->name = $request->title;
		      $cpu->status = $request->status;
		      $cpu->save();
		      DB::commit();
		      return redirect()->route( 'system_admin.price.index' )->with([ 'status_store' => 'Tạo thương hiệu thành công!']);
		    } catch (\Exception $e) {
		      DB::rollBack();
		      return $this->renderJsonResponse( $e->getMessage() );
		    }
  }
}
