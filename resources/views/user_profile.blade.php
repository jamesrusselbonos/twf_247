@extends('layouts.admin')
<style type="text/css">
    .card th {
        background-color: #e6e6e6;
    }
    
    .card img {
        display: block;
        width: 50px;
        height: auto;
    }
    
    #details-order td {
        max-width: 100px;
        text-align: center;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
    
    #img-upload {
        width: 50%;
    }
</style>@section('content')
<div class="container">
    <div class="row my-2">
        <div class="col-lg-8 order-lg-2">
            <!-- <ul class="nav nav-tabs">
                <li class="nav-item"> <a href="" data-target="#profile" data-toggle="tab" class="nav-link active">Profile</a> </li>
                <li class="nav-item"> <a href="" data-target="#order" data-toggle="tab" class="nav-link">Orders</a> </li>
            </ul> -->
            <div class="py-4">
                <div class="tab-pane active" id="profile">
                    
                    <div class="row">
                        <div class="col-md-6 ">
                            <div class="col-md-12 text-center img-upload">
                                <form method="POST" id="img-up" action="{{route('user.prof' ,Auth::user()->id)}}" enctype="multipart/form-data"> @if(Auth::user()->image !=null) <img style="width: 300px; height: 300px;" src="{{asset(Auth::user()->image)}}" id='img-upload' class="mx-auto img-fluid img-circle d-block img-upload" alt="avatar" /> @else <img src="{{asset('dist/img/user2-160x160.jpg')}}" id='img-upload' class="mx-auto img-fluid img-circle d-block img-upload" alt="avatar" /> @endif @csrf
                                    <div class="input-group" style="margin-left:50px;"> <span class="input-group-btn"> <span class="btn btn-default btn-file" style:> <button class="btn btn-outline-secondary btn-browse" type="button"> Browse… </button> <input type="file" name="user_image" id="imgInp"> </span>
                                        <button type="submit" class="btn btn-outline-secondary upload_user" disabled data-id="{{Auth::user()->id}}" id="upload_user" type="button"> Upload </button>
                                        </span>
                                        <input type="text" style="cursor:not-allowed;" class="form-control hide" readonly> </div>
                                </form>
                            </div>

                            <div style="padding-left: 90px;" class="row">
                              <span style="font-size: 16px;" class="edit-user hidden" id="edit-user"><a href="#" ><i class="fa fa-pencil">&nbsp;</i>Edit</a></span>
                            </div>

                            <div style="padding-left: 90px;" class="row">
                                <div class="view-mode value" id="name-token">
                                    <input id="hdn-token" type="hidden" name="_token" value="{{csrf_token()}}">
                                    <p style="font-size: 30px;"  class="text-muted name-info">
                                        <label id="name-n">{{ucwords(Auth::user()->name)}}</label>
                                    </p>
                                </div>
                                </br>
                                <div class="edit-mode hide" id="name1-token">
                                    <div class="row">
                                        <div class="col-xs-10">
                                            <input id="hdn-token" type="hidden" name="_token" value="{{csrf_token()}}">
                                            <div class="form-group" id="phone-i">
                                                <input class="form-control" placeholder="Name" value="" id="name1" data-id="" name="name1"> </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div style="padding-left: 90px; margin-top: -20px;"  class="row">
                                <div class="view-mode value" id="email-token">
                                    <input id="hdn-token" type="hidden" name="_token" value="{{csrf_token()}}">
                                    <p class="text-muted email-info">
                                        <label id="email-e">{{ucwords(Auth::user()->email)}}</label>
                                    </p>
                                </div>
                                </br>
                                <div class="edit-mode hide">
                                    <div class="row">
                                        <div class="col-xs-10">
                                            <input id="hdn-token" type="hidden" name="_token" value="{{csrf_token()}}">
                                            <div class="col-xs-5">
                                                <div class="form-group" id="email-i">
                                                    <input id="hdn-token" type="hidden" name="_token" value="{{csrf_token()}}">
                                                    <input class="form-control" placeholder="Email" value="" id="email1" data-id="" name="email1"> </div>
                                            </div>
                                            <button id="{{Auth::user()->id}}" class="btn btn-sm btn-success detail-save-user"><i class="fa fa-save"></i></button>
                                            <button class="btn btn-sm btn-danger detail-cancel-user"><i class="fa fa-times"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                           <div class="row">
                           	    <h1 style="padding-left: 15px; margin-bottom: 20px;">Orders</h1>	
                               <div class="col-md-12">
                                   <div style="width: 530px;" class="accordion" id="accordionExample"> @foreach($orders as $order)
                                       <div class="card">
                                           <button class="btn btn-link" style="color:white; background-color:#007bff" id="{{$order->orderid}}" type="button" data-toggle="collapse" data-target="#collapse-order{{$order->orderid}}" aria-expanded="true" aria-controls="collapseOne">
                                               <div class="card-header" id="headingOne" style="text-align:left">
                                                   <h4 class="mb-0" style="text-align:left; "> <label >OrderId:{{$order->orderid}}</label></h4> <small><label>Date Odered:{{$order->created_at}}</label> </small> </div>
                                           </button>
                                           <div id="collapse-order{{$order->orderid}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                               <div class="card-body">
                                                   <table class="table table-bordered" id="details">
                                                       <thead>
                                                           <tr>
                                                               <th>Image</th>
                                                               <th>Price</th>
                                                               <th>Units/Mo</th>
                                                               <th>Revenue/Mo</th>
                                                               <th>Competitors</th>
                                                           </tr>
                                                       </thead>
                                                       <tbody> @foreach($order->cart->items as $item)
                                                           <tr>
                                                               <td><img src="{{asset($item['item']['image'])}}" /></td>
                                                               <td>{{$item['item']['prime_low_price']}}</td>
                                                               <td>{{$item['item']['total_units_sold_mo']}}</td>
                                                               <td>{{$item['item']['total_revenue_mo']}}</td>
                                                               <td>{{$item['item']['competitive_sellers']}}</td>
                                                           </tr>@endforeach </tbody>
                                                   </table>
                                                   </br> <a href="#" style="float:right" data-target="#details-modal{{$order->orderid}}" data-toggle="modal">more details</a>
                                                   <div class="modal fade" id="details-modal{{$order->orderid}}" role="dialog" aria-hidden="true">
                                                       <div class="modal-dialog modal-lg" style="width:1250px;" role="document">
                                                           <div class="modal-content" style="padding:20px; ">
                                                               <div class="modal-header">
                                                                   <h5 class="modal-title"><h2>Order Details</h2></h5>
                                                                   <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                                                               </div>
                                                               </br>
                                                               <table id="details-order" class="display nowrap table-responsive order-dets" style="max-width:100%;">
                                                                   <thead>
                                                                       <tr>
                                                                           <th>Product Link</th>
                                                                           <th>Brand</th>
                                                                           <th>ASIN</th>
                                                                           <th>Prime Low Price</th>
                                                                           <th>Units Sold/Mo</th>
                                                                           <th>Revenue/Mo</th>
                                                                           <th>Competitive</br> Sellers</th>
                                                                           <th>Sales Equity</br> (Units/Mo)</th>
                                                                           <th>Sales Equity</br> (Revenue/Mo)</th>
                                                                           <th>Name</th>
                                                                           <th>Position</th>
                                                                           <th>Website URL</th>
                                                                           <th>Contact No</th>
                                                                           <th>Address</th>
                                                                           <th>Email</th>
                                                                       </tr>
                                                                   </thead>
                                                                   <tbody> @foreach($order->cart->items as $item)
                                                                       <input id="hdn-token" type="hidden" name="_token" value="{{csrf_token()}}">
                                                                       <tr>
                                                                           <td>{{$item['item']['product_page_link']}}</td>
                                                                           <td>{{$item['item']['brand']}}</td>
                                                                           <td>{{$item['item']['asin']}}</td>
                                                                           <td>{{$item['item']['prime_low_price']}}</td>
                                                                           <td>{{$item['item']['total_units_sold_mo']}}</td>
                                                                           <td>{{$item['item']['total_revenue_mo']}}</td>
                                                                           <td>{{$item['item']['competitive_sellers']}}</td>
                                                                           <td>{{$item['item']['our_sales_equity_units_mo']}}</td>
                                                                           <td>{{$item['item']['our_sales_equity_revenue_mo']}}</td>
                                                                           <td>{{$item['item']['firstname']}}{{$item['item']['lastname']}}</td>
                                                                           <td>{{$item['item']['position']}}</td>
                                                                           <td>{{$item['item']['website_url']}}</td>
                                                                           <td>{{$item['item']['contact_no']}}</td>
                                                                           <td>{{$item['item']['address']}}</td>
                                                                           <td>{{$item['item']['email']}}</td>
                                                                       </tr>@endforeach </tbody>
                                                               </table>
                                                           </div>
                                                       </div>
                                                   </div>
                                               </div>
                                           </div>
                                       </div>@endforeach </div>
                               </div>
                           </div> 
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="order">
                    
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $("#imgInp").click(function() {
            console.log('test');
            $('.upload_user').removeAttr('disabled');
        });
        $("#img-up").submit(function() {
            $('.upload_user').attr('disabled', true);
        });
    });
</script>@endsection