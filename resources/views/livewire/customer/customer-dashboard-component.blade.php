<div>
  



    <div>
    


    <div>
        <style>
            nav svg{
                height: 20px;
            }
            nav .hidden{
                display: block !important;
            }
        </style>
        <div class="section-title-01 honmob">
            <div class="bg_parallax image_02_parallax"></div>
            <div class="opacy_bg_02">
                <div class="container">
                    <h1>My Serives</h1>
                    <div class="crumbs">
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li>/</li>
                            <li>Complain Requests</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <section class="content-central"  >
            <div class="content_info" >
                <div class="paddings-mini" >
                    <div class="container" >
                        <div class="row">
                            <div class="col-md-12 profile1">
                                <div class="panel panel-default">
                                   <div class="panel-heading">
                                       <div class="row">
                                            <div class="col-md-6">
                                                Service History
                                            </div>
                                            <div class="col-md-6">
                                                
                                            </div>
                                       </div>
                                   </div>
                                   <div class="panel-body"  >
                                        @if(Session::has('message'))
                                           <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                                        @endif
                                       <table class="table table-striped" >
                                            <thead>
                                                <tr>
                                                    <th>Request ID</th>
                                                    <th>Phone</th>
                                                    <th>Student Id</th>
                                                    <th>Room No.</th>
                                                    <th>Complain Category</th>
                                                    <th>Service Provider Name</th>
                                                    <th>Service Provider Phone</th>
                                                    <th>Service Completed</th>
                                                    <th>Created At</th>
                                                    <th>Action</th>
                                                </tr>
                                           </thead>
                                           <tbody>
                                                @foreach($orders as $order)
                                                  <tr>
                                                     <td>{{$order->id}}</td>
                                                     <td>{{$order->user->phone}}</td>
                                                     <td>{{$order->user->student_id}}</td>
                                                     <td>{{$order->user->room_no}}</td>
                                                     <td>{{$order->service->name}}</td>
                                                     <td>{{$order?->s_provider?->name}}</td>
                                                     <td>{{$order?->s_provider?->phone}}</td>
                                                     <td>{{isOrderCompleted($order)==0 ? 'No':'Yes'}}</td>
                                                     <td>{{date('d-m-Y',strtotime($order->created_at))}}</td>
                                                     <td>
                                                        @if(!$order->student_completed)
                                                            <a onclick="return confirm('Are you sure?')" href="/user/order-completed/{{$order->id}}" class="btn btn-primary">Got the Service</a>
                                                        @endif
                                                    </td>
                                                   </tr>
                                               @endforeach
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
        </section>    
    </div>

    

</div>



</div>
