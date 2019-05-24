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
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
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
        // $solds = Sold::where('uid', $user->id);
        
        // $solds = DB::table("solds")->select("pid")
        //             ->where("uid", "=", $user->id);
        // $products = DB::table("products")->select("pid")
        //             ->union($solds)
        //             ->get();   
        // $solds = DB::table("solds");
        // $products = DB::table("products");

        // $products = DB::select('SELECT  FROM `products` UNION SELECT * from solds where uid = ?',[Auth::user()->id]);

              

        
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

        return view('product',compact('products'));
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
//////////////////////////NEW CART ALERT///////////////////////////////////////

        //  $product = Product::find($id);
        //       $products = session('cart');
        //       $a = true;
        //       if($products != null) {
        //       foreach ($products as $pro) {
        //         if($product->name == $pro->name){
        //           $a = true;
        //           break;
        //         }
        //         else {
        //           $a = false;
        //         }

        //       }
        //       if($a == false)
        //       {
        //         Session::push('cart', $product);
        //       }
        // }
        //  else {
        //   Session::push('cart', $product);
        // }

        //       return back();



              ///////////////////////////////////////////////////////
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

   /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateProduct(Request $request, $id){

       $product = Product::findOrFail($request->id);
       $product->pid = $request['pid']; 
       $product->deleted = 1; 
       $product->save(); 
    }

    public function reUpdate(Request $request, $id){

       $product = Product::findOrFail($request->id);
       $product->pid = $request['pid']; 
       $product->deleted = 0; 
       $product->save(); 
    }

}
