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
                            <li>Update Profile</li>
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
                                               Update Profile
                                            </div>
                                            <div class="col-md-6">
                                                
                                            </div>
                                       </div>
                                   </div>
                                   <div class="panel-body">
                                       @if(Session::has('message'))
                                            <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                                       @endif
                                      <form id="usercheckoutform" method="POST" wire:submit.prevent="updateProfile">
                                          <div class="row">
                                             <div class="col-md-4">
                                                @if($newimage)
                                                   <img src="{{$newimage->temporaryUrl()}}" width="100%">
                                                @elseif($image)
                                                 <img src="{{asset('assets/images/profiles')}}/{{$image}}" width="100%">
                                                @else
                                                 <img src="{{asset('assets/images/profiles/default.jpg')}}" width="100%">
                                                @endif
                                                 <input type="file" class="form-control" wire:model="newimage" />
                                             </div>

                                             <div class="col-md-8">
                                                <p><b>Name: </b><input id="name" type="text" class="form-control" required wire:model="name"/></p>
                                                @error('name') <p class="text-danger">{{$message}}</p> @enderror
                                                <p><b>Email: </b>{{$email}}</p>
                                                <p><b>Phone: </b><input id="phone" type="tel" placeholder="01*********" pattern="[0-9]{11}" required class="form-control" wire:model="phone"/></p>
                                                @error('phone') <p class="text-danger">{{$message}}</p> @enderror
                                                <hr>
                                                <p><b>Address: </b><input type="text" class="form-control" required wire:model="address"/></p>
                                                @error('address') <p class="text-danger">{{$message}}</p> @enderror
                                                <button type="submit" class="btn btn-info pull-right">Update</button>
                                            </div>
                                          </div>
                                      </form>
                                   </div>
                               </div>
                            </div>
                        </div>
                    </div>  
                </div>   
            </div>      
        </section>    
    </div>
