@extends('layout.master')


@section('content')
    <div class="ban-top">
        <div class="container">
            <div class="agileits-navi_search">
                <form action="#" method="post">
                    <select id="agileinfo-nav_search" name="agileinfo_search" required="">
                        <option value="">{{trans('messages.category')}}</option>
                        <optgroup label="Điện thoại">
                            @foreach($pd_phone as $pp_phone)
                                <option value="{{$pp_phone->id}}">{{$pp_phone->name}}</option>
                            @endforeach
                            
                        </optgroup>
                        <optgroup label="Laptop">
                            @foreach($pd_lap as $pp_lap)
                            <option value="{{$pp_lap->id}}">{{$pp_lap->name}}</option>
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
                                    <a class="nav-stylehead" href="front_end/index.html">Trang chủ
                                        <span class="sr-only">(current)</span>
                                    </a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle nav-stylehead" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Điện thoại
                                        <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu multi-column columns-3">
                                        <div class="agile_inner_drop_nav_info">
                                            <div class="col-sm-4 multi-gd-img">
                                                <ul class="multi-column-dropdown">
                                                    @foreach($pd_phone as $key => $pdl)
                                                    @if($key < 7)
                                                    <li>
                                                        <a href="front_end/product.html">{{str_limit($pdl->name,35)}}</a>
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
                                                        <a href="front_end/product.html">{{str_limit($pdls->name,35)}}</a>
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
                                                        <a href="front_end/product.html">{{$pdlss->name}}</a>
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
                                                        <a href="front_end/product.html">{{$pdlsss->name}}</a>
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
                                    <a class="nav-stylehead" href="faqs.html">Chính sách</a>
                                </li>
                                <li class="dropdown">
                                    <a class="nav-stylehead dropdown-toggle" href="#" data-toggle="dropdown">Pages
                                        <b class="caret"></b>
                                    </a>
                                    <ul class="dropdown-menu agile_short_dropdown">
                                        <li>
                                            <a href="icons.html">Web Icons</a>
                                        </li>
                                        <li>
                                            <a href="typography.html">Typography</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="">
                                    <a class="nav-stylehead" href="about.html">Về chúng tôi</a>
                                </li>
                                <li class="">
                                    <a class="nav-stylehead" href="contact.html">Liên hệ</a>
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
                        <a href="index.html">Home</a>
                        <i>|</i>
                    </li>
                    <li>Kitchen Products</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- //page -->
    <!-- top Products -->
    <div class="ads-grid">
        <div class="container">
            <!-- tittle heading -->
            <h3 class="tittle-w3l">Kitchen Products
                <span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
            </h3>
            <!-- //tittle heading -->
            <!-- product left -->
        <form method="GET" action="{{route('home')}}">
            @csrf
            <div class="side-bar col-md-3">
                <div class="search-hotel">
                    <h3 class="agileits-sear-head">Search Here..</h3>
                   
                        <input type="search" placeholder="Product name..." name="search_name" id="search_name" value="{{app('request')->search_name}}">
                </div>
                <!-- price range -->
                <div class="range">
                    <h3 class="agileits-sear-head">Price range</h3>
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
                <div class="customer-rev left-side">
                    <h3 class="agileits-sear-head">Customer Review</h3>
                    <ul>
                        <li>
                            
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <span>5.0</span>
                           
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                <span>4.0</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star-half-o" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                <span>3.5</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                <span>3.0</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star-half-o" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                <span>2.5</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- //reviews -->
                <!-- cuisine -->
                <div class="left-side">
                    <h3 class="agileits-sear-head">Brand</h3>
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
                    <h3 class="agileits-sear-head">Special Deals</h3>
                @foreach($product_sales as $psl)
                    <div class="special-sec1">
                        <div class="col-xs-4 img-deals">
                            <img src="{{$psl->avatar}}" alt="" class="img_home_hots">
                        </div>
                        <div class="col-xs-8 img-deal1">
                            <h3>{{$psl->name}}</h3>
                            <a href="">$18.00</a>
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
                        @foreach($product_new as $pnn)
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
                                        <span class="item_price">$70.00</span>
                                        <del>{{$pnn->price}}</del>
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
                                                <input type="submit" name="submit" value="Add to cart" class="button" />
                                            </fieldset>
                                        </form>
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
            <h3 class="tittle-w3l">Special Offers
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
                                    <img src="{{$pss->avatar}}" alt="" class="img_home_hot">
                                </a>
                            </div>
                            <div class="product-name-w3l">
                                <h4>
                                    <a href="single.html">{{$pss->name}}/a>
                                </h4>
                                <div class="w3l-pricehkj">
                                    <h6>{{$pss->price}}</h6>
                                    <p>Save $40.00</p>
                                </div>
                                <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                                    <form action="#" method="post">
                                        <fieldset>
                                            <input type="hidden" name="cmd" value="_cart" />
                                            <input type="hidden" name="add" value="1" />
                                            <input type="hidden" name="business" value=" " />
                                            <input type="hidden" name="item_name" value="Aashirvaad, 5g" />
                                            <input type="hidden" name="amount" value="220.00" />
                                            <input type="hidden" name="discount_amount" value="1.00" />
                                            <input type="hidden" name="currency_code" value="USD" />
                                            <input type="hidden" name="return" value=" " />
                                            <input type="hidden" name="cancel_return" value=" " />
                                            <input type="submit" name="submit" value="Add to cart" class="button" />
                                        </fieldset>
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
</script>
@endsection