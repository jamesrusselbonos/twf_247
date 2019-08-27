<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\User;
use App\Agent;
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
        $agents = Agent::all();
        return view('home', compact('products', 'agents'));
    }

    public function admin(){

        return view('layouts.admin');
    }    

    public function dashboard(){

        $products = Product::all();
        $agents = Agent::all();
      if(Auth::user()->role_id == 3){
        return redirect()->route('home');
      }

      else{
        return view('admin_home', compact('products', 'agents'));
      }

    }
}
