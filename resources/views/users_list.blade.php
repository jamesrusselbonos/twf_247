
<style type="text/css">

#tabs_list h3 {
  color : white;
  background-color: #428bca;
  padding : 5px 15px;
}

</style>
 @extends('layouts.admin_dashboard')
  
 @section('content')

 <br />
 
 <div class="container" id="tabs_list">

      <ul class="nav nav-tabs">
        <li class="nav-item">
          <a class="nav-link active" href="#client_list">Client List</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#va_list">VA List</a>
        </li>
      </ul>
      <br />
      <br />
      <div class="tab-content ">
        <div class="tab-pane active" id="client_list">
          <table class="table table-bordered display" id ="client" style="width:100%">
                <thead>
                     <tr>       
                         <th>Name</th>
                         <th>Email</th>
                         <th>Verified</th>
                         <th>Role</th>        
                         <th>Created On</th>
                         <th>Action</th>        
                         

                     </tr> 
                   </thead>    
                   <tbody>   

                    @foreach($users as $user)

                      <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            @if( $user->email_verified_at != null)
                            <td>Yes</td>
                            @else
                            <td>No</td>
                            @endif
                            <td></td>
                            <td>{{ $user->created_at}}</a></td>
                            <td><center><button type="button" class="btn btn-primary"><i class="far fa-edit"></i> </button> <button type="button" class="btn btn-danger"><i class="far fa-trash-alt"></i></button></center></td>
                                               
                      </tr>
                 
                    @endforeach         
              </tbody>

          </table> 

        </div>

        <div class="tab-pane" id="va_list">
          <table class="table table-bordered display" id ="va" style="width:100%">
               <thead>
                   <tr>       
                       <th>Name</th>
                       <th>Email</th>
                       <th>Verified</th>
                       <th>Availability</th>        
                       <th>Duration</th>
                       <th>Action</th>        
                       

                   </tr> 
               </thead>    
                <tbody>   


                 @foreach($agents as $agent)

                   <tr>
                         <td>{{ $agent->users()->first()->name }}</td>
                         <td>{{ $agent->users()->first()->email }}</td>
                         @if( $agent->users()->first()->email_verified_at != null)
                         <td>Yes</td>
                         @else
                         <td>No</td>
                         @endif
                         <td>{{ $agent->availability}}</a></td>
                         <td>{{ $agent->duration}}</a></td>
                         <td><center><button type="button" class="btn btn-primary"><i class="far fa-edit"></i> </button> <button type="button" class="btn btn-danger"><i class="far fa-trash-alt"></i></button></center></td>
           
                   </tr>
              
                 @endforeach
                </tbody>

          </table>
        </div>
        
      </div>
      </div>

 @endsection