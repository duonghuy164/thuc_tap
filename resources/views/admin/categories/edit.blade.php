@extends('admin.layouts.master')
@section('title','Chỉnh sửa danh mục')
@section('content')
  <section class="content">
    {{ Breadcrumbs::render('editcategory') }}
    <div class="clearfix"></div>
    <form method="POST" action="{{ route( 'system_admin.category.update' , ['id'=>$category->id] ) }}">
      @method('PUT')
      {{ csrf_field() }}
      @if ($errors->all())
        <div class="note note-danger"><p>Vui lòng điền đầy đủ thông tin</p></div>
      @elseif(session('status_update'))
        <div class="note note-success"><p>{{ session('status_update') }}</p></div>
      @else 
        <div class="note note-success"><p>Bạn đang chỉnh sửa danh mục</p></div>
      @endif
      <div class="row">
        <div class="col-md-9">
          <div class="tabbable-custom">
            <ul class="nav nav-tabs ">
              <li class="nav-item">
                <a href="#tab_detail" class="nav-link active show" data-toggle="tab">Chi tiết bài đăng</a>
              </li>      
            </ul><!-- end.nav-tabs -->
            <div class="tab-content">
              <div class="tab-pane active show" id="tab_detail">
                <div class="form-group">
                  <label for="title" class="control-label required">Tiêu đề</label>
                  <input class="form-control" placeholder="Tiêu đề bài đăng" data-counter="120" name="title" type="text" id="title" value="{{ $category->title }}">
                  @if ($errors->first('title')) 
                    <div class="error">{{ $errors->first('title') }}</div>
                  @endif
                </div>       
                <div class="form-group">
                  <label for="description" class="control-label">Nội dung bài đăng</label>
                  <textarea id="content" name="content" class="form-control">{!! $category->content !!}</textarea>
                  @if ($errors->first('content')) 
                    <div class="error">{{ $errors->first('content') }}</div>
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
          <div class="widget meta-boxes">
            <div class="widget-title">
              <h4><label for="status" class="control-label required">Trạng thái</label></h4>
            </div>
            <div class="widget-body">
              <div class="ui-select-wrapper">
                <select class="form-control ui-select ui-select" id="status" name="status">
                  <option value="1" @if ( $category->status == 1  ) selected @endif>Đã kích hoạt</option>
                  <option value="0" @if ( $category->status == 0  ) selected @endif>Đã vô hiệu</option>
                </select>
                @if ($errors->first('status')) 
                  <div class="error">{{ $errors->first('status') }}</div>
                @endif
              </div>
            </div>
          </div>
          <div class="widget meta-boxes">
            <div class="widget-title">
              <h4><label for="car_id" class="control-label required">Chuyên mục</label></h4>
            </div>
            <div class="widget-body">
              <div class="form-group form-group-no-margin ">
                <div class="multi-choices-widget list-item-checkbox">
                  @if(count($categories)>0)
                    {!! \App\Helpers\Common::showCategories($categories,$category->parent_id,$category->id,'parent_id') !!}
                  @endif
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </section>
@stop
@section('addjs')
  <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
  <script src="/vendor/laravel-filemanager/js/lfm.js"></script>
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
