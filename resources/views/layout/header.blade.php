<!-- top-header -->
<div class="header-most-top">
    <p>Mua sắm Smart phone, Laptop với những DEAL đỉnh cao</p>
</div>
<!-- //top-header -->
<!-- header-bot-->
<div class="header-bot">
    <div class="header-bot_inner_wthreeinfo_header_mid">
        <!-- header-bot-->
        <div class="col-md-4 logo_agile">
            <h1>
                <a href="{{route('home')}}">
                    <span>G</span>rocery
                    <span>S</span>hoppy
                    <img src="{{asset('front_end/images/logo2.png')}}" alt=" ">
                </a>
            </h1>
        </div>
        <!-- header-bot -->
        <div class="col-md-8 header">
            <!-- header lists -->
            <ul>
                <li>
                    <a class="play-icon popup-with-zoom-anim" href="#small-dialog1">
                        <span class="fa fa-map-marker" aria-hidden="true"></span> Vị Trí</a>
                </li>
                <li>
                    <a href="#" data-toggle="modal" data-target="#myModal1">
                        <span class="fa fa-truck" aria-hidden="true"></span>Vận Chuyển</a>
                </li>
                <li>
                    <span class="fa fa-phone" aria-hidden="true"></span> 0356.989.090
                </li>
                <li>
                    <a href="#" data-toggle="modal" data-target="#myModal1">
                        <span class="fa fa-unlock-alt" aria-hidden="true"></span> Đăng Nhập </a>
                </li>
                <li>
                    <a href="#" data-toggle="modal" data-target="#myModal2">
                        <span class="fa fa-pencil-square-o" aria-hidden="true"></span> Đăng Ký </a>
                </li>
            </ul>
            <!-- //header lists -->
            <!-- search -->
            <div class="agileits_search">
                <form action="#" method="post">
                    <input name="Search" type="search" placeholder="Bạn tìm gì ngày hôm nay ?" required="">
                    <button type="submit" class="btn btn-default" aria-label="Left Align">
                        <span class="fa fa-search" aria-hidden="true"> </span>
                    </button>
                </form>
            </div>
            <!-- //search -->
            <!-- cart details -->
            <div class="top_nav_right">
                <div class="wthreecartaits wthreecartaits2 cart cart box_1">
                    <form action="#" method="post" class="last">
                        <input type="hidden" name="cmd" value="_cart">
                        <input type="hidden" name="display" value="1">
                         <button class="w3view-cart" type="submit" name="submit" value="">
                            <i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
                        </button>
                    </form>
                </div>
            </div>
            <!-- //cart details -->
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<div id="small-dialog1" class="mfp-hide">
    <div class="select-city">
        <h3>Chọn thành phố của bạn</h3>
        <select class="list_of_cities">
            @foreach($city as $ct)
                <option value="{{$ct->id}}">{{$ct->name}}</option>
            @endforeach
        </select>
        <div class="clearfix"></div>
    </div>
</div>
<!-- //shop locator (popup) -->
<!-- signin Model -->
<!-- Modal1 -->
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body modal-body-sub_agile">
                <div class="main-mailposi">
                    <span class="fa fa-envelope-o" aria-hidden="true"></span>
                </div>
              
                @if(Auth::user())
                    <div class="modal_body_left modal_body_left1">
                    <h3 class="agileinfo_sign">{{Auth::user()->name}} </h3>
                @else
                    <div class="modal_body_left modal_body_left1">
                    <h3 class="agileinfo_sign">Sign In </h3>
                    <p>
                        Đăng nhập, Để bắt đầu mua sắm với BHQ ngay. Bạn chưa có tài khoản?
                        <a href="#" data-toggle="modal" data-target="#myModal2">
                            Đăng ký ngay</a>
                    </p>
                    <form method="POST" enctype="multipart/form-data" id="upload_form_login">
                        @csrf
                        <div class="styled-input agile-styled-input-top">
                            <input type="text" placeholder="User Name" name="email" required="">
                        </div>
                        <div class="styled-input">
                            <input type="password" placeholder="Password" name="password" required="">
                        </div>
                            <a href="javascript:void(0)" class="btn btn-primary btn_login">Login</a>
                            <p class="error_email_not"></p>
                    </form>
                    <div class="clearfix"></div>
                </div>
                @endif
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- //Modal content-->
    </div>
</div>
<!-- //Modal1 -->
<!-- //signin Model -->
<!-- signup Model -->
<!-- Modal2 -->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body modal-body-sub_agile">
                <div class="main-mailposi">
                    <span class="fa fa-envelope-o" aria-hidden="true"></span>
                </div>
                <div class="modal_body_left modal_body_left1">
                    <h3 class="agileinfo_sign">Đăng ký</h3>
                    <p>
                        Kết nối với chúng tôi! Hãy tạo tài khoản của bạn.
                    </p>
                    <form method="POST" enctype="multipart/form-data" id="upload_form_sign_up">
                        @csrf
                        <div class="styled-input agile-styled-input-top">
                            <input type="text" placeholder="Họ và Tên" name="name" required="">
                        </div>
                        <div class="styled-input">
                            <input type="email" placeholder="E-mail" name="email" required="">
                        </div>
                        <div class="styled-input">
                            <input type="password" placeholder="Mật khẩu" name="password" id="password1" required="">
                        </div>
                        <div class="styled-input">
                            <input type="password" placeholder="Nhập lại" name="Confirm Password" id="password2" required="">
                        </div>
                        <a href="javascript:void(0)" class="btn btn-success btn-sign-in">Đăng ký</a>
                    </form>
                    <p>
                        <a href="#" class="text_error">Bằng cách ấn đăng ký, Tôi đã đồng ý với những điều khoản của các bạn</a>
                        <a href="#" class="text_submit"></a>
                    </p>
                </div>
            </div>
        </div>
        <!-- //Modal content-->
    </div>
</div>
<!-- //Modal2 -->
<!-- //signup Model -->
<!-- //header-bot -->
<!-- navigation -->
