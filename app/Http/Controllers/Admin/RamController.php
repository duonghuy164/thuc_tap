<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Ram;
use App\Http\Requests\Admin\RamFormRequest;
use DB;
class RamController extends Controller
{
    const TAKE =15;
  	const ORDERBY = 'desc';
  public function index(Request $request)
  {
    $status =  $request->status;
    try {
      $conditions = Ram::select('id','name','status','created_at');
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
      return view('admin.ram.index', compact('product'));

    } catch (\Exception $e) {
      return $this->renderJsonResponse( $e->getMessage() );
    }
  }

  public function create()
  {
    try{

      return view('admin.ram.create');
    } catch (\Exception $e) {
      return $this->renderJsonResponse( $e->getMessage() );
    }
  }

  public function store(RamFormRequest $request)
  {
    try {
		      DB::beginTransaction();
		      $cpu = new Ram();
		      $cpu->name = $request->title;
		      $cpu->status = $request->status;
		      $cpu->save();
		      DB::commit();
		      return redirect()->route( 'system_admin.ram.index' )->with([ 'status_store' => 'Tạo thương hiệu thành công!']);
		    } catch (\Exception $e) {
		      DB::rollBack();
		      return $this->renderJsonResponse( $e->getMessage() );
		    }
  }
}
