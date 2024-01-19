<div>
    <h1>Service Provider Dashboard</h1>

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
                        <h1>Orders You Get</h1>
                        <div class="crumbs">
                            <ul>
                                <li><a href="/">Home</a></li>
                                <li>/</li>
                                <li>Orders</li>
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
                                                    
                                                
                                                <div class="col-md-6">
                                                    
                                                </div>
                                           </div>
                                       </div>
                                       
                                       <div class="panel-body"  >
                                            @if(Session::has('message'))
                                               <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                                            @endif
                                            @if(count($orders))
                                           <table class="table table-striped" >
                                                <thead>
                                                    <tr>
                                                        <th>Request ID</th>
                                                        <th>Student Name</th>
                                                        <th>Student Email</th>
                                                        <th>Student Phone</th>
                                                        <th>Complain Category</th>
                                                        <th>Created At</th>
                                                        <th>Action</th>
                                                    </tr>
                                               </thead>
                                               <tbody>
                                                    @foreach($orders as $order)
                                                      <tr>
                                                         <td>{{$order->id}}</td>
                                                         <td>{{$order->user->name}}</td>
                                                         <td>{{$order->user->email}}</td>
                                                         <td>{{$order->user->phone}}</td>
                                                         <td>{{$order->service->name}}</td>
                                                         <td>{{date('d-m-Y',strtotime($order->created_at))}}</td>
                                                         @if($order->provider_completed!=1)
                                                         <td><a onclick="return confirm('Are you sure you completed the service???')" href="/sprovider/order-complete/{{$order->id}}" class="btn btn-primary">Completed this order</a></td>
                                                         @else
                                                         <td>Completed</td>
                                                         @endif
                                                       </tr>
                                                   @endforeach
                                               </tbody>
                                            </table>
                                            @else
                                                <h4>You have no order yet</h4>
                                            @endif
                                           
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