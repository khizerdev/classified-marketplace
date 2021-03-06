<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

   

    <!-- Fonts -->
    <link rel="icon" href="images/favicon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/flaticon/flaticon.css')}}">
   <link rel="stylesheet" href="{{ asset('assets/css/vendor/slick.min.css')}}">
   <link rel="stylesheet" href="{{ asset('assets/css/vendor/bootstrap.min.css')}}">
   <link rel="stylesheet" href="{{ asset('assets/css/custom/main.css')}}">
   <link rel="stylesheet" href="{{ asset('assets/css/custom/index.css')}}">

   <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">

   @yield('css')

   <style>
      .nav-link.dropdown-toggle {
    color: white !important;
}

.dropdown:hover>.dropdown-menu {
    display: block;
}

.navbar.bg-primary {
    background-color: #0044bb!important;
}
.navbar .dropdown-item:hover {
    color: #16181b;
    text-decoration: none;
    background-color: #0044bb;
    color: white;
}

/* hover dropdown menus */
@media only screen and (max-width: 991px) {
.navbar-hover .show > .dropdown-toggle::after{
transform: rotate(-90deg);
}
}
@media only screen and (min-width: 492px) {

.navbar-hover .collapse ul li{position:relative;}
.navbar-hover .collapse ul li:hover> ul{display:block}
.navbar-hover .collapse ul ul{position:absolute;top:100%;left:0;min-width:250px;display:none}
.navbar-hover .collapse ul ul ul{position:absolute;top:0;left:100%;min-width:250px;display:none

}}

/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}

body.modal-open {
    overflow: visible;
}
.dash-menu-list ul li .active {
    color: white;
    text-shadow: var(--primary-tshadow);
    border-bottom: 2px solid var(--primary);
    background: var(--primary);
}
   </style>

   

