<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use DB;
use Cart;
use App\User;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Carbon;
class CartController extends Controller
{
    public function add(Request $request)
    {
    	$id= $request->id;
    	$product =Product::find($id);
    	// $cart = [
    	// 	'id' => $id,
    	// 	'name' => $product->name,
    	// 	'price'=> $product->price,
    	// 	'qty' => 1,
    	// 	'options'=>[
    	// 		'image' => $product->avatar,
    	// 		'sale' => $product->sale,
    	// 	],
    	// ];

    	Cart::add([
            'id' => $id,
            'name' => $product->name,
            'price'=> $product->price,
            'qty' => 1,
            'options'=>[
                'image' => $product->avatar,
                'sale' => $product->sale,
            ],
            ]);
        $qtty = $product->qty;
        $product->qty = $qtty - 1;
        $product->save();
    	return response()->json([
            'msg'=>'OK'
        ]);
    }

    public function index()
    {
        $city  = DB::table('city')->select('id','name')->get()->toArray();
        $conte = Cart::content();

        return view('pages.checkout',compact('city','conte'));
    }
    public function delete(Request $request)
    {
    	$id = $request->id;

        $idPr = Cart::get($id);
        $qtyPr = $idPr->qty;
        $prod = Product::find($idPr->id);
        $qtys  = $prod->qty;

        $prod->qty = $qtys + $qtyPr;
        $prod->save();
    	Cart::remove($id);
    	return response()->json([
    		'msg'=>'OK'
    	]);
    }

    public function update(Request $request)
    {
    	$id = $request->id; 
        $id_pd = $request->id_pd;
        $qtyNow = $request->qtyNow;
        $product = Product::find($id_pd);
        $dd = $product->qty;
        $dds = $dd + $qtyNow;

    	$qty = $request->qty;
        $ddds = $dds - $qty;
        if($ddds > 0){
            $product->qty = $ddds;
            $product->save();
        	Cart::update($id,$qty);
        	return response()->json([
                'msg'=>'OK'
            ]);
        }else{
            return response()->json([
                'msg'=>'FAIL'
            ]);
        }
    }

    public function payment()
    {   
        $conte = Cart::content();

        $city  = DB::table('city')->select('id','name')->get()->toArray();
        return view('pages.payment',compact('city','conte'));
    }

    public function getPayment(Request $request)
    {
        $id = Auth::user()->id;
        $us = User::find($id);
        $pd = Cart::content();
        if($us->address == null || $us->address_work == null)
        {
            return back()->with('error','Vui lòng cập nhật địa chỉ trong hồ sơ để tiếp tục!');
        }else{
            $or_cd = 'order'.time();
            if($request->payment == 1){
                session(['cost_id' => $id]);
                session(['url_prev' => url()->previous()]);
                $or = new Order();
                $or->user_id = $id;
                $or->total_price = ($request->amount);
                $or->code_orders = $or_cd;
                $or->payment_form = 1;
                $or->product = json_encode($pd,true);
                $or->address = $request->address;
                $or->note = $request->notePayment;
                $or->status = -1;
                $or->created_at =Carbon\Carbon::now()->toDateString('d-m-Y H:i:s');
                $or->save();


                $vnp_TmnCode = "ER4GEOOF"; //Mã website tại VNPAY 
                $vnp_HashSecret = "CUIVKOOHVVKENLUCEIBUKRQEUBGBWLVG"; //Chuỗi bí mật
                $vnp_Url = "http://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
                $vnp_Returnurl = "http://dienthoai.local/return-vnpay";
                $vnp_TxnRef = $or_cd; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
                $vnp_OrderInfo = "Thanh toán hóa đơn phí dich vụ";
                $vnp_OrderType = 'billpayment';
                $vnp_Amount = $request->amount;
                $vnp_Locale = 'vn';
                $vnp_IpAddr = request()->ip();
                $inputData = array(
                    "vnp_Version" => "2.0.0",
                    "vnp_TmnCode" => $vnp_TmnCode,
                    "vnp_Amount" => $vnp_Amount,
                    "vnp_Command" => "pay",
                    "vnp_CreateDate" => date('YmdHis'),
                    "vnp_CurrCode" => "VND",
                    "vnp_IpAddr" => $vnp_IpAddr,
                    "vnp_Locale" => $vnp_Locale,
                    "vnp_OrderInfo" => $vnp_OrderInfo,
                    "vnp_OrderType" => $vnp_OrderType,
                    "vnp_ReturnUrl" => $vnp_Returnurl,
                    "vnp_TxnRef" => $vnp_TxnRef,
                );

                if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                    $inputData['vnp_BankCode'] = $vnp_BankCode;
                }
                ksort($inputData);
                $query = "";
                $i = 0;
                $hashdata = "";
                foreach ($inputData as $key => $value) {
                    if ($i == 1) {
                        $hashdata .= '&' . $key . "=" . $value;
                    } else {
                        $hashdata .= $key . "=" . $value;
                        $i = 1;
                    }
                    $query .= urlencode($key) . "=" . urlencode($value) . '&';
                }
                $vnp_Url = $vnp_Url . "?" . $query;
                if (isset($vnp_HashSecret)) {
                   // $vnpSecureHash = md5($vnp_HashSecret . $hashdata);
                    $vnpSecureHash = hash('sha256', $vnp_HashSecret . $hashdata);
                    $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
                }
                return redirect($vnp_Url);
                      
            }else{
                $or = new Order();
                $or->user_id = $id;
                $or->total_price = $request->amount;
                $or->code_orders = $or_cd;
                $or->payment_form = 0;
                $or->product = json_encode($pd,true);
                $or->address = $request->address;
                $or->note = $request->notePayment;
                $or->status = 0;
                $or->created_at =Carbon\Carbon::now()->toDateString('d-m-Y H:i:s');
                $or->save();
                $datq = array();
               Cart::destroy();
                return back()->with('success','Đặt hàng thành công!');
            }
        }
    }
    public function return(Request $request)
    {
        
        $url = session('url_prev','/');
        if($request->vnp_ResponseCode == "00") {
            
             $ors  =Order::where('code_orders',$request->vnp_TxnRef)->first();
             $ors->status = 1;
             $ors->save();

            Cart::destroy();
            return redirect($url)->with('success' ,'Đã thanh toán phí dịch vụ!');
        }
        // Cart::destroy();
        return redirect($url)->with('error' ,'Lỗi trong quá trình thanh toán phí dịch vụ!');
    }
}
