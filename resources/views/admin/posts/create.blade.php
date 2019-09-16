@extends('admin.layouts.master')
@section('title','Thêm bài viết')
@section('content')
  <section class="content">
    {{ Breadcrumbs::render('addpost') }}
    <div class="clearfix"></div>
    <form method="POST" action="{{ route('system_admin.post.store') }}">
      {{ csrf_field() }}
      @if ($errors->all())
        <div class="note note-danger"><p>Vui lòng điền đầy đủ thông tin</p></div>
      @else 
        <div class="note note-success"><p>Bạn đang tạo bài viết mới</p></div>
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
                  <label for="name" class="control-label required">Tiêu đề</label>
                  <input class="form-control" placeholder="Tiêu đề bài đăng" data-counter="120" name="title" type="text" id="title" value="{{ old('title') }}">
                  @if ($errors->first('title')) 
                    <div class="error">{{ $errors->first('title') }}</div>
                  @endif
                </div>
{{--                 <div class="form-group">
                  <label for="description" class="control-label">Mô tả ngắn</label>
                  <textarea class="form-control" rows="4" placeholder="Đoạn văn mô tả ngắn" data-counter="400" name="description" cols="50" id="description"></textarea>
                </div> --}}
{{--                 <div class="form-group">
                  <label>
                    <input type="checkbox" class="minimal" name="featured">
                    Nổi bật?
                  </label>
                </div>   --}}              
                <div class="form-group">
                  <label for="description" class="control-label">Nội dung bài đăng</label>
                  <textarea id="content" name="content" class="form-control">{!! old('content') !!}</textarea>
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
              <h4><span>Đăng bài</span></h4>
            </div>
            <div class="widget-body">
              <div class="btn-set">
                <button type="submit" name="submit" value="save" class="btn btn-info">
                  <i class="fa fa-save"></i> Lưu
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
                  <option value="1" selected="selected">Đã kích hoạt</option>
                  <option value="0">Đã vô hiệu</option>
                </select>
                @if ($errors->first('status')) 
                  <div class="error">{{ $errors->first('status') }}</div>
                @endif
              </div>
            </div>
          </div>
          <div class="widget meta-boxes">
            <div class="widget-title">
              <h4><label for="car_id" class="control-label">Chuyên mục</label></h4>
            </div>
            <div class="widget-body">
              <div class="form-group form-group-no-margin ">
                <div class="multi-choices-widget list-item-checkbox">
                  {!! \App\Helpers\Common::showCategories($categories,0,0,'cat_id') !!}
                </div>
              </div>
            </div>
          </div>
          <div class="widget meta-boxes">
            <div class="widget-title">
              <h4><label for="image" class="control-label">Hình ảnh</label></h4>
            </div>
            <div class="widget-body">
              <div class="image-box">
                <input id="thumbnail" type="hidden" name="thumbnail" value="" class="image-data">
                <div class="preview-image-wrapper ">
                  <img id="holder" class="preview_image" src="{{ asset('images/placeholder.png') }}" type="text" name="filepath" alt="preview image">
                  <a class="btn_remove_image" title="Xoá ảnh">
                    <i class="fa fa-times"></i>
                  </a>
                </div>
                <div class="image-box-actions">
                   <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                     <i class="fa fa-picture-o"></i> Chọn hình ảnh
                   </a>
                </div>
                @if ($errors->first('thumbnail')) 
                  <div class="error">{{ $errors->first('thumbnail') }}</div>
                @endif
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
    $('#lfm').filemanager('image');
  </script>
@stop
