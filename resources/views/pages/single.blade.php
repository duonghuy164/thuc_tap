@extends('layout.master')
@section('content')
    <!-- page -->
    <div class="services-breadcrumb">
        <div class="agile_inner_breadcrumb">
            <div class="container">
                <ul class="w3_short">
                    <li>
                        <a href="index.html">Home</a>
                        <i>|</i>
                    </li>
                    <li>{{$pr->name}}</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- //page -->
    <!-- Single Page -->
    <div class="banner-bootom-w3-agileits">
        <div class="container">
            <!-- tittle heading -->
            <h3 class="tittle-w3l">{{$pr->name}}
                <span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
            </h3>
            <!-- //tittle heading -->
            <div class="col-md-5 single-right-left ">
                <div class="grid images_3_of_2">
                    <div id="slider" class="flexslider">
                        <ul class="slides">
                            @foreach($image as $im)
                            <li>
                               <img src="{{asset($im->name)}}"> 
                            </li>
                            @endforeach
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    
                </div>
            </div>
            <div class="col-md-7 single-right-left simpleCart_shelfItem">
                <h3>{{$pr->name}}</h3>
                <div class="rating1">
					<span class="starRating">
						<input id="rating5" type="radio" name="rating" value="5" {{$pr->rate == 5 ? 'checked' : ''}}>
						<label for="rating5">5</label>
						<input id="rating4" type="radio" name="rating" value="4" {{$pr->rate == 4 ? 'checked' : ''}}>
						<label for="rating4">4</label>
						<input id="rating3" type="radio" name="rating" value="3" {{$pr->rate == 3 ? 'checked' : ''}}>
						<label for="rating3">3</label>
						<input id="rating2" type="radio" name="rating" value="2" {{$pr->rate == 2 ?  'checked' : ''}}>
						<label for="rating2">2</label>
						<input id="rating1" type="radio" name="rating" value="1" {{$pr->rate == 1 ? 'checked' : ''}}>
						<label for="rating1">1</label>
					</span>
                </div>
                <p>
                    <span class="item_price">{{number_format($pr->price)}}</span>
                    <del>$1300.00</del>
                    <label>Free delivery</label>
                </p>
                <div class="single-infoagile">
                    {!! $pr->description !!}
                </div>
                <div class="product-single-w3l">
                    {!! $pr->promotion !!}
                </div>
                <div class="occasion-cart">
                    <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                        <form action="#" method="post">
                            <fieldset>
                                <input type="hidden" name="cmd" value="_cart" />
                                <input type="hidden" name="add" value="1" />
                                <input type="hidden" name="business" value=" " />
                                <input type="hidden" name="item_name" value="Zeeba Premium Basmati Rice - 5 KG" />
                                <input type="hidden" name="amount" value="950.00" />
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
            <div class="clearfix"> </div>
        </div>
    </div>
    <!-- //Single Page -->
    <!-- special offers -->
    <div class="featured-section" id="projects">
        <div class="container">
            <!-- tittle heading -->
            <h3 class="tittle-w3l">Add More
                <span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
            </h3>
            <!-- //tittle heading -->
            <div class="content-bottom-in">
                <ul id="flexiselDemo1">
                    @foreach($product_sales as $ps)
                    <li>
                        <div class="w3l-specilamk">
                            <div class="speioffer-agile">
                                <a href="single.html">
                                    <img src="{{asset($ps->avatar)}}" class="img_home_hots" alt="">
                                </a>
                            </div>
                            <div class="product-name-w3l">
                                <h4>
                                    <a href="single.html">{{$ps->name}}</a>
                                </h4>
                                <div class="w3l-pricehkj">
                                    <h6>{{number_format($ps->price)}}</h6>
                                    <p>Save ${{$ps->sale}}</p>
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
    <!-- //special offers -->

    <!-- newsletter -->
    <div class="footer-top">
        <div class="container-fluid">
            <div class="col-xs-8 agile-leftmk">
                <h2>Get your Groceries delivered from local stores</h2>
                <p>Free Delivery on your first order!</p>
                <form action="#" method="post">
                    <input type="email" placeholder="E-mail" name="email" required="">
                    <input type="submit" value="Subscribe">
                </form>
                <div class="newsform-w3l">
                    <span class="fa fa-envelope-o" aria-hidden="true"></span>
                </div>
            </div>
            <div class="col-xs-4 w3l-rightmk">
                <img src="{{asset('front_end/images/tab3.png')}}" alt=" ">
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <!-- //newsletter -->

@endsection
@section('addjs')
<script type="text/javascript">
$(window).load(function() {
  $('.flexslider').flexslider({
    animation: "slide"
  });
});
</script>
@endsection