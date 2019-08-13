<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class AddproductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('add_product',compact('products'));
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
        // $create = Product::create($request->all());
        // return response()->json($create);
       
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

            $destination = public_path('/images');
             $image->move($destination, $fileNameToStore);
             // $path = $request->file('product_image')->store($destination, $fileNameToStore);

        }
        else{

            $fileNameToStore = "noimage.jpg";
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


        $product = new Product;
        $product->image = $fileNameToStore;
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
        $product->save();

        return redirect('addproduct');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($pid)
    {
        $products = Product::find($pid);

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

            $destination = public_path('/images');
             $image->move($destination, $fileNameToStore);
             // $path = $request->file('product_image')->store($destination, $fileNameToStore);

        }
        else{

            $fileNameToStore = "noimage.jpg";
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
        $product->image = $fileNameToStore;
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
        $product->save();

        return view('import_excel');
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
}
