    <div>
        <div class="section-title-01 honmob">
            <div class="bg_parallax image_02_parallax"></div>
            <div class="opacy_bg_02">
                <div class="container">
                    <h1>Edit Profile</h1>
                    <div class="crumbs">
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li>/</li>
                            <li>Edit Profile</li>
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
                                               Edit Profile
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
                                                 <img src="{{asset('assets/images/sproviders')}}/{{$image}}" width="100%">
                                                @else
                                                 <img src="{{asset('assets/images/sproviders/default.jpg')}}" width="100%">
                                                @endif
                                                 <input type="file" class="form-control" wire:model="newimage" />
                                             </div>

                                             <div class="col-md-8">
                                                <p><b>About: </b><input id="about" type="text" class="form-control" required wire:model="about"/></p>
                                                @error('about') <p class="text-danger">{{$message}}</p> @enderror
                                                <p><b>City: </b><input id="city" type="city"  class="form-control" wire:model="city"/></p>
                                                @error('city') <p class="text-danger">{{$message}}</p> @enderror
                                                <select class="form-control-file" name="service_category_id" wire:model="service_category_id">
                                                    @foreach($scategories as $scategory)
                                                       <option value="{{$scategory->id}}">{{$scategory->name}}</option>
                                                    @endforeach
                                                </select>
                                                <p><b>Service Category ID: </b><input id="service_category_id" type="service_category_id"  class="form-control" wire:model="service_category_id"/></p>
                                                @error('service_category_id') <p class="text-danger">{{$message}}</p> @enderror
                                                <p><b>Service Locations zipcode/pincode: </b><input id="service_locations" type="service_locations"  class="form-control" wire:model="service_locations"/></p>
                                                @error('service_locations') <p class="text-danger">{{$message}}</p> @enderror
                                                <hr>
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
