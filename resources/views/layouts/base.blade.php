<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>GhorSheba - Online Service Provider for your House Needs</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" media="screen">
    <link href="{{asset('assets/css/chblue.css')}}" rel="stylesheet" media="screen">
    <script type="text/javascript" src="{{asset('assets/js/jquery.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/jquery-ui.1.10.4.min.js')}}"></script>
    @livewireStyles
</head>
<body>
    <div id="layout" >
        <div class="info-head">
            <div class="container"> 
                <div >
                    <div class="col-md-6">
                        <ul >
                            <li><a href="tel:+8801871717051"><i class="fa fa-phone"></i> +8801871717051</a></li>
                            <li><a href="mailto:contact@ghorsheba.com"><i class="fa fa-envelope"></i>
                                contact@ghorsheba.com</a></li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul class="text-right">
                            <li>
                                <i class="fa fa-map-marker"></i> Mirpur, Dhaka</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <header  id="header" class="header-v3">
            <nav class="flat-mega-menu">
                <ul >
                    <li class="title">
                        <a href="{{route('home')}}"><img src="{{asset('assets/images/logo.png')}}"></a>
                    </li>
                    <li> <a href="{{route('home.service_categories')}}">Service Categories</a>
                    <li> <a href="javascript:void(0);">Air Conditioners</a>
                        <ul class="drop-down one-column hover-fade">
                            <li><a href="/service-category-view/ac-installation">Installation</a></li>
                            <li><a href="/service-category-view/ac-uninstallation">Uninstallation</a></li>
                            <li><a href="/service-category-view/ac-repair">Repair</a></li>
                        </ul>
                    </li>
                    <li> <a href="#">Home Needs</a>
                        <ul class="drop-down one-column hover-fade">
                            <li><a href="/service-category-view/laundry">Laundry</a></li>
                            <li><a href="/service-category-view/electrical">Electrical</a></li>
                            <li><a href="/service-category-view/plumbing">Plumbing </a></li>
                            <li><a href="/service-category-view/painting">Painting</a></li>
                            <li><a href="/service-category-view/house-shifting">House Shifting </a></li>
                        </ul>
                    </li>
                    <li> <a href="#">Home Cleaning</a>
                        <ul class="drop-down one-column hover-fade">
                            <li><a href="/service-category-view/tank-cleaning">Tank Cleaning</a></li>
                            <li><a href="/service-category-view/furniture">Furniture </a></li>
                            <li><a href="/service-category-view/home-deep-cleaning">Home Deep Cleaning </a></li>
                            <li><a href="/service-category-view/bathroom-deep-cleaning">Bathroom Deep Cleaning</a></li>
                        </ul>
                    </li>
                    @if(Route::has('login'))
                        @auth
                            @if(Auth::user()->utype==='ADM')
                            <li class="login-form"> <a href="#" title="Register">My Account(Admin)</a>
                                <ul class="drop-down one-column hover-fade">
                                    
                                    <li><a href="{{route('user.profile')}}">My Profile</a></li>
                                    <li><a href="{{route('admin.new-order')}}">New Order</a></li>
                                    <li><a href="{{route('admin.service_categories')}}">Service Categories</a></li>
                                    <li><a href="{{route('admin.contacts')}}">All Contacts</a></li>
                                    <li><a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                                </ul>
                            </li>
                            @elseif(Auth::user()->utype==='SVP')
                            <li class="login-form"> <a href="#" title="Register">My Account(S Provider)</a>
                                <ul class="drop-down one-column hover-fade">
                                    <li><a href="{{route('sprovider.dashboard')}}">Dashboard</a></li>
                                    <li><a href="{{route('sprovider.profile')}}">Profile</a></li>
                                    <li><a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                                </ul>
                            </li>
                             @else
                            <li class="login-form"> <a href="#" title="Register">My Account(Customer)</a>
                                <ul class="drop-down one-column hover-fade">
                                    <li><a href="{{route('user.profile')}}">My Profile</a></li>
                                    <li><a href="{{route('customer.dashboard')}}">Dashboard</a></li>
                                    <li><a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
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
       
        {{ $slot }}
    
        <footer id="footer" class="footer-v1">
            <div class="container">
                <div class="footer_coustom">
                    <div class="footer_contactus">
                        <ul class="contact_footer">
                            <li class="location">
                                <i class="fa fa-info-circle"></i> <a href="{{route('home.about_us')}}"> <b>ABOUT US</b></a>
                            </li>
                            <li>
                                <i class="fa fa-phone"></i> <a href="{{route('home.contact')}}"><b>CONTACT</b></a>
                            </li>
                            <li>
                                <i class="fa fa-check-square"></i> <a href="{{route('home.terms_of_use')}}"><b>TERMS OF USE & POLICY</b></a>
                            </li>
                            <li>
                                <i class="fa fa-lock"></i> <a href="{{route('home.privacy')}}"><b>PRIVACY</b></a>
                            </li>
                        </ul>
                    </div>
                    <div class="footer_contactus">
                        <h3>CONTACT US</h3>
                        <ul class="contact_footer">
                            <li class="location">
                                <i class="fa fa-map-marker"></i> <a href="#"> Mirpur, Dhaka, Bangladesh</a>
                            </li>
                            <li>
                                <i class="fa fa-envelope"></i> <a
                                    href="mailto:contact@surfsidemedia.in">contact@ghorsheba.in</a>
                            </li>
                            <li>
                                <i class="fa fa-headphones"></i> <a href="tel:+8801871717051">+8801871717051</a>
                            </li>
                        </ul>
                    </div>
                    <div class="footer_aboutus">
                        <h3 style="margin-top: 10px">FOLLOW US</h3>
                        <ul class="social">
                            <li class="facebook"><span><i class="fa fa-facebook"></i></span><a href="#"></a></li>
                            <li class="twitter"><span><i class="fa fa-twitter"></i></span><a href="#"></a></li>
                            <li class="github"><span><i class="fa fa-instagram"></i></span><a href="#"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer-down">
               <p class="text-xs-center crtext">&copy; 2022 GhorSheba. All Rights Reserved.</p>
            </div>            
        </footer>
    </div>
    <script type="text/javascript" src="{{asset('assets/js/nav/jquery.sticky.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/totop/jquery.ui.totop.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/accordion/accordion.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/rs-plugin/js/jquery.themepunch.tools.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/rs-plugin/js/jquery.themepunch.revolution.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/maps/gmap3.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/fancybox/jquery.fancybox.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/carousel/carousel.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/filters/jquery.isotope.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/twitter/jquery.tweet.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/flickr/jflickrfeed.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/theme-options/theme-options.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/theme-options/jquery.cookies.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/bootstrap/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/bootstrap/bootstrap-slider.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/dtb/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/dtb/jquery.table2excel.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/dtb/script.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/select2.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/jquery.validate.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/validation-rule.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/bootstrap3-typeahead.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/main.js')}}"></script>
    <script type="text/javascript">
        jQuery(document).ready(function () {
            jQuery('.tp-banner').show().revolution({
                dottedOverlay: "none",
                delay: 5000,
                startwidth: 1170,
                startheight: 480,
                minHeight: 250,
                navigationType: "none",
                navigationArrows: "solo",
                navigationStyle: "preview1"
            });
        });

    </script>
    @stack('scripts')
    
    @livewireScripts
</body>