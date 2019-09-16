<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Post;
use App\Http\Requests\Admin\PostFormRequest;
use App\Helpers\Helpers;
use DB;
use Auth;
class PostController extends Controller
{
	const TAKE =15;
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
			$conditions = Post::select('id','title','thumbnail','user_id','status','created_at');
			if($status){
				$conditions = $conditions->where('status', '=', $status);
			}
			if ( $request->has('keyword') ) {
				$valSearch = $request->query('keyword');
				$conditions->where(function ($query) use ($valSearch) {
					$query->where('name', 'like', '%' . $valSearch. '%')
					->orWhere('user_id', 'like', '%' . $valSearch. '%');
				});
			}
			$conditions->orderBy('id', self::ORDERBY);
			$posts = $conditions->paginate( self::TAKE );
			return view('admin.posts.index', compact('posts'));
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
			$categories = Categories::where('status',Categories::PUBLISHED)->select('id','title','parent_id')->get();
			return view('admin.posts.create',compact('categories'));
		} catch (\Exception $e) {
			return $this->renderJsonResponse( $e->getMessage() );
		}
	}
	/*
	|--------------------------------------------------------------------------
	| Post Store
	|--------------------------------------------------------------------------
	*/
	public function store(PostFormRequest $request)
	{
		try {
			DB::beginTransaction();
			$user = Auth::user();
			// $geoIP = Helpers::getUserIP();
			# Save Post
			$post = new Post();
			$post->title = $request->title;
			$post->slug = str_slug($request->title,'-');
			$post->description = str_limit($request->content, 20, '...');
			$post->content = $request->content;
			$post->user_id = $user->id;
			$post->thumbnail = $request->thumbnail;
			$post->cat_id = $request->cat_id;
			$post->status = $request->status;
			$post->save();
			DB::commit();
			return redirect()->route( 'system_admin.post.index' )->with([ 'status_store' => 'Tạo bài đăng thành công!']);
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
			$categories = Categories::where('status',Categories::PUBLISHED)->select('id','title','parent_id','status')->get();
			$post = Post::find($id);
			return view('admin.posts.edit',compact('post','categories'));
		} catch (\Exception $e) {
			return $this->renderJsonResponse( $e->getMessage() );
		}
	}
	/*
	|--------------------------------------------------------------------------
	| Post Update
	|--------------------------------------------------------------------------
	*/
	public function update(PostFormRequest $request,$id)
	{
		try {
			DB::beginTransaction();
			$user = Auth::user();
			# Save Post
			$post = Post::where('id', $request->id)->first();
			$post->title = $request->title;
			$post->slug = str_slug($request->title,'-');
			$post->description = str_limit($request->content, 20, '...');
			$post->content = $request->content;
			$post->user_id = $user->id;
			$post->thumbnail = $request->thumbnail;
			$post->cat_id = $request->cat_id;
			$post->status = $request->status;
			$post->save();
			DB::commit();
			return redirect()->route( 'system_admin.post.edit' , ['id'=>$id] )->with([ 'status_update' => 'Cập nhật bài đăng thành công!']);
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
}
