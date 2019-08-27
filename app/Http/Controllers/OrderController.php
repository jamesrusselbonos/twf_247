<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use Auth;


class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    public function index()
    {
    	// $orders = Order::All();

    	// return view('user_profile', compact('orders'));

    	$orders = Auth::user()->orders;
    	$orders->transform(function($order, $key){
    		$order->cart = unserialize($order->cart);
    		return $order;
    	});
    	return view('user_profile', ['orders' => $orders]);
    }
    
    public function getOrder(Request $request)
    {

    	
    	

    	// $data = $request->all();
    	// $finalArray = array();
    	// foreach($data as $key=>$value){
    	//    array_push($finalArray, array(
    	//                 'orderid'=>$value['orderid'],
    	//                 'uid'=>$value['id'],
    	                
    	//    );
    	// });

    	// Model::insert($finalArray);
    }
}
