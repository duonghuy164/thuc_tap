<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Staff;
use App\Models\Attendances;
use App\Models\Timekeeping;
use DB;
use Excel;
use Auth;
use Carbon\Carbon;
class TimekeepingController extends Controller
{
  const TAKE =30;
  const ORDERBY = 'desc';
  /*
  |--------------------------------------------------------------------------
  | Post Index
  |--------------------------------------------------------------------------
  */
  public function index(Request $request)
  {
    try {
      $conditions = DB::table('attendances')->join('staff', 'attendances.staff_id','=','staff.id');
      $staffs = DB::table('staff')->get();
      $datas = $conditions->paginate( self::TAKE );
      return view('admin.timekeeping.index',compact('datas','staffs'));


    } catch (\Exception $e) {
      return $this->renderJsonResponse( $e->getMessage() );
    }
  } 

    public function search(Request $req)
  {
    try {
      $id = $req->staff_id;

      $conditions = DB::table('attendances')
                        ->select('*')
                        ->join('staff', 'attendances.staff_id','=','staff.id')
                        ->where('staff_id',$id)
                        ->where(DB::raw('date(checked_time)'), '>=', date('Y-m-d',strtotime($req->start_date)))
                        ->where(DB::raw('date(checked_time)'), '<=', date('Y-m-d',strtotime($req->end_date)));

      $staffs = DB::table('staff')->select('*')->where('id',$id)->get();
      $datas = $conditions->paginate( self::TAKE );
      return view('admin.timekeeping.index',compact('datas','staffs'));

    } catch (\Exception $e) {
      return $this->renderJsonResponse( $e->getMessage() );
    }
  }

}
