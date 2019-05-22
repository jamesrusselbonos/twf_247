<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class TestController extends Controller
{
    /**
     * Show the form for viewing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
    	return redirect()->route('test.show');
    	$product = Product::find($id);
    	return view('home');

    }
}
