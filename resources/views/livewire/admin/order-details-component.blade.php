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
                    <h1>Contacts</h1>
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
                                                
                                                @if($history!=1) 
                                                <button wire:click="orderHistory" class="btn btn-primary">History</button>
                                                <b>Recent Complain Request</b>  
                                                @else
                                                <button wire:click="orderNew" class="btn btn-primary">Recent</button>
                                                <b>Complain History</b>
                                                @endif
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
                                                    <th>ID</th>
                                                    <th>Room No</th>
                                                    <th>Student Name</th>
                                                    <th>Student Id</th>
                                                    <th>Student Email</th>
                                                    <th>Complain Type</th>
                                                    <th>Created At</th>
                                                    <th>Action</th>
                                                </tr>
                                           </thead>
                                           <tbody>
                                                @foreach($orders as $order)
                                                  <tr>
                                                     <td>{{$order->id}}</td>
                                                     <td>{{$order->user->room_no}}</td>
                                                     <td>{{$order->user->name}}</td>
                                                     <td>{{$order->user->student_id}}</td>
                                                     <td>{{$order->user->email}}</td>
                                                     <td>{{$order->service->name}}</td>
                                                     <td>{{date('d-m-Y',strtotime($order->created_at))}}</td>
                                                     <td><a href="/admin/order-view/{{$order->id}}" class="btn btn-primary">View</a></td>
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
