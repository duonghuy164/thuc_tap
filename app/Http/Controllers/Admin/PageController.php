<?php 
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Page;
use DB;
use Auth;
use App\Http\Requests\Admin\PageFormRequest;

class PageController extends Controller
{
  const TAKE =15;
  const ORDERBY = 'desc';
	/*
	|--------------------------------------------------------------------------
	| Dashboard Index
	|--------------------------------------------------------------------------
	*/
	public function index(Request $request) {
		try {
      $status =  $request->status;
      $conditions = Page::select('id','title','thumbnail','status','created_at');
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
      $pages = $conditions->paginate( self::TAKE );
			return view('admin.pages.index',compact('pages'));
		} catch (\Exception $e) {
			return $this->renderJsonResponse( $e->getMessage() );
		}
	}

  /*
	|--------------------------------------------------------------------------
	| Page Create
	|--------------------------------------------------------------------------
	*/
	public function create()
	{
		try {
			return view('admin.pages.create');
		} catch (\Exception $e) {
			return $this->renderJsonResponse( $e->getMessage() );
		}
	}

	/*
	|--------------------------------------------------------------------------
	| Page Store
	|--------------------------------------------------------------------------
	*/
	public function store(PageFormRequest $request)
	{
		try {
			DB::beginTransaction();
			$page = new Page;
			$page->title = $request->title;
			$page->slug = str_slug($request->title,'-');
			$page->content = $request->content;
			$page->status = $request->status;
			$page->thumbnail = $request->thumbnail;
			$page->save();
			DB::commit();
			return redirect()->route( 'system_admin.page.index' )->with([ 'status_store' => 'Tạo trang mới thành công!']);
		} catch (\Exception $e) {
			DB::rollBack();
			return $this->renderJsonResponse( $e->getMessage() );
		}
	}
	/*
	|--------------------------------------------------------------------------
	| Page get edit
	|--------------------------------------------------------------------------
	*/
	public function edit(Request $request , $id)
	{
		try {
			$page = Page::find($id);
			return view('admin.pages.edit',compact('page'));
		} catch (\Exception $e) {
			return $this->renderJsonResponse( $e->getMessage() );
		}
	}
	/*
	|--------------------------------------------------------------------------
	| Page Update
	|--------------------------------------------------------------------------
	*/
	public function update(PageFormRequest $request,$id)
	{
		try {
			DB::beginTransaction();
			# Save Post
			$page = Page::where('id', $request->id)->first();
			$page->title = $request->title;
			$page->slug = str_slug($request->title,'-');
			$page->content = $request->content;
			$page->status = $request->status;
			$page->save();
			DB::commit();
			return redirect()->route( 'system_admin.page.edit' , ['id'=>$id] )->with([ 'status_update' => 'Cập nhật trang thành công!']);
		} catch (\Exception $e) {
			DB::rollBack();
			return $this->renderJsonResponse( $e->getMessage() );
		}
	}
	/*
	|--------------------------------------------------------------------------
	| Page destroy
	|--------------------------------------------------------------------------
	*/
	public function destroy(Request $request)
	{
		try {
			$page = Page::where('id', $request->id)->first();
			if ( $page->status == Page::PUBLISHED ) {
				$page->status = Page::PENDING;
				$page->save();
				return response()->json(array('status' => true, 'html'=>'Thành công')); 
			} else {
				return response()->json(array('msg'=>'Trang không tồn tại hoặc chưa được kích hoạt')); 
			}
		} catch (\Exception $e) {
			return $this->renderJsonResponse( $e->getMessage() );
		}
	}
	/*
	|--------------------------------------------------------------------------
	| Page destroy All
	|--------------------------------------------------------------------------
	*/
	public function destroyAll(Request $request)
	{
		try {
			$ids = $request->id;
			$arr_id = explode( ',',$ids );
			$pages = Page::whereIn('id', $arr_id)->select('id','status')->get();
			foreach ($pages as $page) {
				$page->status = Page::PENDING;
				$page->save();
			}
			return response()->json(array('status' => true, 'msg'=>'Thành công')); 
		} catch (\Exception $e) {
			return $this->renderJsonResponse( $e->getMessage() );
		}
	}
	/*
	|--------------------------------------------------------------------------
	| Page Restore All
	|--------------------------------------------------------------------------
	*/
	public function restore(Request $request)
	{
		try {
			$ids = $request->id;
			$arr_id = explode( ',',$ids );
			$pages = Page::whereIn('id', $arr_id)->select('id','status')->get();
			foreach ($pages as $page) {
				$page->status = Page::PUBLISHED;
				$page->save();
			}
			return response()->json(array('status' => true, 'msg'=>'Thành công')); 
		} catch (\Exception $e) {
			return $this->renderJsonResponse( $e->getMessage() );
		}
	}
}