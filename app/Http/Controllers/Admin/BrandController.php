<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Brands;
use DB;
class BrandController extends Controller
{
  const TAKE =15;
  const ORDERBY = 'desc';
  public function index(Request $request)
  {
    $status =  $request->status;
    try {
      $conditions = Brands::select('id','name','status','created_at');
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
      $brand = $conditions->paginate( self::TAKE );
      return view('admin.brand.index', compact('brand'));
      
    } catch (\Exception $e) {
      return $this->renderJsonResponse( $e->getMessage() );
    }
  }

  public function create(Request $request)
    {
	    	try {
	      	
	      return view('admin.brand.create');
	    } catch (\Exception $e) {
	      return $this->renderJsonResponse( $e->getMessage() );
	    }
    }

   public function store(Request $request)
    {
    		try {
		      DB::beginTransaction();
		      $brand = new Brands();
		      $brand->name = $request->title;
		      $brand->description = $request->content;
		      $brand->status = $request->status;
		      $brand->save();
		      DB::commit();
		      return redirect()->route( 'system_admin.brand.index' )->with([ 'status_store' => 'Tạo thương hiệu thành công!']);
		    } catch (\Exception $e) {
		      DB::rollBack();
		      return $this->renderJsonResponse( $e->getMessage() );
		    }
    }
}
