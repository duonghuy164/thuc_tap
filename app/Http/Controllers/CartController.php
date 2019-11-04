<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use DB;
use Cart;
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
    	Cart::remove($id);
    	return response()->json([
    		'msg'=>'OK'
    	]);
    }

    public function update(Request $request)
    {
    	$id = $request->id;
    	$qty = $request->qty;
    	Cart::update($id,$qty);
    	echo 'OK';
    }

    public function payment()
    {   
        $city  = DB::table('city')->select('id','name')->get()->toArray();
        return view('pages.payment',compact('city'));
    }
}
