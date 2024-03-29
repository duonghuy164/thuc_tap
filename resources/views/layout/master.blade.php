
<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Chào mừng bạn đến với BHQ Shop</title>
    <!--/tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="BHQ Shop, web ban hang, mua sam online, dien thoai thong minh,smart phone,laptop,máy tính sách tay, Samsung, SonyEricsson, Motorola,LG,Asus,MSI,
		Dell,Macbook,HP,Oppo,Huawei,Siêu thị điện máy,điện tử,gia dụng,điện máy xanh" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!--//tags -->
    <link href="{{asset('front_end/css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{asset('front_end/css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{asset('front_end/css/font-awesome.css')}}" rel="stylesheet')}}">
    <!--pop-up-box-->
    <link href="{{asset('front_end/css/popuo-box.css')}}" rel="stylesheet" type="text/css" media="all" />
    <!--//pop-up-box-->
    <!-- price range -->
    <link rel="stylesheet" type="text/css" href="{{asset('front_end/css/jquery-ui1.css')}}">
    <!-- fonts -->
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet')}}">

   
  <!-- Demo CSS -->
    {{-- <link rel="stylesheet" href="{{asset('css/demo.css')}}" type="text/css" media="screen" /> --}}
    <link rel="stylesheet" href="{{asset('css/flexslider.css')}}" type="text/css" media="screen" />

    <!-- Modernizr -->
  
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>

<body>
{{--header--}}
@include('layout.header')
{{--endheader--}}
<!-- shop locator (popup) -->
<!-- Button trigger modal(shop-locator) -->

{{--content--}}
@yield('content')
{{--endcontent--}}
<!-- //special offers -->
<!-- newsletter -->

<!-- //newsletter -->
<!-- footer -->
@include('layout.footer')
<!-- //footer -->

<!-- js-files -->
<!-- jquery -->
<script src="{{asset('front_end/js/jquery-2.1.4.min.js')}}"></script>
<!-- //jquery -->

<!-- popup modal (for signin & signup)-->
<script src="{{asset('front_end/js/jquery.magnific-popup.js')}}"></script>
<script>
    $(document).ready(function () {
        $('.popup-with-zoom-anim').magnificPopup({
            type: 'inline',
            fixedContentPos: false,
            fixedBgPos: true,
            overflowY: 'auto',
            closeBtnInside: true,
            preloader: false,
            midClick: true,
            removalDelay: 300,
            mainClass: 'my-mfp-zoom-in'
        });

    });
</script>
<!-- Large modal -->
<!-- <script>
    $('#').modal('show');
</script> -->
<!-- //popup modal (for signin & signup)-->

<!-- cart-js -->
<script src="{{asset('front_end/js/minicart.js')}}"></script>
<script>
    paypalm.minicartk.render(); //use only unique class names other than paypal1.minicart1.Also Replace same class name in css and minicart.min.js

    paypalm.minicartk.cart.on('checkout', function (evt) {
        var items = this.items(),
            len = items.length,
            total = 0,
            i;

        // Count the number of each item in the cart
        for (i = 0; i < len; i++) {
            total += items[i].get('quantity');
        }

        if (total < 3) {
            alert('The minimum order quantity is 3. Please add more to your shopping cart before checking out');
            evt.preventDefault();
        }
    });
</script>
<!-- //cart-js -->

<!-- price range (top products) -->
<script src="{{asset('front_end/js/jquery-ui.js')}}"></script>
<script>
    //<![CDATA[
    $(window).load(function () {
        $("#slider-range").slider({
            range: true,
            min: 0,
            max: 9000,
            values: [50, 6000],
            slide: function (event, ui) {
                $("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
            }
        });
        $("#amount").val("$" + $("#slider-range").slider("values", 0) + " - $" + $("#slider-range").slider("values", 1));

    }); //]]>
</script>
<!-- //price range (top products) -->

<!-- flexisel (for special offers) -->
<script src="{{asset('front_end/js/jquery.flexisel.js')}}"></script>
<script>
    $(window).load(function () {
        $("#flexiselDemo1").flexisel({
            visibleItems: 3,
            animationSpeed: 1000,
            autoPlay: true,
            autoPlaySpeed: 3000,
            pauseOnHover: true,
            enableResponsiveBreakpoints: true,
            responsiveBreakpoints: {
                portrait: {
                    changePoint: 480,
                    visibleItems: 1
                },
                landscape: {
                    changePoint: 640,
                    visibleItems: 2
                },
                tablet: {
                    changePoint: 768,
                    visibleItems: 2
                }
            }
        });

    });
</script>
<!-- //flexisel (for special offers) -->

<!-- password-script -->
<script>
    window.onload = function () {
        document.getElementById("password1").onchange = validatePassword;
        document.getElementById("password2").onchange = validatePassword;
    }

    function validatePassword() {
        var pass2 = document.getElementById("password2").value;
        var pass1 = document.getElementById("password1").value;
        if (pass1 != pass2)
            document.getElementById("password2").setCustomValidity("Passwords Don't Match");
        else
            document.getElementById("password2").setCustomValidity('');
        //empty string means no validation error
    }
</script>
<!-- //password-script -->

<!-- smoothscroll -->
<script src="{{asset('front_end/js/SmoothScroll.min.js')}}"></script>
<!-- //smoothscroll -->

<!-- start-smooth-scrolling -->
<script src="{{asset('front_end/js/move-top.js')}}"></script>
<script src="{{asset('front_end/js/easing.js')}}"></script>
<script>
    jQuery(document).ready(function ($) {
        $(".scroll").click(function (event) {
            event.preventDefault();

            $('html,body').animate({
                scrollTop: $(this.hash).offset().top
            }, 1000);
        });
    });
</script>
<!-- //end-smooth-scrolling -->

<!-- smooth-scrolling-of-move-up -->
<script>
    $(document).ready(function () {
        /*
        var defaults = {
            containerID: 'toTop', // fading element id
            containerHoverID: 'toTopHover', // fading element hover id
            scrollSpeed: 1200,
            easingType: 'linear'
        };
        */
        $().UItoTop({
            easingType: 'easeOutQuart'
        });

    });
</script>
<!-- //smooth-scrolling-of-move-up -->

<!-- for bootstrap working -->
<script src="{{asset('front_end/js/bootstrap.js')}}"></script>
<!-- //for bootstrap working -->
<!-- //js-files -->
<!--Start of Tawk.to Script-->
<script type="text/javascript')}}">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5db6d803154bf74666b659aa/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<script src="{{asset('js/modernizr.js')}}"></script>
<script defer src="{{asset('js/jquery.flexslider.js')}}"></script>
<script type="text/javascript">
    $(function(){
      SyntaxHighlighter.all();
    });
    $(window).load(function(){
      $('.flexslider').flexslider({
        animation: "slide",
        start: function(slider){
          $('body').removeClass('loading');
        }
      });
    });
  </script>
<script type="text/javascript" src="{{asset('js/shCore.js')}}"></script>
<script type="text/javascript" src="{{asset('js/shBrushXml.js')}}"></script>
<script type="text/javascript" src="{{asset('js/shBrushJScript.js')}}"></script>

  <!-- Optional FlexSlider Additions -->
<script src="{{asset('js/jquery.easing.js')}}"></script>
<script src="{{asset('js/jquery.mousewheel.js')}}"></script>
<script defer src="{{asset('js/demo.js')}}"></script>
@yield('addjs')
<!--End of Tawk.to Script-->
</body>

</html>
