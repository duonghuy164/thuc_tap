@extends('admin.layouts.master')
@section('title','Thêm Danh Mục Mới')
@section('content')
  <section class="content">
    {{ Breadcrumbs::render('addcategory') }}
    <div class="clearfix"></div>
    <form method="POST" action="{{ route('system_admin.category.store') }}">
      {{ csrf_field() }}
      @if ($errors->all())
        <div class="note note-danger"><p>Vui lòng điền đầy đủ thông tin</p></div>
      @else 
        <div class="note note-success"><p>Bạn đang tạo danh mục mới</p></div>
      @endif
      <div class="row">
        <div class="col-md-9">
          <div class="tabbable-custom">
            <ul class="nav nav-tabs ">
              <li class="nav-item">
                <a href="#tab_detail" class="nav-link active show" data-toggle="tab">Chi tiết danh mục</a>
              </li>      
            </ul><!-- end.nav-tabs -->
            <div class="tab-content">
              <div class="tab-pane active show" id="tab_detail">
                <div class="form-group">
                  <label for="title" class="control-label required">Tiêu đề danh mục</label>
                  <input class="form-control" placeholder="Nhập tiêu đề danh mục" data-counter="120" name="title" type="text" id="title" value="{{ old('title') }}">
                  @if ($errors->first('title')) 
                    <div class="error">{{ $errors->first('title') }}</div>
                  @endif
                </div>            
                <div class="form-group">
                  <label for="description" class="control-label">Nội dung danh mục</label>
                  <textarea class="form-control" rows="10" placeholder="Nội dung trang" data-counter="400" name="content" cols="50" id="content">{!! old('content') !!}</textarea>
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
              <h4><span>Tạo danh mục</span></h4>
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
                  @if(count($categories) > 0)
                    {{-- {{dd($categories)}} --}}
                    {!! \App\Helpers\Common::showCategories($categories,0,0,$name = 'parent_id') !!}
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
  <script src="vendor/laravel-filemanager/js/lfm.js"></script>
  <script type="text/javascript">
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
  </script>
@stop
