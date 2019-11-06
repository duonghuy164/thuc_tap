@extends('layout.master')

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
    <div class="privacy">
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
                            <th>Remove</th>
                        </tr>
                        </thead>
                        <tbody>
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
                                                <input type="number" class="qtyProduct" value="{{$vl->qty}}" id="{{$key}}" step="{{$vl->id}}">
                                                <input type="hidden" name="qtyNow" value="{{$vl->id}}" >
                                            </div>
                                        </div>
                                    </td>
                                    <td class="invert">{{$vl->name}}</td>
                                    <td class="invert">{{number_format(($vl->price-($vl->price * $vl->options->sale)/100)*$vl->qty)}}</td>
                                    <td class="invert">
                                        <a href="javascript:void(0)" class="deleteCart" id="{{$key}}">
                                        <div class="rem">
                                            <div class="close1"> </div>
                                        </div>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="checkout-left">
                <div class="address_form_agile">
                    <a href="{{route('payment.index')}}" class="btn btn-primary">Thanh Toán</a>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
@endsection
@section('addjs')
    <script type="text/javascript">
        $('.deleteCart').click(function(){
        const swalWithBootstrapButtons = Swal.mixin({
          customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
          },
          buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          type: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Yes, delete it!',
          cancelButtonText: 'No, cancel!',
          reverseButtons: true
        }).then((result) => {
          if (result.value) {
             var rowid = $(this).attr('id');
            $.ajax({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url:"{{route('deleteCart')}}",
                type:"POST",
                data:{id:rowid},

                success:function(data){
                    if(data.msg == 'OK'){
                        swalWithBootstrapButtons.fire(
                          'Deleted!',
                          'Your file has been deleted.',
                          'success'
                        );
                        $('#row_'+rowid).hide();
                        var du = $('.cou_hih').attr('id');
                        var dus = du - 1;
                        $('.cou_hih').attr('id',dus);
                        $('.cou_hih').text(dus);
                        // location.reload();
                    }
                } 
            });
            
          } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
          ) {
            swalWithBootstrapButtons.fire(
              'Cancelled',
              'Your imaginary file is safe :)',
              'error'
            )
          }
        })
    });
        
        $('.qtyProduct').on('change',function(){
            var val_qty = $(this).val();
            var id_pr = $(this).attr('id');
            var id_pds = $(this).attr('step');
            $.ajax({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url:"{{route('UpdateCart')}}",
                type:"POST",
                data:{id:id_pr,qty:val_qty,id_pd:id_pds},

                success:function(data){
                    if(data.msg == 'OK'){
                        Swal.fire(
                          'Thành công!',
                          'Cập nhật giỏ hàng thành công!',
                          'success'
                        ).then(function(){
                       location.reload();
                        });
                    }else{
                        Swal.fire(
                          'Thất bại!',
                          'Số lượng sản phẩm không đủ!',
                          'error'
                        ).then(function(){
                       location.reload();
                        });
                    }
                } 
            });
        });
    </script>
@endsection