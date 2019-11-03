@extends('admin.layouts.master')
@section('title','Quản lý bài viết')
@section('content')
  @php
    $request = request();
  @endphp
  <section class="content dataTables_wrapper">
    {{ Breadcrumbs::render('staffs') }}
    <div class="clearfix"></div>
    @if (session('status_store'))
      <div class="note note-success"><p>{{ session('status_store') }}</p></div>
    @endif
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-xs-12">
        <div class="table-configuration-wrap">
          <span class="configuration-close-btn btn-show-table-options"><i class="fa fa-times"></i></span>
          <div class="wrapper-filter">
            <form action="" method="GET">
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <input type="text" name="keyword" class="form-control" id="keyword" placeholder="Nhập từ khóa tìm kiếm : Tên nhân viên..." @if($request->has('keyword')) value="{{ $request->keyword}}" @endif>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <button type="submit" class="btn btn-info">
                      <i class="fa fa-search"></i> Tìm kiếm
                    </button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
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
              <div class="btn-group pull-right" style="margin-right: 10px">
                <a href="{{route('system_admin.staffs.create')}}" class="btn btn-sm btn-success" title="New">
                  <i class="fa fa-save"></i><span class="hidden-xs">&nbsp;&nbsp;Thêm mới</span>
                </a>
              </div>
            </div>
            <span>
              <div class="portlet light bordered portlet-no-padding">
                <div class="portlet-title">
                  <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Tác Vụ
                    <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                      <li><a href="javascript:void(0)" class="grid-batch-0">Xóa lựa chọn</a></li>
                      <li><a href="javascript:void(0)" class="grid-batch-1">Phục hồi</a></li>
                    </ul>
                  </div>
                  <a href="javascript:void(0)" class="btn btn-sm btn-primary grid-refresh" title="Refresh">
                    <i class="fa fa-refresh"></i><span class="hidden-xs"> Làm mới</span>
                  </a>
                  <button class="btn btn-primary btn-show-table-options">
                    <i class="fa fa-filter"></i> Tìm kiếm
                  </button>
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
                    <input type="checkbox" class="checkbox-toggle" />
                  </th>                
                  <th>
                    ID<a class="fa fa-fw fa-sort" href="#"></a>
                  </th>
                  <th>Tên nhân viên</th>
                  <th>Tác vụ</th>
                </tr>
              </thead>
              <tbody>
                @if (count($datas) >0)
                  @foreach($datas as $data)
                    <tr>
                      <td><input type="checkbox" class="grid-row-checkbox" data-id="{{ $data->id }}" /></td>
                      <td>
                        {{ $data->id }}
                      </td>
                      <td>
                        {{$data->name}}
                      </td>
                      <td>
                        <a href="{{ route('system_admin.staffs.edit',['id'=>$data->id]) }}" class="btn btn-icon btn-sm btn-primary tip">
                          <i class="fa fa-eye"></i>
                        </a>
                        <a href="javascript:void(0);" data-id="{{$data->id}}" class="btn btn-icon btn-sm btn-danger deleteDialog tip">
                          <i class="fa fa-trash"></i>
                        </a>
                      </td>
                    </tr>
                  @endforeach
                @endif
              </tbody>
            </table>
          </div>
          <div class="box-footer clearfix">
            <div class="col-md-5">
              Hiển thị trang <b>{{ $datas->currentPage() }}</b> / <b>{{ $datas->count() }}</b> của <b>{{ $datas->total() }}</b> bài viết
            </div>
            <div class="col-md-7"> 
              {{ 
                $datas->appends([
                  'keyword' => $request->query('keyword'),
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

  </script>
@stop