<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Product;
use App\User;

class DefController extends Controller
{

    public function index(){

    	if(Auth::user())
    	{
    		$products = Product::all();
        	$users = User::all();
        	return view('home', compact('products', 'users'));
    	}
    	else{
    		return view('auth.login');
    	}
    	
    }
}
