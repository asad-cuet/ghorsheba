<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>CUET | Hall-Service</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/css/style.css" rel="stylesheet" media="screen">
    <link href="assets/css/chblue.css" rel="stylesheet" media="screen">
    <script type="text/javascript" src="assets/js/jquery.js"></script>
    <script type="text/javascript" src="assets/js/jquery-ui.1.10.4.min.js"></script>
    <livewire:styles />
</head>
<body>
    <div id="layout">
        <div class="info-head">
            <div class="container"> 
                <div >
                    <div class="col-md-6">
                        <ul >
                            <li><a href="tel:+8801871717051"><i class="fa fa-phone"></i> +8801871717051</a></li>
                            <li><a href="mailto:contact@ghorsheba.com"><i class="fa fa-envelope"></i>
                                bangabondhuhall@cuet.ac.bd</a></li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul class="text-right">
                            <li>
                                <i class="fa fa-map-marker"></i> Bangabondhu Hall,CUET,Raozan,Chittagong</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <header  id="header" class="header-v3">
            <nav class="flat-mega-menu">
                <ul >
                    <li class="title">
                        <a href="{{route('home')}}"><img src="assets/images/logo.png"></a>
                    </li>
                    @if(Route::has('login'))
                        @auth
                            @if(Auth::user()->utype==='ADM')
                            <li class="login-form"> <a href="#" title="Register">My Account(Admin)</a>
                                <ul class="drop-down one-column hover-fade">
                                    <li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                                    <li><a href="{{route('admin.service_categories')}}">Complain Categories</a></li>
                                    <li><a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                                </ul>
                            </li>
                            @elseif(Auth::user()->utype==='SVP')
                            <li class="login-form"> <a href="#" title="Register">My Account(S Provider)</a>
                                <ul class="drop-down one-column hover-fade">
                                    <li><a href="{{route('sprovider.dashboard')}}">My Services</a></li>
                                    <li><a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                                </ul>
                            </li>
                             @else
                            <li class="login-form"> <a href="#" title="Register">My Account(Customer)</a>
                                <ul class="drop-down one-column hover-fade">
                                    <li><a href="{{route('customer.dashboard')}}">My Services</a></li>
                                    < <li><a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                                </ul>
                            </li>
                             @endif
                        <form id="logout-form" method="POST" action="{{route('logout')}}">
                             @csrf
                        </form>
                        @else
                           <li class="login-form"> <a href="{{route('register')}}" title="Register">Register</a></li>
                           <li class="login-form"> <a href="{{route('login')}}" title="Login">Login</a></li>
                        @endif
                    @endif
                    <li class="search-bar"></li>
                </ul>
            </nav>
        </header>
  
    