<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Excel;
use App\Product;

class ImportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('products')->orderBy('brand', 'DESC')->get();
        return view('import_excel', compact('data'));
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
        //
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

    function import(Request $request)
       {
        $this->validate($request, [
         'select_file'  => 'required|mimes:xls,xlsx'
        ]);

        $path = $request->file('select_file')->getRealPath();

        $data = Excel::load($path)->get();
        
       

        if($data->count() > 0)
        {
            $data_rows = $data->toArray();

        foreach ($data_rows as $data_row) {

            $insert_data[] = array(

             'brand'                         => $data_row['brand'],
             'asin'                          => $data_row['asin'],
             'product_page_link'             => $data_row['product_page_link'],
             'prime_low_price'               => $data_row['prime_low_price'],
             'total_units_sold_mo'           => $data_row['total_units_sold_mo'],
             'total_revenue_mo'              => $data_row['total_revenue_mo'],           
             'competitive_sellers'           => $data_row['competitive_sellers'],
             'our_sales_equity_units_mo'     => $data_row['our_sales_equity_units_mo'],
             'our_sales_equity_revenue_mo'   => $data_row['our_sales_equity_revenue_mo'],
             'website_url'                   => $data_row['website_url'],
             'firstname'                     => $data_row['firstname'],            
             'lastname'                      => $data_row['lastname'],
             'address'                       => $data_row['address'],
             'contact_no'                    => $data_row['contact_no'],
             'position'                      => $data_row['position'],
             'email'                         => $data_row['email'],

            );
        }


         if(!empty($insert_data))
         {
          DB::table('products')->insert($insert_data);
         }
        }
        return back()->with('success', 'Excel Data Imported successfully.');
       }
}
