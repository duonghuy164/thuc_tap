@extends('layout.master')


@section('content')
    <div class="page-head_agile_info_w3l">

    </div>
    <!-- //banner-2 -->
    <!-- page -->
    <div class="services-breadcrumb">
        <div class="agile_inner_breadcrumb">
            <div class="container">
                <ul class="w3_short">
                    <li>
                        <a href="{{route('home')}}">Home</a>
                        <i>|</i>
                    </li>
                    
                </ul>
            </div>
        </div>
    </div>
    <!-- //page -->
    <!-- top Products -->
    <div class="ads-grid">
        <div class="container">
            <!-- tittle heading -->
            <h3 class="tittle-w3l">
                Kết quả tìm kiếm: {{count($product)}}
                <span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
            </h3>
            <!-- //tittle heading -->
            <!-- product left -->
        <form method="GET" action="{{route('search')}}">
            @csrf
            <div class="side-bar col-md-3">
                <div class="search-hotel">
                    <h3 class="agileits-sear-head">{{trans('messages.searchhere')}}</h3>
                   
                        <input type="search" placeholder="{{trans('messages.productname')}}" name="search_name" id="search_name" value="{{app('request')->search_name}}">
                </div>
                <!-- price range -->
                <div class="range">
                    <h3 class="agileits-sear-head">{{trans('messages.pricerange')}}</h3>
                    <select name="name_price" id="name_price">
                        @foreach($price as $pr)
                            <option value="{{$pr->id}}" {{app('request')->name_price == $pr->id ? 'selected' : ''}}>{{$pr->name}}</option>
                        @endforeach
                    </select>
                </div>
                <!-- //price range -->
                <!-- food preference -->
                
                <!-- //food preference -->
                <!-- discounts -->
                
                <!-- //discounts -->
                <!-- reviews -->
                
                <!-- //reviews -->
                <!-- cuisine -->
                <div class="left-side">
                    <h3 class="agileits-sear-head">{{trans('messages.brand')}}</h3>
                    <ul>
                        @foreach($brand as $br)
                            <li>
                                <input type="checkbox" class="checked name_brand" name="name_brand[]" id="{{$br->id}}" value="{{$br->id}}" {{ in_array($br->id, $name_brands) ? 'checked' : '' }}>
                                <label class="span" for="{{$br->id}}">{{$br->name}}</label>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <!-- //cuisine -->
                <!-- deals -->
                
                <!-- //deals -->
            </div>
        </form>
            <!-- //product left -->
            <!-- product right -->
            <div class="agileinfo-ads-display col-md-9 w3l-rightpro">
                <div class="wrapper">
                    <!-- first section -->
                   
                    <!-- //first section -->
                    <!-- 2nd section) -->
                    <div class="product-sec1">
                        <h1 class="text-center">Điện Thoại</h1>
                        @foreach($product  as $pnn) 
                            <div class="col-md-4 product-men">
                            <div class="men-pro-item simpleCart_shelfItem">
                                <div class="men-thumb-item">
                                    <img src="{{$pnn->avatar}}" alt="" class="img_home_hot">
                                    <div class="men-cart-pro">
                                        <div class="inner-men-cart-pro">
                                            <a href="{{route('detail',['id'=>$pnn->id])}}" class="link-product-add-cart">Quick View</a>
                                        </div>
                                    </div>
                                    <span class="product-new-top">New</span>
                                </div>
                                <div class="item-info-product ">
                                    <h4>
                                        <a href="single.html">{{$pnn->name}}</a>
                                    </h4>
                                    <div class="info-product-price">
                                        <span class="item_price">{{number_format($pnn->price - ($pnn->price * $pnn->sale/100)) }} VNĐ</span>
                                        <del>{{number_format($pnn->price)}} VNĐ</del>
                                    </div>
                                    <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                                        <form action="#" method="post">
                                            <fieldset>
                                                <input type="hidden" name="cmd" value="_cart" />
                                                <input type="hidden" name="add" value="1" />
                                                <input type="hidden" name="business" value=" " />
                                                <input type="hidden" name="item_name" value="Organicana Red Chilli Powder, 100g" />
                                                <input type="hidden" name="amount" value="70.00" />
                                                <input type="hidden" name="discount_amount" value="1.00" />
                                                <input type="hidden" name="currency_code" value="USD" />
                                                <input type="hidden" name="return" value=" " />
                                                <input type="hidden" name="cancel_return" value=" " />
                                                @if($pnn->qty > 0)
                                                 <a href="javascript:void(0)" class="btn btn-primary add_toCart" id="{{$pnn->id}}">{{trans('messages.addtocart')}}</a>
                                                @else
                                                <a href="javascript:void(0)" class="btn btn-warning">Tạm hết</a>
                                                @endif
                                            </fieldset>
                                        </form>
                                    </div>

                                </div>
                            </div>
                            </div>

                        @endforeach
                        
                      
                        <div class="clearfix"></div>
                        <nav aria-label="Page navigation" style="text-align: center;">
                            {{ $product->links() }}
                        </nav>
                    </div>
                
                </div>
            </div>
            <!-- //product right -->
        </div>
    </div>

@endsection
@section('addjs')
<script type="text/javascript">
    $('#search_name').change(function(){
        $(this).closest('form').submit();
    });
    $('#name_price').change(function(){
        $(this).closest('form').submit();
    });
    $('.name_brand').change(function(){
        $(this).closest('form').submit();
    });

    $('.add_toCart').click(function(){
        @if(Auth::user())
            var id_pr = $(this).attr('id');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url:"{{route('addToCart')}}",
                type:"POST",
                data:{id:id_pr},

                success:function(data){
                    if(data.msg == 'OK'){
                       Swal.fire(
                          'Thành công!',
                          'Thêm sản phẩm vào giỏ hàng thành công!',
                          'success'
                        )
                        // location.reload();
                    }
                } 
            });
        @else
            Swal.fire(
                      'Thất bại!',
                      'Vui lòng đăng nhập để có thể thêm vào giỏ hàng!',
                      'error'
                    )
        @endif
});
</script>
@endsection