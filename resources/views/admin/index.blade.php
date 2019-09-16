@extends('admin.layouts.master')
@section('title','Laravel Dashboard')
@section('content')
  <section class="content-header">
    <h1>
      Dashboard
      <small>Control panel</small>
    </h1>
  </section>
  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-aqua">
          <div class="inner">
            <h3></h3>
            <p>Bài viết</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="{{route('system_admin.post.index')}}" class="small-box-footer">Xem thêm <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-red">
          <div class="inner">
            <h3></h3>
            <p>Trang</p>
          </div>
          <div class="icon">
            <i class="ion ion-pie-graph"></i>
          </div>
          <a href="{{ route('system_admin.page.index')}}" class="small-box-footer">Xem thêm <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      
    <div class="row">
      <div class="col-md-12">
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title color-back">Thống kê bài viết mới</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
            <div class="chart-user"> 
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title color-back">Thống kê trang mới</h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
      </div>
      <div class="box-body">
        <div class="chart-user"> 
        </div>
      </div>
    </div>
     
  </section>
@stop