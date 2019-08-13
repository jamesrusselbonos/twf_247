@extends('layouts.admin')
<style type="text/css">
	.card th{
		background-color: #e6e6e6;
	}
</style>
@section('content')

<div class="container">
        <div class="row my-2">
            <div class="col-lg-8 order-lg-2">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a href="" data-target="#profile" data-toggle="tab" class="nav-link active">Profile</a>
                    </li>
                    
                    <li class="nav-item">
                        <a href="" data-target="#order" data-toggle="tab" class="nav-link">Orders</a>
                    </li>
                </ul>
                <div class="tab-content py-4">
                    <div class="tab-pane active" id="profile">
                    	<div class="row">
                    		<div class="offset-6">
                       		 	<h5 class="mb-3">User Profile <span class="edit-user hidden" id="edit-user"><a href="#" ><i class="fa fa-pencil">&nbsp;</i>Edit</a></span></h5>
                        	</div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 ">
                        		<div class="col-md-12 text-center">
			                            <form method="POST" id="add_product" action="{{ route('user.prof' ,Auth::user()->id) }}" enctype="multipart/form-data">
			                            <img src="{{asset(Auth::user()->image) }}" id='img-upload' class="mx-auto img-fluid img-circle d-block" alt="avatar"/>
			                            @csrf
			                           <div class="input-group">
			                            <span class="input-group-btn" >
			                                <span class="btn btn-default btn-file" style:>
			                                   <button class="btn btn-outline-secondary"  type="button"> Browse… </button>  <input type="file"  name="user_image" id="imgInp">

			                                </span>
			                                 <button type="submit" class="btn btn-outline-secondary upload_user" data-id="{{ Auth::user()->id }}" id="upload_user"  type="button"> Upload </button>
			                            </span>
			                            <input type="text" style="cursor:not-allowed;"  class="form-control hide" readonly>
			                            </div>
			                           
			                        </form>
                        		</div>
                        	</div>
                

                      
                            <div class="col-md-6">

                                <div class="row">
                                    <div class="view-mode value" id="name-token">
                                        <input id="hdn-token" type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <p class="text-muted name-info" >
                                            
                                             <label id="name-n">{{ ucwords(Auth::user()->name)}}</label>
                                          
                                          
                                                
                                        </p>
                                    </div>
                                </br>
                    
                                    <div class="edit-mode hide" id="name1-token">
                                        <div class="row">
                                        <div class="col-xs-10">
                                            <input id="hdn-token" type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <div class="form-group" id="phone-i">

                                                <input class="form-control" placeholder="Name" value="" id="name1" data-id="" name="name1">
                                            </div>
                    
                                          

                                             
                                         </div> 
                                     </div> 
                                 </div> 
                             </div> 

                              <div class="row">
                                    <div class="view-mode value" id="email-token">
                                        <input id="hdn-token" type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <p class="text-muted email-info" >
                                            
                                             <label id="email-e">{{ ucwords(Auth::user()->email)}}</label>
                                          
                                          
                                                
                                        </p>
                                    </div>
                                </br>
                    
                                    <div class="edit-mode hide" >
                                        <div class="row">
                                        <div class="col-xs-10">
                                            <input id="hdn-token" type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <div class="col-xs-5">
                                            
                                            <div class="form-group" id="email-i">
                                                <input id="hdn-token" type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input class="form-control" placeholder="Email" value="" id="email1" data-id="" name="email1">
                                            </div>
                    
                                          
                                            </div>
                                              <button id=" {{ Auth::user()->id }}" class="btn btn-sm btn-success detail-save-user"><i class="fa fa-save"></i></button>
                                              <button class="btn btn-sm btn-danger detail-cancel-user"><i class="fa fa-times"></i></button>
                                         </div> 
                                     </div> 
                                 </div> 
                             </div>
                              
                            </div>
                        </div>

                    </div>

                    <div class="tab-pane" id="order">
                    	<div class="row">
                    		<div class="col-md-12 offset-3">
                    			<div class="card" style="margin-top:10px" id="Orders">
                    				  <div class="card-header bg-dark text-white">
                    				   <i class="fa fa-table"></i>  Orders
                    				  </div>

                    				
                    				     <div class="card-body">

                    				     	
                    				        <table class="table table-bordered">
                    				      	    <thead>
                    				      	      <tr>
                    				      	        <th>OrderId</th>
                    				      	        <th>Product Name</th>
                    				      	        <th>Date Ordered</th>
                    				      	      </tr>
                    				      	    </thead>
                    				      	    <tbody>
                    				      	      <tr>
                    				      	      <!-- 	@foreach($orders as $order)
                    				      	        <td>{{ $order->orderid}}</td>
                    				      	        <td>{{ $order->product()->brand }}</td>
                    				      	        <td>{{ $order->create_at}}</td>
                    				      	        @endforeach -->
                    				      	      </tr>

                    				      	    </tbody>
                    				      	  </table>
                    				      	 

                    				       </div>

                    				</div>
                    		</div>
                    	</div>

                    </div>
                </div>
            </div>

        </div>
    </div>

	


@endsection