<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use DB;
use Cart;
class CartController extends Controller
{
    public function index(Request $request)
    {
    	$id= $request->id_product;
    	$product =Product::find($id);
    	$cart = [
    		'id' => $id,
    		'name' => $product->name,
    		'price'=> $product->price,
    		'qty' => 1,
    		'options'=>[
    			'image' => $product->avatar,
    			'sale' => $product->sale,
    		],
    	];
    	Cart::add($cart);
    	return response()->json([
            'msg'=>'OK'
        ]);
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
}
