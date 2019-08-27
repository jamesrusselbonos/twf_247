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
use App\Order;

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
    public function show($pid)
    {
        // return view('home');
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   


        $products = Product::find($id);

        return view('edit_product', compact('products'));
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
      
        $this->validate($request, [
        'image' => 'image|nullable|max:1999',
        'brand' => 'required',
        'asin' => 'required',
        'product_page_link' => 'required',
        'prime_low_price' => 'required',
        'total_units_sold_mo' => 'required',
        'total_revenue_mo' => 'required',
        'competitive_sellers' => 'required',
        'our_sales_equity_units_mo' => 'required',
        'our_sales_equity_revenue_mo' => 'required',
        'website_url' => 'nullable',
        'firstname' => 'nullable',
        'lastname' => 'nullable',
        'address' => 'nullable',
        'contact_no' => 'nullable',
        'position' => 'nullable',
        'email' => 'nullable'

        ]);


        if($request->hasFile('product_image')){

            $filenameWithExt = $request->file('product_image')->getClientOriginalName();

            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $variation = preg_replace('/[\+]/', '', $filename);

            $extension = $request->file('product_image')->getClientOriginalExtension();

            $fileNameToStore = 'images/'.''.$variation.'_'.time().'.'.$extension;
            
            $image = $request->file('product_image');

            $destination = base_path('/images');
             $image->move($destination, $fileNameToStore);
             // $path = $request->file('product_image')->store($destination, $fileNameToStore);

        }
        else{

            $fileNameToStore = "";
        }

        if($request->prime_low_price && $request->total_units_sold_mo && $request->total_revenue_mo && $request->our_sales_equity_units_mo && $request->our_sales_equity_revenue_mo){

            $price = $request->prime_low_price;

            $newPrice = str_replace( ',', '', $price );


            $units_mo = $request->total_units_sold_mo;

            $new_units_mo = str_replace( ',', '', $units_mo );


            $reven_mo = $request->total_revenue_mo;

            $new_reven_mo = str_replace( ',', '', $reven_mo );


            $sales_units = $request->our_sales_equity_units_mo;

            $new_sales_units = str_replace( ',', '', $sales_units );


            $sales_reven = $request->our_sales_equity_revenue_mo;

            $new_sales_reven = str_replace( ',', '', $sales_reven );


        }

    $product = Product::find($id);
        if( $product->image != null){
            if( $request->hasFile('product_image'))
            {
                $product->image = $fileNameToStore;
            }
            else{
                
            }
        }
        else{
            $product->image = $fileNameToStore;
        }
        $user = Auth::user();
        $product->brand = $request->brand;
        $product->asin = $request->asin;
        $product->product_page_link = $request->product_page_link;
        $product->prime_low_price = $newPrice;
        $product->total_units_sold_mo =  $new_units_mo;
        $product->total_revenue_mo =  $new_reven_mo;
        $product->competitive_sellers = $request->competitive_sellers;
        $product->our_sales_equity_units_mo = $new_sales_units;
        $product->our_sales_equity_revenue_mo = $new_sales_reven;
        $product->website_url = $request->website_url;
        $product->firstname = $request->firstname;
        $product->lastname = $request->lastname;
        $product->address = $request->address;
        $product->contact_no = $request->contact_no;
        $product->position = $request->position;
        $product->email = $request->email;
        $product->updated_by = $user->id;
        $product->save();

        return redirect()->route('import.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     
    public function productUpdates()
    {
        $users = DB::table('products')
                    ->join('users', 'users.id', '=', 'products.updated_by')
                    ->get();


        $products = Product::with('user')->get();
        if(Auth::user()->role_id == 3){
          return redirect()->route('home');
        }
        
        else{
        return view('product_updates', compact('products'));
        }
    }

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

        $user = Auth::user();
        $order = new Order;
        $order->orderid = time();
        
        $order->uid = $user->id;
        $order->cart = serialize($cart);
        Auth::user()->orders()->save($order);


        Session::forget('cart');

        
        // dd($cart->items);
        return view('checkout', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

        public function postCheckout(Request $request){

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

            $user = Auth::user();
            $order = new Order;
            $order->orderid = time();
            
            $order->uid = $user->id;
            $order->cart = serialize($cart);
            Auth::user()->orders()->save($order);

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
