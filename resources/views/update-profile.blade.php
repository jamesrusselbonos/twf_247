@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row my-2">
        <div class="col-lg-8 order-lg-2">
  
            <div class="tab-content py-4">
                <div class="tab-pane active" id="profile">
                    <h5 class="mb-3">User Profile <span class="edit-user hidden" id="edit-user"><a href="#" ><i class="fa fa-pencil">&nbsp;</i>Edit</a></span></h5>
                    <div class="row">
                        <div class="col-md-6">

                            <div class="row">
                                <div class="view-mode value" id="name-token">
                                    <input id="hdn-token" type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <p class="text-muted name-info" >
                                        
                                         <label id="name-n">{{ ucwords($user->name)}}</label>
                                      
                                      
                                            
                                    </p>
                                </div>
                            </br>
    
                                <div class="edit-mode hide" >
                                    <div class="row">
                                    <div class="col-xs-10">
                                        
                                        <div class="form-group" id="phone-i">

                                            <input class="form-control" placeholder="Name" value="" id="name1" data-id="" name="phone1">
                                        </div>
              
                                      

                                         
                                     </div> 
                                 </div> 
                             </div> 
                         </div> 

                          <div class="row">
                                <div class="view-mode value" id="email-token">
                                    <input id="hdn-token" type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <p class="text-muted email-info" >
                                        
                                         <label id="email-e">{{ ucwords($user->email)}}</label>
                                      
                                      
                                            
                                    </p>
                                </div>
                            </br>
    
                                <div class="edit-mode hide" >
                                    <div class="row">
                                    <div class="col-xs-10">
                                        <div class="col-xs-5">
                                        
                                        <div class="form-group" id="email-i">

                                            <input class="form-control" placeholder="Email" value="" id="email1" data-id="" name="email1">
                                        </div>
              
                                      
                                        </div>
                                          <button id=" {{ $user->id }}" class="btn btn-sm btn-success detail-save-user"><i class="fa fa-save"></i></button>
                                          <button class="btn btn-sm btn-danger detail-cancel-user"><i class="fa fa-times"></i></button>
                                     </div> 
                                 </div> 
                             </div> 
                         </div>





                            
                            <h6>About</h6>
                            <p>
                                Web Designer, UI/UX Engineer
                            </p>
                            <h6>Hobbies</h6>
                            <p>
                                Indie music, skiing and hiking. I love the great outdoors.
                            </p> 

                          
                          
                        </div>
                        <div class="col-md-6">
                            <h6>Recent badges</h6>
                            <a href="#" class="badge badge-dark badge-pill">html5</a>
                            <a href="#" class="badge badge-dark badge-pill">react</a>
                            <a href="#" class="badge badge-dark badge-pill">codeply</a>
                            <a href="#" class="badge badge-dark badge-pill">angularjs</a>
                            <a href="#" class="badge badge-dark badge-pill">css3</a>
                            <a href="#" class="badge badge-dark badge-pill">jquery</a>
                            <a href="#" class="badge badge-dark badge-pill">bootstrap</a>
                            <a href="#" class="badge badge-dark badge-pill">responsive-design</a>
                            <hr>
                            <span class="badge badge-primary"><i class="fa fa-user"></i> 900 Followers</span>
                            <span class="badge badge-success"><i class="fa fa-cog"></i> 43 Forks</span>
                            <span class="badge badge-danger"><i class="fa fa-eye"></i> 245 Views</span>
                        </div>

                    </div>
                    <!--/row-->
                </div>


            </div>
        </div>
        <div class="col-lg-4 order-lg-1 text-center">
            <img src="//placehold.it/150" class="mx-auto img-fluid img-circle d-block" alt="avatar">
            <h6 class="mt-2">Upload a different photo</h6>
            <label class="custom-file">
                <input type="file" id="file" class="custom-file-input">
                <span class="custom-file-control">Choose file</span>
            </label>
        </div>
    </div>
</div>
@endsection