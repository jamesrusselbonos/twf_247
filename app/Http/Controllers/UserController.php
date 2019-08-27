<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Product;
use DB;
use Auth;
use App\Agent;

class UserController extends Controller
{
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
        $users = User::all();
        $agents = Agent::all();
        if(Auth::user()->role_id == 3){
          return redirect()->route('home');
        }
        
        elseif(Auth::user()->role_id == 2){
            return redirect()->route('dashboard.admin');
        }        

        else{
          return view('users_list', compact('users', 'agents'));
        }

        
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

    public function paypalCredits(Request $request, $id)
    {
    
        $user = User::findOrFail($request->id);
        $user->id = $request['id']; 
        $user->wallet = $request['wallet'] + '100' ; 
        $user->save(); 

        return view('product');
        
       
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

            $destination = base_path('/images');
             $image->move($destination, $fileNameToStore);

             $user->image = $fileNameToStore;
             $user->save();
             return back();
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
