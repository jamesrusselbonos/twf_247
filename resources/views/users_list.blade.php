
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
  <section id="tabs" class="project-tab">
              <div class="container">
                  <div class="row">
                      <div class="col-md-12">
                          <nav>
                              <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                  <a class="nav-item nav-link active" id="nav-client-tab" data-toggle="tab" href="#nav-client" role="tab" aria-controls="nav-client" aria-selected="true">Users</a>
                                  <a class="nav-item nav-link" id="nav-va-tab" data-toggle="tab" href="#nav-va" role="tab" aria-controls="nav-va" aria-selected="false">VA List</a>

                              </div>
                          </nav>
                        </br>
                          <div class="tab-content" id="nav-tabContent">
                              <div class="tab-pane fade show active" id="nav-client" role="tabpanel" aria-labelledby="nav-client-tab">
                                  
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
                                                  <td><label id="lbl_type">Admin</label>
                                                    <select id="user_type" hidden>
                                                    <option>Admin</option>
                                                    <option>Client</option>
                                                  </select></td>
                                                  <td>{{ $user->created_at}}</a></td>
                                                  <td><center><button type="button" class="btn btn-primary edit_user"><i class="far fa-edit"></i> </button> 
                                                    <button type="button" class="btn btn-danger"><i class="far fa-trash-alt"></i></button></center></td>
                                                                     
                                            </tr>
                                       
                                          @endforeach         
                                    </tbody>

                                </table> 
                              </div>
                              <div class="tab-pane fade" id="nav-va" role="tabpanel" aria-labelledby="nav-va-tab">
                                <div class="float-right">
                                  <button type="button" class="btn btn-primary" style="margin-right:15px;" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i> Add a VA</button>
                                </br>
                                </br>
                                </div>
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
                                               @if($agent->availability == 1)
                                                <td>Available</a></td>
                                               @else
                                                <td>In Contract</a></td>
                                               @endif
                                               <td>{{ $agent->duration}}</a></td>
                                               <td><center><button type="button" class="btn btn-primary"><i class="far fa-edit"></i> </button> <button type="button" class="btn btn-danger"><i class="far fa-trash-alt"></i></button></center></td>
                                 
                                         </tr>
                                    
                                       @endforeach
                                      </tbody>

                                </table>                              
                              </div>

                          </div>
                      </div>
                  </div>
              </div>
          </section>
          <!-- Button trigger modal -->
        

          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Add a VA</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                 <form>
                   <div class="form-row">
                                
                     <div class="form-group col-md-10">
                       <label for="name">Name</label>
                       <select id="name" class="form-control">
                         <option selected disabled>Choose User</option>

                         @foreach($users_to_va as $user_va)

                         <option value="{{ $user_va->id }}">{{$user_va->name}}</option>
                         @endforeach
                       </select>
                     </div>   
                   </div>
                 
                   <div class="form-row">                  
                     <div class="form-group col-md-6">
                       <label for="availability">Availability</label>
                       <select id="availability" class="form-control">
                         <option selected disabled>Choose...</option>
                         <option>Available</option>
                         <option>In Contract</option>
                       </select>
                     </div>
                     <div class="form-group col-md-4">
                       <label for="inputZip">Duration(mins)</label>
                       <input type="text" class="form-control" id="duration">
                     </div>                     
                    </div>
                  
                 </form>
                 <input id="hdn-token" class="hdn-token" type="hidden" name="_token" value="{{csrf_token()}}">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" va-id="" class="btn btn-primary" id="save_va">Save changes</button>
                </div>
              </div>
            </div>
          </div>

      </div>
<script type="text/javascript">
$(document).ready( function() {

  $('.edit_user').on("click", function() {

    $(this).parent().parent().parent().find('#user_type').removeAttr('hidden');
    $(this).parent().parent().parent().find('#user_type').show();
    $(this).parent().parent().parent().find('#lbl_type').hide();

  });

  $('#availability').on("click", function() {
      if($('#availability').val() == "Available")
      {

        $('#duration').attr('disabled','disabled');
      }
      else{
        $('#duration').removeAttr('disabled');
      }

    });

    $('#name').on("change", function() {
      
      var id = $(this).val();
      $('#save_va').attr('va-id',id);
    });

    $('#save_va').click(function(){

      var id = $(this).attr('va-id');
      var availability = $('#availability').val();
      var dur = $('#duration').val();
      
      if(dur != null || dur != ""){
        var duration = dur;
      }
      else{
       var duration = 0;
      }

      console.log(duration);
      var token = $(".hdn-token").val();

      $.post('add_va/' + id,
      {'id':id, 'availability':availability, 'duration':duration, '_token':token}, 
      function(data){


       }); 

    });

});

</script>
 @endsection