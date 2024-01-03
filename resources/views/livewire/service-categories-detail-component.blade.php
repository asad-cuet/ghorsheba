    <div>



  


       <div class="section-title-01 honmob">
            <div class="bg_parallax image_01_parallax"></div>
            <div class="opacy_bg_02">
                <div class="container">

                    
        @if(Session::has('message'))
        <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
        @endif
        @if(Session::has('failed'))
        <div class="alert alert-danger" role="alert">{{Session::get('failed')}}</div>
        @endif
                    <h1>{{$scategory->name}}</h1>
                    <div class="crumbs">
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li>/</li>
                            <li>{{$scategory->name}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <section class="content-central">
            <div class="content_info">
                <div class="paddings-mini">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8 single-blog">
                                <div class="post-item">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="post-header">
                                                <div class="post-format-icon post-format-standard"
                                                    style="margin-top: -10px;">
                                                    
                                                    <i class="fa fa-server"></i>
                                                </div>
                                                <div class="post-info-wrap">
                                                    <h2 class="post-title"><a href="/" title="Post Format: Standard"
                                                            rel="bookmark">{{$scategory->name}}</a></h2>
                                                    <div class="post-meta" style="height: 10px;">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div id="single-carousel">
                                                <div class="img-hover">
                                                    <img src="{{asset('assets/images/services')}}/{{$scategory->coverimage}}" alt="{{$scategory->name}}"
                                                        class="img-responsive">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="post-content">
                                                <h3>{{$scategory->name}}</h3>
                                                <p>{{$scategory->description}}</p>
                                                <h4>What Does Our {{$scategory->name}} Service Include?</h4>
                                                <ul class="list-styles">
                                                    @foreach(explode("|",$scategory->inclusion) as $inclusion)
                                                       <li><i class="fa fa-plus"></i>{{$inclusion}}</li>
                                                    @endforeach
                                                </ul>
                                                <h4>Note To Customer:</h4>
                                                <ul class="list-styles">
                                                    @foreach(explode("|",$scategory->notes) as $notes)
                                                       <li><i class="fa fa-plus"></i>{{$notes}}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <aside class="widget" style="margin-top: 18px;">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Booking Details</div>
                                        <div class="panel-body">
                                            <table class="table">
                                                <tr>
                                                    <td style="border-top: none;">Price</td>
                                                    <td style="border-top: none;"> {{$scategory->price}} <span>&#2547</span></td>
                                                </tr>
                                                <tr>
                                                    <td>Quantity</td>
                                                    <td>1</td>
                                                </tr>
                                                <tr>
                                                    <td>Discount</td>
                                                    <td>{{$scategory->discount}}%</td>
                                                </tr>
                                                @php
                                                    $actual_price=($scategory->price)-(($scategory->price)*($scategory->discount)/100);
                                                @endphp
                                                <tr>
                                                    <td>Total</td>
                                                    <td>{{$actual_price}} <span>&#2547</span></td>
                                                </tr>
                                            </table>
                                        </div>                                      

                                        @if(Route::has('login'))
                                           @auth
                                               @if(Auth::user()->utype==='CST')
                                               <div class="panel-footer">
                                                  <h5>Cash On Delivery</h5>
                                                  <a class="btn btn-primary" href="/customer/book/cod/{{$scategory->id}}" onclick="return confirm('Are you sure?')">
                                                      Book Now (Cash On Delivery)
                                                  </a>
                                               </div>

                                               <div class="panel-footer">
                                                   <h5>Online Payment</h5>
                                                   <form action="/customer/book/online/{{$scategory->id}}" method="POST">
                                                       @csrf

                                                       <select name="book_type" style="margin-bottom:6px;" required class="form-select form-control" aria-label="Default select example">
                                                            <option value="0" selected>Select Payment Mode</option>
                                                            <option value="bkash">Bkash</option>
                                                            <option value="rocket">Rocket</option>
                                                            <option value="nagad">Nagad</option>
                                                       </select>
                                                       @error('book_type') <p class="text-danger">{{$message}}</p> @enderror
                                                
                                                       <label for="">Transiction ID</label>
                                                       <input required type="text" name="tran_id" class="form-control">

                                                       <input type="hidden" name="id" value="">
                                                       <br>
                                                       <input type="submit" class="btn btn-primary" value="Book Now (Online Payment)">
                                                    </form>   
                                                </div>
                                                @else
                                                <div class="panel-footer">
                                                   <h5>Login as Customer to Make Order</h5>
                                                </div>
                                                @endif
                                           @else   
                                           <div class="panel-footer">
                                               <form action="{{route('login')}}" method="GET">
                                                  @csrf
                                                  <input type="submit" class="btn btn-primary" value="Login as Customer to Book">
                                               </form >
                                           </div>       
                                           @endif

                                        @endif    
                                        


                                    </div>
                                </aside>
                            </div>
                        </div>
                    </div>
                </div>
            </div>            
        </section>
    </div>

  
