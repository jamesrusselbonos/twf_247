<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\User;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $products = Product::all();
        $users = User::all();
        return view('home', compact('products', 'users'));
    }

    public function admin(){

        return view('layouts.admin');
    }    

    public function dashboard(){

        $products = Product::all();
        $users = User::all();
      if(Auth::user()->role_id == 3){
        return redirect()->route('home');
      }

      else{
        return view('admin_home', compact('products', 'users'));
      }

    }
}
