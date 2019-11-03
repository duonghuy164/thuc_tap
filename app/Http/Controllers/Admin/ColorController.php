<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\ColorFormRequest;
use App\Http\Controllers\Controller;
use App\Models\Color;
use Carbon\Carbon;
use DB;
class ColorController extends Controller
{
	const TAKE =15;
  const ORDERBY = 'desc';
    public function index(Request $request)
    {
    	$status =  $request->status;
	    try {
	      $conditions = Color::select('id','name','status','created_at');
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
	      $color = $conditions->paginate( self::TAKE );
	      return view('admin.color.index', compact('color'));

	    } catch (\Exception $e) {
	      return $this->renderJsonResponse( $e->getMessage() );
	    }
    }

    public function create(Request $request)
    {
	    	try {

	      return view('admin.color.create');
	    } catch (\Exception $e) {
	      return $this->renderJsonResponse( $e->getMessage() );
	    }
    }
    public function store(ColorFormRequest $request)
    {

    		try {
		      DB::beginTransaction();
		      $color = new Color();
		      $color->name = $request->title;
		      $color->status = $request->status;
		      $color->save();
		      DB::commit();
		      return redirect()->route( 'system_admin.color.index' )->with([ 'status_store' => 'Tạo danh mục thành công!']);
		    } catch (\Exception $e) {
		      DB::rollBack();
		      return $this->renderJsonResponse( $e->getMessage() );
		    }
    }

    public function edit(Request $request)
    {
    	try{
    		$id = $request->id;
    		// dd($id);
    		$color = Color::where('id',$id)->select('id','name','status')->first();
      	// dd($categories);
      	return view('admin.color.edit',compact('color'));
    	}catch (\Exception $e) {
		      DB::rollBack();
		      return $this->renderJsonResponse( $e->getMessage() );
		    }
    }

    public function update(Request $request,$id)
	  {
	    try {
	      DB::beginTransaction();
	      $color = Color::where('id', $request->id)->first();
	      $color->name = $request->title;
	      $color->status = $request->status;
	      $color->save();
	      DB::commit();
	      return redirect()->route( 'system_admin.category.edit' , ['id'=>$id] )->with([ 'status_update' => 'Cập nhật danh mục thành công!']);
	    } catch (\Exception $e) {
	      DB::rollBack();
	      return $this->renderJsonResponse( $e->getMessage() );
	    }
  }
}
