<div class="footer-top">
    <div class="container-fluid">
        <div class="col-xs-8 agile-leftmk">
            <h2>{{trans('messages.getlocal')}}</h2>
            <p>{{trans('messages.freedeli')}}</p>
            <form action="#" method="post">
                <input type="email" placeholder="E-mail" name="email" required="">
                <input type="submit" value="Đăng ký">
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
<footer>
    <div class="container ">
        <!-- footer first section -->
        <!-- //footer first section -->
        <!-- footer second section -->
        <div class="w3l-grids-footer">
            <div class="col-xs-4 offer-footer">
                <div class="col-xs-4 icon-fot">
                    <span class="fa fa-map-marker" aria-hidden="true"></span>
                </div>
                <div class="col-xs-8 text-form-footer">
                    <h3>{{trans('messages.trackyour')}}</h3>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="col-xs-4 offer-footer">
                <div class="col-xs-4 icon-fot">
                    <span class="fa fa-refresh" aria-hidden="true"></span>
                </div>
                <div class="col-xs-8 text-form-footer">
                    <h3>{{trans('messages.freeeasy')}}</h3>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="col-xs-4 offer-footer">
                <div class="col-xs-4 icon-fot">
                    <span class="fa fa-times" aria-hidden="true"></span>
                </div>
                <div class="col-xs-8 text-form-footer">
                    <h3>{{trans('messages.onlinecan')}} </h3>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
        </div>
        <!-- //footer second section -->
        <!-- footer third section -->
        <div class="footer-info w3-agileits-info ">
            <!-- //footer categories -->
            <!-- quick links -->
            <div class="col-sm-9 address-right">
                <div class="col-xs-6 footer-grids">
                    <h3>{{trans('messages.quicklink')}}</h3>
                    <ul>
                        <li>
                            <a href="about.html">{{trans('messages.about')}}</a>
                        </li>
                        <li>
                            <a href="contact.html">{{trans('messages.contact')}}</a>
                        </li>
                        <li>
                            <a href="help.html">{{trans('messages.help')}}</a>
                        </li>
                        <li>
                            <a href="faqs.html">{{trans('messages.policy')}}</a>
                        </li>
                        <li>
                            <a href="terms.html">{{trans('messages.termof')}}</a>
                        </li>
                        <li>
                            <a href="privacy.html">{{trans('messages.privacy')}}</a>
                        </li>
                    </ul>
                </div>
                <div class="col-xs-6 footer-grids">
                    <h3>{{trans('messages.infor')}}</h3>
                    <ul>
                        <li>
                            <i class="fa fa-map-marker"></i> {{trans('messages.address')}}</li>
                        <li>
                            <i class="fa fa-mobile"></i> <a href="tel:0242114444">0999 999 999</a> </li>
                        <li>
                            <i class="fa fa-phone"></i> <a href="tel:0242114444">0242 11 4444</a> </li>
                        <li>
                            <i class="fa fa-envelope-o"></i>
                            <a href="mailto:bhq@biobee.com"> bhq@biobeevietnam.com</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- //quick links -->
            <!-- social icons -->
            <div class="col-sm-3 footer-grids  w3l-socialmk">
                <h3>{{trans('messages.followon')}}</h3>
                <div class="social">
                    <ul>
                        <li>
                            <a class="icon fb" href="#">
                                <i class="fa fa-facebook"></i>
                            </a>
                        </li>
                        <li>
                            <a class="icon tw" href="#">
                                <i class="fa fa-twitter"></i>
                            </a>
                        </li>
                        <li>
                            <a class="icon gp" href="#">
                                <i class="fa fa-google-plus"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="agileits_app-devices">
                    <h5>{{trans('messages.downapp')}}</h5>
                    <a href="#">
                        <img src="{{asset('front_end/images/1.png')}}" alt="">
                    </a>
                    <a href="#">
                        <img src="{{asset('front_end/images/2.png')}}" alt="">
                    </a>
                    <div class="clearfix"> </div>
                </div>
            </div>
            <!-- //social icons -->
            <div class="clearfix"></div>
        </div>
        <!-- //footer third section -->
        <!-- footer fourth section (text) -->
        <div class="agile-sometext">
            
            <!-- //brands -->
            <!-- payment -->
            <div class="sub-some child-momu">
                <h5>{{trans('messages.paymentmethod')}}</h5>
                <ul>
                    <li>
                        <img src="{{asset('front_end/images/pay2.png')}}" alt="">
                    </li>
                    <li>
                        <img src="{{asset('front_end/images/pay5.png')}}" alt="">
                    </li>
                    <li>
                        <img src="{{asset('front_end/images/pay1.png')}}" alt="">
                    </li>
                    <li>
                        <img src="{{asset('front_end/images/pay4.png')}}" alt="">
                    </li>
                    <li>
                        <img src="{{asset('front_end/images/pay6.png')}}" alt="">
                    </li>
                    <li>
                        <img src="{{asset('front_end/images/pay3.png')}}" alt="">
                    </li>
                    <li>
                        <img src="{{asset('front_end/images/pay7.png')}}" alt="">
                    </li>
                    <li>
                        <img src="{{asset('front_end/images/pay8.png')}}" alt="">
                    </li>
                    <li>
                        <img src="{{asset('front_end/images/pay9.png')}}" alt="">
                    </li>
                </ul>
            </div>
            <!-- //payment -->
        </div>
        <!-- //footer fourth section (text) -->
    </div>
</footer>