</head>
<body>
   <div >
      
      <header class="header-part">
         <div class="container">
            <div class="header-content">
               <div class="header-left">
                  <ul class="header-widget">
                     <li>
                        <button type="button" class="header-menu"><i class="fas fa-align-left"></i></button>
                     </li>
                     <li><a href="{{route('home')}}" class="header-logo">
                        <img src="{{asset('assets/images/logo.png')}}" alt="logo"></a>
                     </li>
                     <li>
                        @if(!Auth::check())
                        <a href="{{route('login')}}" class="header-user"><i class="fas fa-user"></i><span>Login</span></a>
                        @endif
                     </li>
                     <li>
                        <button type="button" class="header-src"><i class="fas fa-search"></i></button>
                     </li>
                  </ul>
               </div>
               <form class="header-search">
                  <div class="header-main-search">
                     <button type="submit" class="header-search-btn"><i class="fas fa-search"></i>
                     </button>
                     <input type="text" class="form-control" placeholder="Search, Whatever you needs...">
                     <button type="button" class="header-option-btn tooltip">
                        <i class="fas fa-sliders-h">
                           </i>
                           <span class="tooltext left">FilterOption</span>
                        </button>
                  </div>
                  <div class="header-search-option">
                     <div class="row">
                        <div class="col-6">
                           <div class="form-group"><input type="text" class="form-control" placeholder="City"></div>
                        </div>
                        <div class="col-6">
                           <div class="form-group"><input type="text" class="form-control" placeholder="State"></div>
                        </div>
                        <div class="col-6">
                           <div class="form-group"><input type="text" class="form-control" placeholder="Category"></div>
                        </div>
                        <div class="col-6">
                           <div class="form-group"><input type="number" class="form-control" placeholder="Price"></div>
                        </div>
                        <div class="col-12">
                           <div class="form-btn"><button type="submit" class="btn btn-inline"><i class="fas fa-search"></i><span>Search Here</span></button></div>
                        </div>
                     </div>
                  </div>
               </form>
               <div class="header-right">
                  @if(Auth::check())
                  <ul class="header-widget">
                     <li><button class="header-favourite"><i class="fas fa-heart"></i><sup>0</sup></button></li>
                     <li><button class="header-notify"><i class="fas fa-bell"></i><sup>0</sup></button></li>
                     <li><button class="header-message"><i class="fas fa-envelope"></i><sup>0</sup></button></li>
                  </ul>
                  @endif
                  <a href="{{route('admin.ad.create')}}" class="btn btn-inline"><i class="fas fa-plus-circle"></i><span>post your ad</span></a>
               </div>
            </div>
         </div>
      </header>
      <div class="sidebar-part">
         <div class="sidebar-body">
            <div class="sidebar-header">
               <a href="{{route('home')}}" class="sidebar-logo"><img src="{{asset('assets/images/logo.png')}}" alt="logo">
               </a>
               <button class="sidebar-cross">
                  <i class="fas fa-times">
                  </i>
               </button>
            </div>
            <div class="sidebar-content">
               <div class="sidebar-profile">
                  @if(Auth::check())
                  <a href="#" class="sidebar-avatar"><img src="<?php echo (Auth::user()->profile->avatar != NULL) ? url(Auth::user()->profile->avatar) : url("https://statics.olx.com.pk/external/base/img/avatar_4.png"); ?>" alt="avatar">
                  </a>
                  <h4>
                     <a href="#" class="sidebar-name">{{ Auth::user()->name }}</a>
                  </h4>
                  @endif
                  <a href="{{route('admin.ad.create')}}" class="btn btn-inline sidebar-btn">
                     <i class="fas fa-plus-circle"></i>
                     <span>post your ad</span>
                  </a>
               </div>
               <div class="sidebar-menu">
                  <ul class="nav nav-tabs">
                     <li><a href="#main-menu" class="nav-link active" data-toggle="tab">Menu</a></li>
                     @if(Auth::check())
                     <li><a href="#author-menu" class="nav-link" data-toggle="tab">Profile</a>
                     </li>
                     @endif
                  </ul>
                  <div class="tab-pane active" id="main-menu">
                     <ul class="navbar-list">
                        <li class="navbar-item">
                           <a class="navbar-link" href="{{route('home')}}">Home</a>
                        </li>
                        
                        <li class="navbar-item"><a class="navbar-link" href="{{route('contact')}}">Contact</a></li>
                     </ul>
                  </div>
                  @if(Auth::check())
                  <div class="tab-pane" id="author-menu">
                     <ul class="navbar-list">
                        <li class="navbar-item"><a class="navbar-link" href="{{route('admin.dashboard')}}">Dashboard</a></li>
                        <li class="navbar-item"><a class="navbar-link" href="{{route('admin.ad.create')}}">Ad Post</a></li>
                        <li class="navbar-item"><a class="navbar-link" href="{{route('admin.ads.index')}}">My Ads</a></li>
                        <li class="navbar-item navbar-dropdown"><a class="navbar-link" href="{{route('admin.saved.index')}}"><span>Bookmark</span><span>0</span></a></li>
                        <li class="navbar-item navbar-dropdown"><a class="navbar-link" href="{{route('admin.chats')}}"><span>Chat</span><span>0</span></a></li>
                        <li class="navbar-item"><a class="navbar-link" href="{{route('admin.user.profile')}}">Edit Profile</a></li>
                        <li class="navbar-item"><a class="navbar-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">Logout</a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                     </ul>
                  </div>
                  @endif
               </div>
               <div class="sidebar-footer">
                  <p>All Rights Reserved By <a href="{{route('home')}}">Classicads</a></p>
               </div>
            </div>
         </div>
      </div>
      <div class="btmbar-part">
         <div class="container">
            <ul class="btmbar-widget">
               <li><a href="{{route('login')}}"><i class="fas fa-user"></i></a></li>
               <li><a href="#"><i class="fas fa-star"></i><sup>0</sup></a></li>
               <li><a class="plus-btn" href="{{route('admin.ad.create')}}"><i class="fas fa-plus"></i><span>Ad Your Post</span></a></li>
               <li><a href="#"><i class="fas fa-bell"></i><sup>0</sup></a></li>
               <li><a href="{{route('admin.chats')}}"><i class="fas fa-envelope"></i><sup>0</sup></a></li>
            </ul>
         </div>
      </div>
      <nav class="navbar navbar-expand-md navbar-light bg-primary shadow-sm navbar-hover">


         <a class="navbar-brand" href="#"></a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHover"
             aria-controls="navbarDD" aria-expanded="false" aria-label="Navigation">
             <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarHover">
             <ul class="navbar-nav">
     
     
                  @foreach ($menus as $menu)
                      
                  <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="{{route('by.category' , [$menu->slug] )}}"
                          data-toggle="dropdown_remove_dropdown_class_for_clickable_link" aria-haspopup="true"
                          aria-expanded="false">
                          {{$menu->name}}
                      </a>
      
                      <ul class="dropdown-menu">
      
      
                           @foreach ($menu->subcategories as $submenu)
                               
                           <li>
                               <a class="dropdown-item dropdown-toggle" href="{{route('by.subcategory' , [$menu->slug ,$submenu->slug] )}}">{{$submenu->name}}</a>
       
                               <ul class="dropdown-menu">
                                 @foreach ($submenu->childcategories as $childmenu)
                                   <li>
                                       <a class="dropdown-item" href="{{route('by.childcategory' , [$menu->slug ,$submenu->slug,$childmenu->slug] )}}">{{$childmenu->name}}
                                       </a>
                                   </li>
                                   @endforeach
                               </ul>
       
                           </li>
                           @endforeach
      
      
                      </ul>
      
                  </li>

                  @endforeach
     
             </ul>
         </div>
     </nav>
     
           @yield('content')
   
   
      <footer class="footer-part">
         <div class="container">
            <div class="row newsletter">
               <div class="col-lg-6">
                  <div class="news-content">
                     <h2>Subscribe for Latest Offers</h2>
                     <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Laboriosam, aliquid reiciendis! Exercitationem soluta provident non.</p>
                  </div>
               </div>
               <div class="col-lg-6">
                  <form class="news-form"><input type="text" placeholder="Enter Your Email Address"><button class="btn btn-inline"><i class="fas fa-envelope"></i><span>Subscribe</span></button></form>
               </div>
            </div>
            <div class="row">
               <div class="col-sm-6 col-md-6 col-lg-3">
                  <div class="footer-content">
                     <h3>Contact Us</h3>
                     <ul class="footer-address">
                        <li>
                           <i class="fas fa-map-marker-alt"></i>
                           <p>1420 West Jalkuri Fatullah, <span>Narayanganj, BD</span></p>
                        </li>
                        <li>
                           <i class="fas fa-envelope"></i>
                           <p>support@classicads.com <span>info@classicads.com</span></p>
                        </li>
                        <li>
                           <i class="fas fa-phone-alt"></i>
                           <p>+8801838288389 <span>+8801941101915</span></p>
                        </li>
                     </ul>
                  </div>
               </div>
               <div class="col-sm-6 col-md-6 col-lg-3">
                  <div class="footer-content">
                     <h3>Quick Links</h3>
                     <ul class="footer-widget">
                        <li><a href="#">Store Location</a></li>
                        <li><a href="#">Orders Tracking</a></li>
                        <li><a href="#">My Account</a></li>
                        <li><a href="#">Size Guide</a></li>
                        <li><a href="#">Faq</a></li>
                     </ul>
                  </div>
               </div>
               <div class="col-sm-6 col-md-6 col-lg-3">
                  <div class="footer-content">
                     <h3>Information</h3>
                     <ul class="footer-widget">
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Delivery System</a></li>
                        <li><a href="#">Secure Payment</a></li>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">Sitemap</a></li>
                     </ul>
                  </div>
               </div>
               <div class="col-sm-6 col-md-6 col-lg-3">
                  <div class="footer-info">
                     <a href="#"><img src="{{asset('assets/images/logo.png')}}" alt="logo"></a>
                     <ul class="footer-count">
                        <li>
                           <h5>929,238</h5>
                           <p>Registered Users</p>
                        </li>
                        <li>
                           <h5>242,789</h5>
                           <p>Community Ads</p>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-lg-12">
                  <div class="footer-card-content">
                     <div class="footer-payment">
                        <a href="#">
                           <img src="{{asset('assets/images/pay-card/01.jpg')}}" alt="01">
                        </a>
                        <a href="#">
                           <img src="{{asset('assets/images/pay-card/02.jpg')}}" alt="02"></a>
                        <a href="#">
                           <img src="{{asset('assets/images/pay-card/03.jpg')}}" alt="03">
                        </a>
                        <a href="#">
                           <img src="{{asset('assets/images/pay-card/04.jpg')}}" alt="04">
                        </a>
                     </div>
                     <div class="footer-option">
                        <button type="button">
                           <i class="fas fa-globe"></i>
                           English
                        </button>
                        <button type="button">
                           <i class="fas fa-dollar-sign"></i>
                           USD
                        </button>
                        </div>
                     <div class="footer-app">
                        <a href="#">
                           <img src="{{asset('assets/images/play-store.png')}}" alt="play-store">
                        </a>
                        <a href="#">
                           <img src="{{asset('assets/images/app-store.png')}}" alt="app-store">
                        </a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="footer-end">
            <div class="container">
               <div class="footer-end-content">
                  <p>All Copyrights Reserved &copy; 2021 </p>
                  <ul class="social-transparent footer-social">
                     <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                     <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                     <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                     <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                     <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                     <li><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                     <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                     <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                  </ul>
               </div>
            </div>
         </div>
      </footer>
   </div>


   <script src="{{ asset('assets/js/vendor/jquery-1.12.4.min.js')}}"></script>
   <script src="{{ asset('assets/js/vendor/popper.min.js')}}"></script>
   <script src="{{ asset('assets/js/vendor/bootstrap.min.js ')}}"></script>
   <script src="{{ asset('assets/js/vendor/slick.min.js')}}"></script>
   <script src="{{ asset('assets/js/custom/slick.js')}}"></script>
   <script src="{{ asset('assets/js/custom/custom.js ')}}"></script>
   <script src="{{ asset('assets/js/vendor/jquery-ui.min.js')}}"></script>
 
   <script src="{{ asset('assets/js/custom/main.js ')}}"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
   <script>
      @if(Session::has('message'))
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
                    toastr.success("{{ session('message') }}");
            @endif

            @if(Session::has('error'))
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
                    toastr.error("{{ session('error') }}");
            @endif

            @if(Session::has('info'))
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
                    toastr.info("{{ session('info') }}");
            @endif

            @if(Session::has('warning'))
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
                    toastr.warning("{{ session('warning') }}");
            @endif
   </script>
    <!-- Scripts -->
    @yield('js')
    <script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
