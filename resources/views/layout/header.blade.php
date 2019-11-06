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
                <a href="{{route('homes')}}">
                    <span>S</span>hopping <span>W</span>ith
                    <img src="{{asset('front_end/images/a51e563621cfc7919ede.jpg')}}" alt=" ">
                </a>
            </h1>
        </div>
        <!-- header-bot -->
        <div class="col-md-8 header">
            <!-- header lists -->
            <ul>
                <li class="hihi">
                    <a class="play-icon popup-with-zoom-anim" href="#small-dialog1">
                        <span class="fa fa-map-marker" aria-hidden="true"></span> {{trans('messages.locator')}}</a>
                </li>
                <li  class="hihi">
                    <a href="#" data-toggle="modal" data-target="#myModal1">
                        <span class="fa fa-truck" aria-hidden="true"></span>{{trans('messages.track')}}</a>
                </li>
                <li  class="hihi">
                    <span class="fa fa-phone" aria-hidden="true"></span> 0356.989.090
                </li>
                @if(Auth::user())
             
                <li  class="hihi">
                    {{-- <a href="#" data-toggle="modal" data-target="#myModal3">
                        {{Auth::user()->name}}
                    </a> --}}
                
                
                <div class="btn-group">
                  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{Auth::user()->name}} <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu">
                    <li><a href="#" data-toggle="modal" data-target="#myModal3">Thông tin cá nhân</a></li>
                    <li><a href="#" data-toggle="modal" data-target="#myModal4">Thay đổi mật khẩu</a></li>
                    <li>
                        <a href="{{route('showCart')}}">Giỏ hàng</a>
                    </li>
                    <li>
                        <a data-toggle="modal" data-target="#myModal5">Lịch sử mua hàng</a>
                    </li>
                    <li><a href="{{route('user.logouta')}}">Đăng xuất</a></li>
                  </ul>
                </div>
                </li>
                @else
                <li  class="hihi">
                    <a href="#" data-toggle="modal" data-target="#myModal1">
                        <span class="fa fa-unlock-alt" aria-hidden="true"></span> {{trans('messages.signin')}} </a>
                </li>
                <li  class="hihi">
                    <a href="#" data-toggle="modal" data-target="#myModal2">
                        <span class="fa fa-pencil-square-o" aria-hidden="true"></span> {{trans('messages.signup')}} </a>
                </li>
                @endif
            </ul>
            <!-- //header lists -->
            <!-- search -->
            <div class="agileits_search">
                <form action="#" method="post">
                    <input name="Search" type="search" placeholder="{{trans('messages.searchwhat')}}" required="">
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
@if(Auth::user())

@else
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
                            <input type="password" placeholder="Nhập lại" name="rePass" id="password2" required="">
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

@endif
@if(Auth::user())
<div class="modal fade" id="myModal3" tabindex="-1" role="dialog">
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
                    <h3 class="agileinfo_sign">Thông tin cá nhân</h3>
                    <form method="POST" id="update_user_pr" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="idUser" value="{{Auth::user()->id}}" placeholder="">
                    <div class="form-group">
                        <label for="">Họ tên:</label>
                        <input type="text" name="nameUser" value="{{Auth::user()->name}}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="">Số điện thoại:</label>
                        <input type="text" name="phoneUser" value="{{Auth::user()->phone}}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="">Ngày sinh:</label>
                        <input type="text" name="dateUser" id="dateUser" value="{{Auth::user()->date}}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="">Địa chỉ 1:</label>
                        <input type="text" name="addressUser" value="{{Auth::user()->address}}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="">Địa chỉ 2:</label>
                        <input type="text" name="addressUser2" value="{{Auth::user()->address_work}}" class="form-control">
                    </div>
                    </form>
                        <a href="javascript:void(0)" class="btn btn-success text-center btn-update-profile-user">Cập nhật</a>
                    <div class="clearfix"></div>
                </div>
        
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- //Modal content-->
    </div>
</div>

<div class="modal fade" id="myModal4" tabindex="-1" role="dialog">
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
                    <h3 class="agileinfo_sign">Thay đổi mật khẩu</h3>
                    <form method="POST" id="update_passw_user_pr" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="idUser" value="{{Auth::user()->id}}" placeholder="">
                    <div class="form-group">
                        <label for="">Mật khẩu cũ:</label>
                        <input type="password" name="passOldUser" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="">Mật khẩu mới:</label>
                        <input type="password" name="passNewUser" value="" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="">Nhập lại mật khẩu:</label>
                        <input type="password" name=""  value="" class="form-control">
                    </div>

                    </form>
                        <a href="javascript:void(0)" class="btn btn-success text-center btn-update-pass-profile-user">Cập nhật</a>
                    <div class="clearfix"></div>
                </div>
        
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- //Modal content-->
    </div>
</div>

<div class="modal fade" id="myModal5" tabindex="-1" role="dialog">
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
                    <h3 class="agileinfo_sign">Thay đổi mật khẩu</h3>
                    <form method="POST" id="update_passw_user_pr" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="idUser" value="{{Auth::user()->id}}" placeholder="">
                    <div class="form-group">
                        <label for="">Mật khẩu cũ:</label>
                        <input type="password" name="passOldUser" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="">Mật khẩu mới:</label>
                        <input type="password" name="passNewUser" value="" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="">Nhập lại mật khẩu:</label>
                        <input type="password" name=""  value="" class="form-control">
                    </div>

                    </form>
                        <a href="javascript:void(0)" class="btn btn-success text-center btn-update-pass-profile-user">Cập nhật</a>
                    <div class="clearfix"></div>
                </div>
        
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- //Modal content-->
    </div>
</div>
@endif
<!-- //Modal2 -->
<!-- //signup Model -->
<!-- //header-bot -->
<!-- navigation -->
