<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="name" content="Classicads">
      <meta name="type" content="Classified Advertising">
      <meta name="title" content="Classicads - Classified Ads HTML Template">
      <meta name="keywords" content="classicads, classified, ads, classified ads, listing, business, directory, jobs, marketing, portal, advertising, local, posting, ad listing, ad posting,">
      <title>Classicads - Home</title>
      <link rel="icon" href="images/favicon.png {{ asset('assets/fonts/flaticon/flaticon.css')}}">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
      <link rel="stylesheet" href="{{ asset('assets/css/vendor/slick.min.css')}}">
      <link rel="stylesheet" href="{{ asset('assets/css/vendor/bootstrap.min.css')}}">
      <link rel="stylesheet" href="{{ asset('assets/css/custom/main.css')}}">
      <link rel="stylesheet" href="{{ asset('assets/css/custom/index.css')}}">
      @yield('css')
   </head>
   <body>
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
                        <a href="{{route('home')}}" class="header-user"><i class="fas fa-user"></i><span>Login</span></a>
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
                  <a href="ad-post.html" class="btn btn-inline"><i class="fas fa-plus-circle"></i><span>post your ad</span></a>
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
                  <a href="#" class="sidebar-avatar"><img src="images/avatar/01.jpg" alt="avatar">
                  </a>
                  <h4>
                     <a href="#" class="sidebar-name">Jackon Honson</a>
                  </h4>
                  @endif
                  <a href="ad-post.html" class="btn btn-inline sidebar-btn">
                     <i class="fas fa-plus-circle"></i>
                     <span>post your ad</span>
                  </a>
               </div>
               <div class="sidebar-menu">
                  <ul class="nav nav-tabs">
                     <li><a href="#main-menu" class="nav-link active" data-toggle="tab">Main Menu</a></li>
                     @if(Auth::check())
                     <li><a href="#author-menu" class="nav-link" data-toggle="tab">Author Menu</a>
                     </li>
                     @endif
                  </ul>
                  <div class="tab-pane active" id="main-menu">
                     <ul class="navbar-list">
                        <li class="navbar-item"><a class="navbar-link" href="index.html">Home</a></li>
                        <li class="navbar-item navbar-dropdown">
                           <a class="navbar-link" href="#"><span>Categories</span><i class="fas fa-plus"></i></a>
                           <ul class="dropdown-list">
                              <li><a class="dropdown-link" href="category-list.html">category list</a></li>
                              <li><a class="dropdown-link" href="category-details.html">category details</a></li>
                           </ul>
                        </li>
                        <li class="navbar-item navbar-dropdown">
                           <a class="navbar-link" href="#"><span>Advertise List</span><i class="fas fa-plus"></i></a>
                           <ul class="dropdown-list">
                              <li><a class="dropdown-link" href="grid-list.html">grid list</a></li>
                              <li><a class="dropdown-link" href="leftbar-list.html">leftbar list</a></li>
                              <li><a class="dropdown-link" href="rightbar-list.html">rightbar list</a></li>
                           </ul>
                        </li>
                        <li class="navbar-item navbar-dropdown">
                           <a class="navbar-link" href="#"><span>Advertise details</span><i class="fas fa-plus"></i></a>
                           <ul class="dropdown-list">
                              <li><a class="dropdown-link" href="grid-details.html">grid details</a></li>
                              <li><a class="dropdown-link" href="leftbar-details.html">leftbar details</a></li>
                              <li><a class="dropdown-link" href="rightbar-details.html">rightbar details</a></li>
                           </ul>
                        </li>
                        <li class="navbar-item navbar-dropdown">
                           <a class="navbar-link" href="#"><span>Pages</span><i class="fas fa-plus"></i></a>
                           <ul class="dropdown-list">
                              <li><a class="dropdown-link" href="about.html">About Us</a></li>
                              <li><a class="dropdown-link" href="compare.html">Ad Compare</a></li>
                              <li><a class="dropdown-link" href="cities.html">Ad by Cities</a></li>
                              <li><a class="dropdown-link" href="price.html">Pricing Plan</a></li>
                              <li><a class="dropdown-link" href="user-form.html">User Form</a></li>
                              <li><a class="dropdown-link" href="404.html">404</a></li>
                           </ul>
                        </li>
                        <li class="navbar-item navbar-dropdown">
                           <a class="navbar-link" href="#"><span>blogs</span><i class="fas fa-plus"></i></a>
                           <ul class="dropdown-list">
                              <li><a class="dropdown-link" href="blog-list.html">Blog list</a></li>
                              <li><a class="dropdown-link" href="blog-details.html">blog details</a></li>
                           </ul>
                        </li>
                        <li class="navbar-item"><a class="navbar-link" href="contact.html">Contact</a></li>
                     </ul>
                  </div>
                  @if(Auth::check())
                  <div class="tab-pane" id="author-menu">
                     <ul class="navbar-list">
                        <li class="navbar-item"><a class="navbar-link" href="dashboard.html">Dashboard</a></li>
                        <li class="navbar-item"><a class="navbar-link" href="profile.html">Profile</a></li>
                        <li class="navbar-item"><a class="navbar-link" href="ad-post.html">Ad Post</a></li>
                        <li class="navbar-item"><a class="navbar-link" href="my-ads.html">My Ads</a></li>
                        <li class="navbar-item"><a class="navbar-link" href="setting.html">Settings</a></li>
                        <li class="navbar-item navbar-dropdown"><a class="navbar-link" href="bookmark.html"><span>bookmark</span><span>0</span></a></li>
                        <li class="navbar-item navbar-dropdown"><a class="navbar-link" href="#"><span>Message</span><span>0</span></a></li>
                        <li class="navbar-item navbar-dropdown"><a class="navbar-link" href="#"><span>Notification</span><span>0</span></a></li>
                        <li class="navbar-item"><a class="navbar-link" href="user-form.html">Logout</a></li>
                     </ul>
                  </div>
                  @endif
               </div>
               <div class="sidebar-footer">
                  <p>All Rights Reserved By <a href="#">Classicads</a></p>
               </div>
            </div>
         </div>
      </div>
      <div class="btmbar-part">
         <div class="container">
            <ul class="btmbar-widget">
               <li><a href="user-form.html"><i class="fas fa-user"></i></a></li>
               <li><a href="#"><i class="fas fa-star"></i><sup>0</sup></a></li>
               <li><a class="plus-btn" href="ad-post.html"><i class="fas fa-plus"></i><span>Ad Your Post</span></a></li>
               <li><a href="#"><i class="fas fa-bell"></i><sup>0</sup></a></li>
               <li><a href="#"><i class="fas fa-envelope"></i><sup>0</sup></a></li>
            </ul>
         </div>
      </div>
     
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
                     <a href="#"><img src="images/logo.png" alt="logo"></a>
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
                     <div class="footer-payment"><a href="#"><img src="images/pay-card/01.jpg" alt="01"></a><a href="#"><img src="images/pay-card/02.jpg" alt="02"></a><a href="#"><img src="images/pay-card/03.jpg" alt="03"></a><a href="#"><img src="images/pay-card/04.jpg" alt="04"></a></div>
                     <div class="footer-option"><button type="button"><i class="fas fa-globe"></i>English</button><button type="button"><i class="fas fa-dollar-sign"></i>USD</button></div>
                     <div class="footer-app"><a href="#"><img src="images/play-store.png" alt="play-store"></a><a href="#"><img src="images/app-store.png" alt="app-store"></a></div>
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


      <script src="{{ asset('assets/js/vendor/jquery-1.12.4.min.js')}}"></script>
      <script src="{{ asset('assets/js/vendor/popper.min.js')}}"></script>
      <script src="{{ asset('assets/js/vendor/bootstrap.min.js ')}}"></script>
      <script src="{{ asset('assets/js/vendor/slick.min.js')}}"></script>
      <script src="{{ asset('assets/js/custom/slick.js')}}"></script>
      <script src="{{ asset('assets/js/custom/main.js ')}}"></script>
    @yield('js')
   </body>
   
</html>