<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Excel;
use DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\Staff;
use App\Models\Attendances;
class ExportAdminController extends Controller implements FromCollection, WithHeadings
{
    use Exportable;

    public function collection()
    {	
    	$id = request()->input('staff_id');
    	$start_date = request()->input('start_date');
    	$end_date = request()->input('end_date');
   		
   		if($start_date === null  || $end_date === null){
    		$conditions = Attendances::select('staff_id','checked_time','checked_type')->get();
    		foreach($conditions as $row)
    		{
    			$order[] = array(
    				'0' => $row->staff->id,
    				'1' => $row->staff->name,
    				'2' => $row->checked_time,
    				'3' => checkType($row->checked_type),
    			);
    			
    		}
    		return  (collect($order));
    	}else{
    		$conditions = Attendances::select('staff_id','checked_time','checked_type')
                        ->where('staff_id',$id)
                        ->where(DB::raw('date(checked_time)'), '>=', date('Y-m-d',strtotime($start_date)))
                        ->where(DB::raw('date(checked_time)'), '<=', date('Y-m-d',strtotime($end_date)))
                        ->get();
    		foreach($conditions as $row)
    		{
    			$order[] = array(
    				'0' => $row->staff->id,
    				'1' => $row->staff->name,
    				'2' => $row->checked_time,
    				'3' => checkType($row->checked_type),
    			);
    			
    		}
    		return  (collect($order)	);
    	}

    }

    public function headings(): array
    {
    	return [
    		'id',
    		'name',
    		'checked_at',
    		'checked_type'
    	];
    }

    public function export()
    {
    	return Excel::download(new ExportAdminController(), 'orders'.time().'.xlsx');
    }
}
