    
    <div>
        <div class="section-title-01 honmob">
            <div class="bg_parallax image_01_parallax"></div>
            <div class="opacy_bg_02">
                <div class="container">
                    <h1>All Complains</h1>
                    <div class="crumbs">
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li>/</li>
                            <li>Complain Categories</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <section class="content-central">
            <div class="container">
                <div class="row" style="margin-top: -30px;">
                    <div class="titles">
                        <h2>Complain<span>Categories</span></h2>
                        <hr class="tall">
                    </div>
                </div>
            </div>
            <div class="content_info" style="margin-top: -70px;">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="services-lines full-services">
                            @foreach($scategories as $scategory)
                            <li>
                                <div class="item-service-line">
                                    <i class="fa"><a href="/service-category-view/{{$scategory->slug}}"><img class="icon-img"
                                                src="{{asset('assets/images/categories')}}/{{$scategory->image}}" alt="{{$scategory->name}}" style="max-width:79px;height:auto"></a></i>
                                    <h5>{{$scategory->name}}</h5>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </div>
