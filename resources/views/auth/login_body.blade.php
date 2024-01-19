
<div class="section-title-01 honmob">
    <div class="opacy_bg_02">
        <div  class="tp-banner"> 
                <ul>
                    <li>
                        <img src="{{asset('assets/images/slide/1.jpg')}}" alt="fullslide1" >
                    </li>
                    <li>
                        <img src="{{asset('assets/images/slide/2.jpg')}}" alt="fullslide1">
                    </li>
                    <li>
                        <img src="{{asset('assets/images/slide/3.jpg')}}" alt="fullslide1">
                    </li>
                </ul>
                <div class="tp-bannertimer"></div>
        </div>
        <div class="container">
            <h1>Login</h1>
            <div class="crumbs">
                <ul>
                    <li><a href="/">Home</a></li>
                    <li>/</li>
                    <li>Login</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<section class="content-central loginContainer">
    <div class="content_info">
    <div class="thinborder-ontop">
                            <h3>Login Info</h3>
                            <x-jet-validation-errors class="mb-4" />
                            <form id="userloginform" method="POST" action="{{route('login')}}">   
                                @csrf                                     
                                <div class="form-group row">
                                    <label for="email" class="col-sm-4 col-form-label text-md-right">E-Mail Address</label>
                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control" name="email" value="" required="" autofocus="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password"
                                        class="col-md-4 col-form-label text-md-right">Password</label>
                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control" name="password" required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" id="remember_me" name="remember"> Remember Me </label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-primary pull-right">Login</button>
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-10">
                                        <a class="" href="{{route('password.request')}}">Forgot Your Password?</a>
                                    </div>
                                </div>
                            </form>
                        </div>  
    </div>         
</section>
