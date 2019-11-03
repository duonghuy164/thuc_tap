@extends('admin.layouts.master')
@section('title','Chỉnh sửa bài viết')
@section('content')
  <section class="content">
    {{ Breadcrumbs::render('editstaffs') }}
    <div class="clearfix"></div>
    <form method="POST" action="{{ route( 'system_admin.staffs.update' , ['id'=>$data->id] ) }}">
      @method('PUT')
      {{ csrf_field() }}
      @if ($errors->all())
        <div class="note note-danger"><p>Vui lòng điền đầy đủ thông tin</p></div>
      @elseif(session('status_update'))
        <div class="note note-success"><p>{{ session('status_update') }}</p></div>
      @else 
        <div class="note note-success"><p>Bạn đang chỉnh sửa nhân viên</p></div>
      @endif
      <div class="row">
        <div class="col-md-9">
          <div class="tabbable-custom">
            <ul class="nav nav-tabs ">
              <li class="nav-item">
                <a href="#tab_detail" class="nav-link active show" data-toggle="tab">Chi tiết</a>
              </li>      
            </ul><!-- end.nav-tabs -->
            <div class="tab-content">
              <div class="tab-pane active show" id="tab_detail">
                <div class="form-group">
                  <label for="title" class="control-label required">Tiêu đề</label>
                  <input class="form-control" placeholder="Tênh nhân viên" data-counter="120" name="name" type="text" id="name" value="{{ $data->name }}">
                  @if ($errors->first('name')) 
                    <div class="error">{{ $errors->first('name') }}</div>
                  @endif
                </div>       
              </div>
            </div><!-- end.tab-content -->
          </div>
        </div>
        <div class="col-md-3 right-sidebar">
          <div class="widget meta-boxes form-actions form-actions-default action-horizontal">
            <div class="widget-title">
              <h4><span>Cập nhật</span></h4>
            </div>
            <div class="widget-body">
              <div class="btn-set">
                <button type="submit" name="submit" value="save" class="btn btn-info">
                  <i class="fa fa-save"></i> Cập nhật
                </button>
                <button type="submit" name="submit" value="apply" class="btn btn-success">
                  <i class="fa fa-check-circle"></i> Lưu và Sửa
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </section>
@stop
@section('addjs')
  <script type="text/javascript">
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    @if(session('status_update'))
      swal(
        'Thành công!',
        'Chỉnh sửa bài đăng thành công!',
        'success'
      )
    @endif
  </script>
@stop
