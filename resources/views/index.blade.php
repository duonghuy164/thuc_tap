@extends('layout.master')


@section('content')
    <div class="ban-top">
        <div class="container">
            <div class="agileits-navi_search">
                <form action="#" method="post">
                    <select id="agileinfo-nav_search" name="agileinfo_search" required="">
                        <option value="">{{trans('messages.category')}}</option>
                        <optgroup label="{{trans('messages.phone')}}">
                            @foreach($pd_phone as $pp_phone)
                                <option value="{{$pp_phone->id}}">
                                    <a href="{{route('detail',['id'=>$pp_phone->id])}}">{{$pp_phone->name}}</a></option>
                            @endforeach
                            
                        </optgroup>
                        <optgroup label="Laptop">
                            @foreach($pd_lap as $pp_lap)
                            <option value="{{$pp_lap->id}}">
                                <a href="{{route('detail',['id'=>$pp_lap->id])}}">{{$pp_lap->name}}</a></option>
                            @endforeach
                        </optgroup>
                    </select>
                </form>
            </div>
            <div class="top_nav_left">
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"
                                    aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse menu--shylock" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav menu__list">
                                <li class="active">
                                    <a class="nav-stylehead" href="front_end/{{route('home')}}">{{trans('messages.home')}}
                                        <span class="sr-only">(current)</span>
                                    </a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle nav-stylehead" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{trans('messages.phone')}}
                                        <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu multi-column columns-3">
                                        <div class="agile_inner_drop_nav_info">
                                            <div class="col-sm-4 multi-gd-img">
                                                <ul class="multi-column-dropdown">
                                                    @foreach($pd_phone as $key => $pdl)
                                                    @if($key < 7)
                                                    <li>
                                                        <a href="{{route('detail',['id'=>$pdl->id])}}">{{str_limit($pdl->name,35)}}</a>
                                                    </li>
                                                    @endif
                                                    @endforeach
                                                   
                                                </ul>
                                            </div>
                                            <div class="col-sm-4 multi-gd-img">
                                                <ul class="multi-column-dropdown">
                                                     @foreach($pd_phone as $keys => $pdls)
                                                    @if($keys > 7 && $keys < 14)
                                                    <li>
                                                        <a href="{{route('detail',['id'=>$pdls->id])}}">{{str_limit($pdls->name,35)}}</a>
                                                    </li>
                                                    @endif
                                                    @endforeach
                                                </ul>
                                            </div>
                                            <div class="col-sm-4 multi-gd-img">
                                                <img src="front_end/images/nav.png" alt="">
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle nav-stylehead" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Laptop
                                        <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu multi-column columns-3">
                                        <div class="agile_inner_drop_nav_info">
                                            <div class="col-sm-6 multi-gd-img">
                                                <ul class="multi-column-dropdown">

                                                   @foreach($pd_lap as $keyss => $pdlss)
                                                    @if($keyss < 7 )
                                                    <li>
                                                        <a href="{{route('detail',['id'=>$pdlss->id])}}">{{$pdlss->name}}</a>
                                                    </li>
                                                    @endif
                                                    @endforeach
                                                </ul>
                                            </div>
                                            <div class="col-sm-6 multi-gd-img">
                                                <ul class="multi-column-dropdown">
                                                   @foreach($pd_lap as $keysss => $pdlsss)
                                                    @if($keysss > 7 && $keysss <14 )
                                                    <li>
                                                        <a href="{{route('detail',['id'=>$pdlsss->id])}}">{{$pdlsss->name}}</a>
                                                    </li>
                                                    @endif
                                                    @endforeach
                                                </ul>
                                            </div>
                                            <div class="col-sm-4 multi-gd-img">
                                                <img src="front_end/images/nav2.png" alt="">
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </ul>
                                </li>
                                <li class="">
                                    <a class="nav-stylehead" href="faqs.html">{{trans('messages.policy')}}</a>
                                </li>
                                <li class="">
                                    <a class="nav-stylehead" href="about.html">{{trans('messages.about')}}</a>
                                </li>
                                <li class="">
                                    <a class="nav-stylehead" href="contact.html">{{trans('messages.contact')}}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- //navigation -->
    <!-- banner-2 -->
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
            <h3 class="tittle-w3l">BHQ
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
                <div class="deal-leftmk left-side">
                    <h3 class="agileits-sear-head">{{trans('messages.specialdeals')}}</h3>
                @foreach($product_sales as $psl)
                    <div class="special-sec1">
                        <div class="col-xs-4 img-deals">
                            <img src="{{$psl->avatar}}" alt="" class="img_home_hots">
                        </div>
                        <div class="col-xs-8 img-deal1">
                            <h3>{{str_limit($psl->name,30)}}</h3>
                            <a href="">{{number_format($psl->price)}} VNĐ</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                @endforeach  
                </div>
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
                        @foreach($pd_phone  as $pnn) 
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
                    </div>
                    <div class="product-sec1 product-sec2">
                        <div class="col-xs-7 effect-bg">
                            <h3 class="">Pure Energy</h3>
                            <h6>Enjoy our all healthy Products</h6>
                            <p>Get Extra 10% Off</p>
                        </div>
                        <h3 class="w3l-nut-middle">Nuts & Dry Fruits</h3>
                        <div class="col-xs-5 bg-right-nut">
                            <img src="front_end/images/nut1.png" alt="">
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="product-sec1">
                        <h1 class="text-center">LapTop</h1>
                        @foreach($pd_lap  as $pnn)
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
                                        <del>{{number_format($pnn->price) }} VNĐ</del>
                                    </div>
                                    <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                                        @if($pnn->qty > 0)
                                                 <a href="javascript:void(0)" class="btn btn-primary add_toCart" id="{{$pnn->id}}">{{trans('messages.addtocart')}}</a>
                                                @else
                                                <a href="javascript:void(0)" class="btn btn-warning">Tạm hết</a>
                                                @endif

                                    </div>

                                </div>
                            </div>
                            </div>
                        @endforeach

                      
                        <div class="clearfix"></div>
                    </div>
                    
                    <!-- //2nd section  -->
                    <!-- 3rd section -->
                    
                    <!-- //4th section  -->

                </div>
            </div>
            <!-- //product right -->
        </div>
    </div>
    <!-- //top products -->
    <!-- special offers -->
    <div class="featured-section" id="projects">
        <div class="container">
            <!-- tittle heading -->
            <h3 class="tittle-w3l">{{trans('messages.specialoffers')}}
                <span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
            </h3>
            <!-- //tittle heading -->
            <div class="content-bottom-in">
                <ul id="flexiselDemo1">
                    @foreach($product_sale as $pss)
                    <li>
                        <div class="w3l-specilamk">
                            <div class="speioffer-agile">
                                <a href="single.html">
                                    <img src="{{$pss->avatar}}" alt="" class="img_home_hotss">
                                </a>
                            </div>
                            <div class="product-name-w3l">
                                <h4>
                                    <a href="single.html">{{$pss->name}}/a>
                                </h4>
                                <div class="w3l-pricehkj">
                                    <h6>{{number_format($pss->price)}} VNĐ</h6>
                                 
                                </div>
                                <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                                    
                                            @if($pss->qty > 0)
                                                 <a href="javascript:void(0)" class="btn btn-primary add_toCart" id="{{$pss->id}}">{{trans('messages.addtocart')}}</a>
                                                @else
                                                <a href="javascript:void(0)" class="btn btn-warning">Tạm hết</a>
                                                @endif

                                    </form>
                                </div>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
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