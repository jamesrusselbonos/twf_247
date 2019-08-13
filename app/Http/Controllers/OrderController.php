<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;

class OrderController extends Controller
{
    public function index()
    {
    	$orders = Order::All();

    	return view('user_profile', compact('orders'));
    }
    
    public function getOrder()
    {
    	
    }
}
