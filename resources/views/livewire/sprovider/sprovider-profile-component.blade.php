   <div>
        <div class="section-title-01 honmob">
            <div class="bg_parallax image_02_parallax"></div>
            <div class="opacy_bg_02">
                <div class="container">
                    <h1>Profile</h1>
                    <div class="crumbs">
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li>/</li>
                            <li>Profile</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <section class="content-central">
            <div class="content_info">
                <div class="paddings-mini">
                    <div class="container">
                        <div class="row portfolioContainer">
                            <div class="col-md-8 col-md-offset-2 profile1">
                               <div class="panel panel-default">
                                   <div class="panel-heading">
                                       <div class="row">
                                            <div class="col-md-6">
                                               Profile
                                            </div>
                                            <div class="col-md-6">
                                                
                                            </div>
                                       </div>
                                   </div>
                                   <div class="panel-body">
                                      <div class="row">
                                          <div class="col-md-4">
                                              @if($sprovider->image)
                                                <img src="{{asset('assets/images/sproviders')}}/{{$sprovider->image}}" width="100%">
                                              @else
                                                <img src="{{asset('assets/images/sproviders/default.jpg')}}" width="100%">
                                              @endif
                                          </div>
                                          <div class="col-md-8">
                                               <h3>Name: {{Auth::user()->name}}</h3>
                                               <p><b>About: </b>{{$sprovider->about}}</p>
                                               <p><b>Email: </b>{{Auth::user()->email}}</p>
                                               <p><b>Phone: </b>{{Auth::user()->phone}}</p>
                                               <p><b>Complain Category: </b>
                                               @if($sprovider->complain_category_id)
                                                   {{$sprovider->category->name}}
                                               @endif
                                               </p>
                                               {{-- <a href="{{route('sprovider.edit_profile')}}" class="btn btn-info pull-right">Update Profile</a> --}}
                                          </div>
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
