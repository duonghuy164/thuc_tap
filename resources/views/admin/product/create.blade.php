@extends('admin.layouts.master')
@section('title','Thêm Danh Mục Mới')
@section('addcss')
<style type="text/css">
  .page-heading {
    margin: 20px 0;
    color: #666;
    -webkit-font-smoothing: antialiased;
    font-family: "Segoe UI Light", "Arial", serif;
    font-weight: 600;
    letter-spacing: 0.05em;
}
 
#my-dropzone .message {
    font-family: "Segoe UI Light", "Arial", serif;
    font-weight: 600;
    color: #0087F7;
    font-size: 1.5em;
    letter-spacing: 0.05em;
}
 
.dropzone {
    border: 2px dashed #0087F7;
    background: white;
    border-radius: 5px;
    min-height: 300px;
    padding: 90px 0;
    vertical-align: baseline;
}
</style>
@endsection
@section('content')
  <section class="content">
   {{--  {{ Breadcrumbs::render('addcategory') }} --}}
    <div class="clearfix"></div>
    <form method="POST" action="{{ route('system_admin.product.store') }}" class="dropzone"
      id="my-awesome-dropzone">
      {{ csrf_field() }}
      @if ($errors->all())
        <div class="note note-danger"><p>Vui lòng điền đầy đủ thông tin</p></div>
      @else 
        <div class="note note-success"><p>Bạn đang tạo sản phẩm mới</p></div>
      @endif
      <div class="row">
        <div class="col-md-9">
          <div class="tabbable-custom">
            <ul class="nav nav-tabs ">
              <li class="nav-item">
                <a href="#tab_detail" class="nav-link active show" data-toggle="tab">Chi tiết sản phẩm</a>
              </li>      
            </ul><!-- end.nav-tabs -->
            <div class="tab-content">
              <div class="tab-pane active show" id="tab_detail">
                <div class="form-group">
                  <label for="name_product">Tên sản phẩm</label>
                  <input class="form-control" placeholder="Tên sản phẩm" data-counter="120" name="name_product" type="text" id="name_product" value="{{ old('name_product') }}">
                  @if ($errors->first('name_product')) 
                    <div class="error">{{ $errors->first('name_product') }}</div>
                  @endif
                </div> 

                <div class="form-group">
                  <label for="">Danh mục sản phẩm</label>
                  <select name="category" id=""  class="form-control">
                    <option value="">Chọn danh mục</option>
                    @foreach($category as $ct)
                      <option value="{{$ct->id}}">{{$ct->name}}</option>
                    @endforeach
                  </select>
                   @if ($errors->first('category')) 
                    <div class="error">{{ $errors->first('category') }}</div>
                  @endif
                </div>

                <div class="form-group">
                  <label for="">Thương hiệu sản phẩm</label>
                  <select name="brand" id=""  class="form-control">
                    <option value="">Chọn thương hiệu</option>
                    @foreach($brand as $br)
                      <option value="{{$br->id}}">{{$br->name}}</option>
                    @endforeach
                  </select>
                  @if ($errors->first('brand')) 
                    <div class="error">{{ $errors->first('brand') }}</div>
                  @endif
                </div>

                <div class="form-group">
                  <label for="">Mức giá sản phẩm</label>
                  <select name="price" id=""  class="form-control">
                    <option value="">Chọn mức giá</option>
                    @foreach($price as $brs)
                      <option value="{{$brs->id}}">{{$brs->name}}</option>
                    @endforeach
                  </select>
                  @if ($errors->first('price')) 
                    <div class="error">{{ $errors->first('price') }}</div>
                  @endif
                </div>


                <div class="form-group">
                  <label for="">Màu sắc sản phẩm</label>
                
                  <select id=""  class="form-control js-example-basic-multiple" name="color[]" multiple="multiple">
                    <option value="">Chọn màu sắc</option>
                    @foreach($color as $cl)
                      <option value="{{$cl->id}}">{{$cl->name}}</option>
                    @endforeach
                  </select>
                  @if ($errors->first('color')) 
                    <div class="error">{{ $errors->first('color') }}</div>
                  @endif
                </div>

                <div class="form-group">
                  <label for="">Ram sản phẩm</label>
                  <select name="ram" id=""  class="form-control">
                    <option value="">Chọn ram</option>
                    @foreach($ram as $brww)
                      <option value="{{$brww->id}}">{{$brww->name}}</option>
                    @endforeach
                  </select> 
                  @if ($errors->first('ram')) 
                    <div class="error">{{ $errors->first('ram') }}</div>
                  @endif
                </div>

                <div class="form-group">
                  <label for="">Bộ nhớ sản phẩm</label>
                  <select name="hard" id=""  class="form-control">
                    <option value="">Chọn bộ nhớ</option>
                    @foreach($hard as $hd)
                      <option value="{{$hd->id}}">{{$hd->name}}</option>
                    @endforeach
                  </select>

                  @if ($errors->first('hard')) 
                    <div class="error">{{ $errors->first('hard') }}</div>
                  @endif
                </div>
 
                <div class="form-group">
                  <label for="">Màn hình sản phẩm</label>
                  <select name="screen" id=""  class="form-control">
                    <option value="">Chọn màn hình</option>
                    @foreach($screen as $bsr)
                      <option value="{{$bsr->id}}">{{$bsr->name}}</option>
                    @endforeach
                  </select>
                   @if ($errors->first('screen')) 
                    <div class="error">{{ $errors->first('screen') }}</div>
                  @endif
                </div> 

                <div class="form-group">
                  <label for="">CPU sản phẩm</label>
                  <select name="cpu" id=""  class="form-control">
                    <option value="">Chọn cpu</option>
                    @foreach($cpu as $brscs)
                      <option value="{{$brscs->id}}">{{$brscs->name}}</option>
                    @endforeach
                  </select>
                   @if ($errors->first('cpu')) 
                    <div class="error">{{ $errors->first('cpu') }}</div>
                  @endif
                  
                </div>

                <div class="form-group">
                  <label for="">Hình ảnh sản phẩm</label>

                  <input type="hidden" name="cruise_gallery" id="cruise_gallery" >
                  <div class="dropzone dropzone-previews" id="my-awesome-dropzone"></div>
                </div>
                
 
        
                <div class="form-group">
                  <label for="">Khuyến mãi sản phẩm</label>
                  <textarea name="promotion"></textarea>
                </div>

                <div class="form-group">
                  <label for="">Giá sản phẩm</label>
                  <input class="form-control" placeholder="Giá sản phẩm" data-counter="120" name="price_product" type="text" id="price_product" value="{{ old('title') }}">
                  @if ($errors->first('price_product')) 
                    <div class="error">{{ $errors->first('price_product') }}</div>
                  @endif
                </div>

                <div class="form-group">
                  <label for="">Sale sản phẩm</label>
                  <input class="form-control" placeholder="Sale sản phẩm" data-counter="120" name="sale_product" type="text" id="sale_product" value="{{ old('title') }}">
                   @if ($errors->first('sale_product')) 
                    <div class="error">{{ $errors->first('sale_product') }}</div>
                  @endif
                </div>

                <div class="form-group">
                  <label for="">Số lượng sản phẩm</label>
                  <input class="form-control" placeholder="Số lượng sản phẩm" data-counter="120" name="qty_product" type="text" id="qty_product" value="{{ old('title') }}">
                   @if ($errors->first('qty_product')) 
                    <div class="error">{{ $errors->first('qty_product') }}</div>
                  @endif
                </div>           
                
                 <div class="form-group">
                  <label for="">Mô tả sản phẩm</label>
                  <textarea name="description"></textarea>
                  @if ($errors->first('description')) 
                    <div class="error">{{ $errors->first('description') }}</div>
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
    </form>
  </section>
@stop
@section('addjs')
  <script src="vendor/laravel-filemanager/js/lfm.js"></script>

  <script type="text/javascript">
     $('#lfm').filemanager('image');
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    });
    $(document).ready(function() {
      $('.js-example-basic-multiple').select2();
    });
    CKEDITOR.replace( 'promotion' );
    CKEDITOR.replace( 'description' );

  </script>
@stop
