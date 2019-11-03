<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Staff;
use App\Helpers\Helpers;
use DB;
use Auth;
class StaffController extends Controller
{
  const TAKE =12;
  const ORDERBY = 'desc';
  /*
  |--------------------------------------------------------------------------
  | Post Index
  |--------------------------------------------------------------------------
  */
  public function index(Request $request)
  {
    $status =  $request->status;
    try {
      $conditions = Staff::query();
      if ( $request->has('keyword') ) {
        $valSearch = $request->query('keyword');
        $conditions->where(function ($query) use ($valSearch) {
          $query->where('name', 'like', '%' . $valSearch. '%');
        });
      }
      $datas = $conditions->paginate( self::TAKE );
      return view('admin.staffs.index', compact('datas'));
    } catch (\Exception $e) {
      return $this->renderJsonResponse( $e->getMessage() );
    }
  } 
  /*
  |--------------------------------------------------------------------------
  | Post Create
  |--------------------------------------------------------------------------
  */
  public function create()
  {
    try {
      return view('admin.staffs.create');
    } catch (\Exception $e) {
      return $this->renderJsonResponse( $e->getMessage() );
    }
  }
  /*
  |--------------------------------------------------------------------------
  | Post Store
  |--------------------------------------------------------------------------
  */
  public function store(Request $request)
  {
    try {
      DB::beginTransaction();
      $post = new Staff();
      $post->name = $request->name;
      $post->save();
      DB::commit();
      return redirect()->route( 'system_admin.staffs.index' )->with([ 'status_store' => 'Thêm nhân viên mới thành công!']);
    } catch (\Exception $e) {
      DB::rollBack();
      return $this->renderJsonResponse( $e->getMessage() );
    }
  }
  /*
  |--------------------------------------------------------------------------
  | Post Edit
  |--------------------------------------------------------------------------
  */
  public function edit(Request $request , $id)
  {
    try {
      $data = Staff::find($id);
      return view('admin.staffs.edit',compact('data'));
    } catch (\Exception $e) {
      return $this->renderJsonResponse( $e->getMessage() );
    }
  }
  /*
  |--------------------------------------------------------------------------
  | Post Update
  |--------------------------------------------------------------------------
  */
  public function update(Request $request,$id)
  {
    try {
      DB::beginTransaction();
      # Save Post
      $data = Staff::where('id', $request->id)->first();
      $data->name = $request->name;
      $data->save();
      DB::commit();
      return redirect()->route( 'system_admin.staffs.edit' , ['id'=>$id] )->with([ 'status_update' => 'Cập nhật nhân viên thành công!']);
    } catch (\Exception $e) {
      DB::rollBack();
      return $this->renderJsonResponse( $e->getMessage() );
    }
  }
  /*
  |--------------------------------------------------------------------------
  | Post Destroy
  |--------------------------------------------------------------------------
  */
  public function destroy(Request $request)
  {
    try {
      $post = Post::where('id', $request->id)->first();
      if ( $post->status == Post::PUBLISHED ) {
        $post->status = Post::PENDING;
        $post->save();
        return response()->json(array('status' => true, 'html'=>'Thành công')); 
      } else {
        return response()->json(array('msg'=>'Bài đăng chưa tồn tại hoặc chưa được kích hoạt')); 
      }
    } catch (\Exception $e) {
      return $this->renderJsonResponse( $e->getMessage() );
    }
  }
  /*
  |--------------------------------------------------------------------------
  | Post Destroy All
  |--------------------------------------------------------------------------
  */
  public function destroyAll(Request $request)
  {
    try {
      $ids = $request->id;
      $arr_id = explode( ',',$ids );
      $posts = Post::whereIn('id', $arr_id)->select('id','status')->get();
      foreach ($posts as $post) {
        $post->status = Post::PENDING;
        $post->save();
      }
      return response()->json(array('status' => true, 'msg'=>'Thành công')); 
    } catch (\Exception $e) {
      return $this->renderJsonResponse( $e->getMessage() );
    }
  }
  /*
  |--------------------------------------------------------------------------
  | Post Restore All
  |--------------------------------------------------------------------------
  */
  public function restore(Request $request)
  {
    try {
      $ids = $request->id;
      $arr_id = explode( ',',$ids );
      $posts = Post::whereIn('id', $arr_id)->select('id','status')->get();
      foreach ($posts as $post) {
        $post->status = Post::PUBLISHED;
        $post->save();
      }
      return response()->json(array('status' => true, 'msg'=>'Thành công')); 
    } catch (\Exception $e) {
      return $this->renderJsonResponse( $e->getMessage() );
    }
  }

  //export data

}
