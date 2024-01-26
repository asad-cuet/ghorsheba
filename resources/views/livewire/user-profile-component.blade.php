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
                                            @if(Auth::user()->utype==='ADM' || Auth::user()->utype==='SPV')
                                                @if($user->profile->image!='')
                                                    <img src="{{asset('assets/images/profiles/'.$user->profile->image)}}" width="100%">
                                                @else
                                                    <img src="{{defaultImage()}}" width="100%">
                                                @endif
                                            {{-- @elseif(Auth::user()->utype==='SPV') --}}

                                            @else
                                                @if($user->image!='')
                                                    <img src="{{asset($user->image)}}" width="100%">
                                                @else
                                                    <img src="{{defaultImage()}}" width="100%">
                                                @endif
                                            @endif
                                          </div>
                                          <div class="col-md-8">
                                            @if(Auth::user()->utype==='ADM')
                                                <h3>Name: {{$user->name}}</h3>
                                                <p><b>Email: </b>{{$user->email}}</p>
                                                <p><b>Phone: </b>{{$user->phone}}</p>
                                                <a href="{{route('user.editprofile')}}" class="btn btn-info pull-right">Update Profile</a>
                                            @elseif(Auth::user()->utype==='SPV')
                                                <h3>Name: {{$user->name}}</h3>
                                                <p><b>Email: </b>{{$user->email}}</p>
                                                <p><b>Phone: </b>{{$user->phone}}</p>
                                            @else
                                               <h3>Name: {{$user->name}}</h3>
                                               <p><b>Email: </b>{{$user->email}}</p>
                                               <p><b>Student Id: </b>{{$user->student_id}}</p>
                                               <p><b>Phone: </b>{{$user->phone}}</p>
                                               <p><b>Room No: </b>{{$user->room_no}}</p>
                                            @endif
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
