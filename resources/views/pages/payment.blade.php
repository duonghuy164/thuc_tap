@extends('layout.master')
@section('addcss')
<style type="text/css">
    .display-none{
        display: none !important; 
    }
</style>
@endsection
@section('content')
    <div class="services-breadcrumb">
        <div class="agile_inner_breadcrumb">
            <div class="container">
                <ul class="w3_short">
                    <li>
                        <a href="{{route('home')}}">Home</a>
                        <i>|</i>
                    </li>
                    <li>Checkout</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- //page -->
    <!-- checkout page -->
    <div class="privacy before_payment ">
        <div class="container">
            <!-- tittle heading -->
            <h3 class="tittle-w3l">Checkout
                <span class="heading-style">
                    <i></i>
                    <i></i>
                    <i></i>
                </span>
            </h3>
            <!-- //tittle heading -->
            <div class="checkout-right">
                <h4>Your shopping cart contains:
                    <span class="cou_hih" id="{{count($conte)}}">{{count($conte)}}</span>
                </h4>
                <div class="table-responsive">
                    <table class="timetable_sub">
                        <thead>
                        <tr>
                            <th>SL No.</th>
                            <th>Product</th>
                            <th>Quality</th>
                            <th>Product Name</th>
                            <th>Price</th>
           
                        </tr>
                        </thead>
                        <tbody>
                            @php 
                                $i = 1;
                                $total = 0;
                            @endphp
                            @if(count($conte) > 0)
                            @foreach($conte as $key => $vl)

                                <tr class="rem1" id="row_{{$key}}">
                                    <td class="invert">{{$key}}</td>
                                    <td class="invert-image">
                                        <a href="single2.html">
                                            <img src="{{$vl->options->image}}" alt=" " class="img-responsive">
                                        </a>
                                    </td>
                                    <td class="invert">
                                        <div class="quantity">
                                            <div class="quantity-select">
                                                <input type="number" readonly class="qtyProduct" value="{{$vl->qty}}" id="{{$key}}">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="invert">{{$vl->name}}</td>
                                    <td class="invert">{{($vl->price-($vl->price * $vl->options->sale)/100)*$vl->qty}}</td>
                                    @php 
                                        $i++;
                                        $total += (int)($vl->price - (($vl->price * $vl->options['sale'])/100)) * $vl->qty;
                                    @endphp
                                </tr>
                                <tr>
                                </tr>
                            @endforeach
                            @endif
                            <tr>
                                <td colspan="4">Tổng tiền</td>
                                <td>{{ number_format($total)}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="checkout-left">
                <div class="address_form_agile">
                    <p class="text-center payment_text">Chọn hình thức thanh toán</p>
                        <form action="{{route('getPayMent')}}" method="POST">
                            @csrf

                    <div class="input-group">
                        <label for="tt_khi_nhan_hang">Thanh toán khi nhận hàng</label>
                        <input type="radio" name="payment" value="0" id="tt_khi_nhan_hang" checked> 
                    </div>
                    <div class="input-group">
                        <label for="tt_atm">Thẻ ATM(VN PAY)</label>
                        <input type="radio" name="payment" value="1" id="tt_atm">
                    </div>

                    <div class="input-group">
                        <input type="text" name="address" required placeholder="Địa chỉ nhận hàng">
                        <textarea name="notePayment"></textarea>
                    </div>
                    <div class="input-group">
                        <input type="hidden" name="amount" value="{{ $total }}">
                        <button class="btn btn-primary">Mua ngay</button>
                    </div>
                    </form>
                    
                    @if(session('error'))
                        <p class="error">{{session('error')}}</p>
                    @endif

                    @if(session('errors'))
                        <p class="error">{{session('errors')}}</p>
                    @endif
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>

    <div class="privacy after_payment display-none text-center">
        @if(session('success')|| session('error'))
            <h4 class="text-center">{{session('success')}}</h4>
            <h4 class="text-center">{{session('error')}}</h4>

        @endif
        <a href="{{route('homes')}}" >Home</a>
    </div>
@endsection
@section('addjs')
    <script type="text/javascript">
       @if(session('success') || session('error'))
        $('.before_payment').addClass('display-none');
        $('.after_payment').removeClass('display-none');
       @endif
    </script>
@endsection