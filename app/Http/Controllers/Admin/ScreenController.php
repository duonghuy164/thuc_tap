<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Screen;
use DB;
class ScreenController extends Controller
{
    const TAKE =15;
  	const ORDERBY = 'desc'; 
  public function index(Request $request)
  {
    $status =  $request->status;
    try {
      $conditions = Screen::select('id','name','status','created_at');
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
      return view('admin.screen.index', compact('product'));
      
    } catch (\Exception $e) {
      return $this->renderJsonResponse( $e->getMessage() );
    }
  }

  public function create()
  {
    try{
      
      return view('admin.screen.create');
    } catch (\Exception $e) {
      return $this->renderJsonResponse( $e->getMessage() );
    }
  }

  public function store(Request $request)
  {
    try {
		      DB::beginTransaction();
		      $cpu = new Screen();
		      $cpu->name = $request->title;
		      $cpu->status = $request->status;
		      $cpu->save();
		      DB::commit();
		      return redirect()->route( 'system_admin.screen.index' )->with([ 'status_store' => 'Tạo thương hiệu thành công!']);
		    } catch (\Exception $e) {
		      DB::rollBack();
		      return $this->renderJsonResponse( $e->getMessage() );
		    }
  }
}
