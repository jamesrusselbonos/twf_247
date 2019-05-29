<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Product;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

     
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        

        return view('update-profile', ['user' => User::findOrFail($id)]);
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
    
        $user = User::findOrFail($request->id);
        $user->id = $request['id']; 
        $user->wallet = $request['wallet']; 
        $user->save(); 

        
       
    }
       public function ajaxupdate(Request $request, $id)
    {

        $user = User::findOrFail($id);

        if($request->hasFile('user_image')){

            $filenameWithExt = $request->file('user_image')->getClientOriginalName();

            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $variation = preg_replace('/[\+]/', '', $filename);

            $extension = $request->file('user_image')->getClientOriginalExtension();

            $fileNameToStore = 'images/'.''.$variation.'_'.time().'.'.$extension;
            
            $image = $request->file('user_image');

            $destination = public_path('/images');
             $image->move($destination, $fileNameToStore);

             $user->image = $fileNameToStore;
             $user->save();
             return view('update-profile');
        }

        if($request['email']){
            $check_email = DB::table('users')->where('id', '!=', $id)->where('email', $request->email)->first();
            if(!$check_email)
            $user->email = $request['email'];
            else
                $status = 'ERROR';

        }

        if($request->name){

            $user->name = $request['name'];
        }
        if($request->wallet){

            $user->wallet = $request['wallet']; 
        }


        $user->save();
      
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

    public function vaProfile(){
        return view('load-account');
    }
}
