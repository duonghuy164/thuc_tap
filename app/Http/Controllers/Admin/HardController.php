<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\HardFormRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Hard;
use DB;

class HardController extends Controller
{
      const TAKE =15;
  		const ORDERBY = 'desc';
  public function index(Request $request)
  {
    $status =  $request->status;
    try {
      $conditions = Hard::select('id','name','status','created_at');
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
      $hard = $conditions->paginate( self::TAKE );
      return view('admin.hard.index', compact('hard'));

    } catch (\Exception $e) {
      return $this->renderJsonResponse( $e->getMessage() );
    }
  }

  public function create(Request $request)
    {
	    	try {
	      return view('admin.hard.create');
	    } catch (\Exception $e) {
	      return $this->renderJsonResponse( $e->getMessage() );
	    }
    }

   public function store(HardFormRequest $request)
    {

    		try {
		      DB::beginTransaction();
		      $hard = new Hard();
		      $hard->name = $request->title;
		      $hard->status = $request->status;
		      $hard->save();
		      DB::commit();
		      return redirect()->route( 'system_admin.hard.index' )->with([ 'status_store' => 'Tạo thương hiệu thành công!']);
		    } catch (\Exception $e) {
		      DB::rollBack();
		      return $this->renderJsonResponse( $e->getMessage() );
		    }
		  }
}
