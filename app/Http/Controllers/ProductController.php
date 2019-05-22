<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Product;
use App\Sold;
use App\User;
use Auth;
use Session;
use App\Cart;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        // $products = DB::table('products')
        //             ->join('solds', 'products.pid', '=', 'solds.pid')
        //             ->select('products.*', 'solds.uid')
        //             ->get();

        $products = Product::all();

        $solds = Sold::all();
        // foreach ($solds as $sold) {
        //      dd($sold->uid);
        // }
       
        // if($user->id = $sold->uid){

        //     if(!$sold->pid = $products->pid){

        //         $dd($products);
        //     }
            
        // }
      
        // $user = User:: all();
        // // // $user = Auth::user();
        // dd($products);
      if($user){

        return view('product',compact('products', 'solds'));
      }
      else{
        return redirect('login');
      }

        // return $sold->id;
        // if($sold->uid == $user->id){

        //     if($products->pid == $sold->pid){

        //         //do nothing
        //     }
        //     else{
              ;
                
        //     }
        // }

        
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return view('home');
          $product = Product::find($id);
         
         return view('product_details')->with('product', $product);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getAddToCart(Request $request, $id)
    {
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->pid);

        $request->session()->put('cart', $cart);
        // dd($request->session()->get('cart'));
        return redirect()->route('product.index');
    }
    public function getCart(){

        if(!Session::has('cart')){
            if(Auth::user()){

              return view('shopping-cart');
            }
            else{
              return redirect('login');
            }
            
        }
        $oldCart= Session::get('cart');
        $cart = new Cart($oldCart);
        // dd($cart->items);
        return view('shopping-cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    public function removeToCart($id){
       
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }
        return redirect()->route('product.shoppingCart');
            
    }    

    public function getCheckout(){


  
       if(!Session::has('cart')){
            if(Auth::user()){

              return redirect()->route('product.index');
            }
            else{
              return redirect('login');
            }
            
        }

        $oldCart= Session::get('cart');
        $cart = new Cart($oldCart);
        Session::forget('cart');
        // dd($cart->items);
        return view('checkout', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

}
