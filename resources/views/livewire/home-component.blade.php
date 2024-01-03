   <div>
        <section>
            <div  class="tp-banner"> 
                <ul>
                    <li>
                        <img src="{{asset('assets/images/slide/1.jpg')}}" alt="fullslide1" >
                    </li>
                    <li>
                        <img src="{{asset('assets/images/slide/2.jpg')}}" alt="fullslide1">
                    </li>
                </ul>
                <div class="tp-bannertimer"></div>
            </div>
            <div class="filter-title">
                <div class="title-header">
                    <h2 style="color:black;">BOOK A SERVICE</h2>
                    <p style="color:black;">Book a service at very affordable price, </p>
                </div>
                <div class="filter-header">
                    <form id="sform" action="{{route('searchService')}}" method="post"> 
                        @csrf                       
                        <input type="text" id="q" name="q" required="required" placeholder="What Services do you want?"
                            class="input-large typeahead" autocomplete="off">
                        <input type="submit" name="submit" value="Search">
                    </form>
                </div>
            </div>
        </section>
        <section class="content-central">
            <div class="content_info">
                <div>
                    <div class="container">
                        <div class="row">
                            <div class="titles">
                                <h2><span>GHORSHEBA</span> Choice of Services</h2>
                                <hr class="tall">
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
            <div class="content_info">
                <div class="bg-dark color-white border-top">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4 ">
                                <div class="services-lines-info">
                                    <h2>WELCOME TO DIVERSIFIED</h2>
                                    <p stvle=""class="lead">
                                        Book best services at one place.
                                    </p>
                                    <p>Find a wide variety of home services.</p>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <ul class="services-lines">
                                    @foreach($fscategories as $fscategory)
                                    <li>
                                        <a href="{{route('home.service_category_view',['category_id'=> $fscategory->slug])}}">
                                            <div class="item-service-line">
                                                <i class="fa">
                                                <img class="icon-img"
                                                        src="{{asset('assets/images/categories')}}/{{$fscategory->image}}"></i>
                                                <h5>{{$fscategory->name}}</h5>
                                            </div>
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
   </div>

   @push('scripts')
     <script type="text/javascript">
           var path="{{route('autocomplete')}}";
           $('input.typeahead').typeahead({                
                source:function(query,process){
                   return $.get(path,{query:query},function(data){
                       return process(data);
                   });
                },
           });
     </script>
   @endpush