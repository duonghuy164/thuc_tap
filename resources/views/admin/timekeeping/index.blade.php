@extends('admin.layouts.master')
@section('title','Quản lý chấm công')
@section('content')
  @php
    $request = request();
  @endphp
  <section class="content dataTables_wrapper">
    {{ Breadcrumbs::render('timekeeping') }}
    <div class="clearfix"></div>
    @if (session('status_store'))
      <div class="note note-success"><p>{{ session('status_store') }}</p></div>
    @endif
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header with-border">
            <div class="pull-right">
              <div class="btn-group pull-right" style="margin-right: 10px">
                <a class="btn btn-sm btn-twitter" title="Export"><i class="fa fa-download"></i><span class="hidden-xs"> Export</span></a>
                <button type="button" class="btn btn-sm btn-twitter dropdown-toggle" data-toggle="dropdown">
                  <span class="caret"></span>
                  <span class="sr-only">Toggle Dropdown</span>
                </button>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#" target="_blank">All</a></li>
                  <li><a href="#" target="_blank">Current page</a></li>
                  <li><a href="#" target="_blank" class="export-selected">Selected rows</a></li>
                </ul>
              </div>
            </div>
            <span>
              <div class="portlet light bordered portlet-no-padding">
                <div class="portlet-title">

                  <form action="{{route('system_admin.timekeeping.search')}}" method="GET">
                    <div class="row">
                      <div class="col-md-1">
                        <a href="javascript:void(0)" class="btn btn-sm btn-primary grid-refresh" title="Refresh">
                          <i class="fa fa-refresh"></i><span class="hidden-xs"> Làm mới</span>
                        </a>
                      </div>
                      <div class="col-md-3">
                        <select name="staff_id" class="form-control">
                          @foreach($staffs as $staff)
                            @if($request->has('staff_id') && $request->staff_id == $staff->id)
                              <option value="{{$staff->id}}" selected> {{$staff->name}}</option>
                            @else
                              <option value="{{$staff->id}}"> {{$staff->name}}</option>
                            @endif
                          @endforeach
                        </select>
                      </div>
0                      <div class="col-md-2">
                        <input type="text" name="start_date" class="form-control" id="start_date" @if($request->has('start_date')) value="{{ $request->start_date}}" @endif>
                      </div>
                      <div class="col-md-2">
                        <input type="text" name="end_date" class="form-control" id="end_date" @if($request->has('end_date')) value="{{ $request->end_date}}" @endif>
                      </div>
                      <div class="col-md-1">
                        <button class="btn btn-primary" type="submit">
                          <i class="fa fa-filter"></i> Tìm kiếm
                        </button>
                      </div>
                      <div class="col-md-1">
                        <a href="{{route('system_admin.timekeeping.export',['staff_id'=>$request->staff_id, 'start_date'=>$request->start_date, 'end_date' => $request->end_date])}}"class="btn btn-sm btn-twitter" title="Export" target="_blank"><i class="fa fa-download"></i><span class="hidden-xs"> Export</span></a>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </span>
          </div>
          <!-- /.box-header -->
          <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
              <thead>
                <tr>               
                  <th>
                    ID<a class="fa fa-fw fa-sort" href="#"></a>
                  </th>
                  <th style="width: 150px;">Nhân viên</th>
                  <th>Thời gian</th>
                  <th>Trạng thái</th>
                </tr>
              </thead>
              <tbody>
                @if (count($datas) >2)
                  @foreach($datas as $data)
                    <tr>
                      <td>
                        {{ $data->id }}
                      </td>
                      <td>
                        {{$data->name}}
                      </td>
                      <td> {{$data->checked_time}}  </td>
                      <td> {{ checkType($data->checked_type) }}</td>
                    </tr>
                  @endforeach
                @endif
              </tbody>
            </table>
          </div>
          <div class="box-footer clearfix">
            <div class="col-md-5">
              Hiển thị trang <b>{{ $datas->currentPage() }}</b> / <b>{{ $datas->lastPage() }}</b>
            </div>
            <div class="col-md-7"> 
              {{ 
                $datas->appends([
                  'staff_id' => $request->query('staff_id'),
                  'start_date' => $request->query('start_date'),
                  'end_date' => $request->query('end_date'),
                ])->links() 
              }}
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>
@stop
@section('addjs')
  <script type="text/javascript">
    $('#start_date').datepicker();
    $('#end_date').datepicker();
  </script>
@stop