<?php

namespace App\Http\Controllers;

use App\Product;
use App\User;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('product',compact('products'));
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
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)

    {     
        return redirect()->route('product.show'); 

        // return $product->pid;
        
        // $user = User::findOrFail($request->id);
        // $user->id = $request['id']; 
        // $user->wallet = $request['wallet'] - '1'; 
        // // // $user->save(); 
        //  $product = Product::find($id);
        // // return $product_details['pid'];


        // // return view('product_details')->with('product_details',$product_details);
        // // return view('product_details',);

        // // return redirect('product_details',compact('product'));
        // // return view();
        // // return view('product_details', ['pid'=> $product]);
        
        // return view('product_details',compact('product'));


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $product_details = Product::find($id);
        // return view('product_details',compact('product_details'));    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
          
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
    public function preview($id)
    {
        // $products = Product::find($id);
        // return view('product_details',compact('products'));
    }


    //     public function addproduct()
    // {
    //     return view('addproduct');
    // }
}
