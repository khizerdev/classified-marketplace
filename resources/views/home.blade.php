@extends('layouts.app')

@section('css')

<style>

.nav-link.dropdown-toggle {
    color: white !important;
}

.dropdown:hover>.dropdown-menu {
    display: block;
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

</style>


@endsection


@section('content')

<nav class="navbar navbar-expand-md navbar-light bg-primary shadow-sm navbar-hover">


    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHover"
        aria-controls="navbarDD" aria-expanded="false" aria-label="Navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarHover">
        <ul class="navbar-nav">



            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href=""
                    data-toggle="dropdown_remove_dropdown_class_for_clickable_link" aria-haspopup="true"
                    aria-expanded="false">
                    Category(Electronics)
                </a>

                <ul class="dropdown-menu">



                    <li>
                        <a class="dropdown-item dropdown-toggle" href="">Subcategory(Computer)</a>

                        <ul class="dropdown-menu">

                            <li>
                                <a class="dropdown-item" href="">childcategory(Dell laptop)
                                </a>
                            </li>
                        </ul>

                    </li>


                </ul>

            </li>

        </ul>
    </div>
</nav>

<section class="banner-part">
    <div class="container">
       <div class="banner-content">
          <h1>You can #Buy, #Rent, #Booking anything from here.</h1>
          <p>Buy and sell everything from used cars to mobile phones and computers, or search for property, jobs and more in the world.</p>
          <a href="leftbar-list.html" class="btn btn-outline"><i class="fas fa-eye"></i><span>Show all ads</span></a>
       </div>
    </div>
</section>

{{-- suggest --}}
<section class="suggest-part">
    <div class="container">
       <div class="suggest-slider slider-arrow">
          <div class="suggest-card">
             <div class="suggest-img"><img src="{{asset('assets/images/suggest/automobile.png')}}" alt="car"></div>
             <div class="suggest-meta">
                <h6><a href="#">automobile</a></h6>
                <p>(4,521) ads</p>
             </div>
          </div>
          <div class="suggest-card">
             <div class="suggest-img"><img src="{{asset('assets/images/suggest/furniture.png')}}" alt="furniture"></div>
             <div class="suggest-meta">
                <h6><a href="#">furniture</a></h6>
                <p>(4,521) ads</p>
             </div>
          </div>
          <div class="suggest-card">
             <div class="suggest-img"><img src="{{asset('assets/images/suggest/properties.png')}}" alt="house"></div>
             <div class="suggest-meta">
                <h6><a href="#">properties</a></h6>
                <p>(4,521) ads</p>
             </div>
          </div>
          <div class="suggest-card">
             <div class="suggest-img"><img src="{{asset('assets/images/suggest/fashion.png')}}" alt="food"></div>
             <div class="suggest-meta">
                <h6><a href="#">fashion</a></h6>
                <p>(4,521) ads</p>
             </div>
          </div>
          <div class="suggest-card">
             <div class="suggest-img"><img src="{{asset('assets/images/suggest/electronics.png')}}" alt="cycle"></div>
             <div class="suggest-meta">
                <h6><a href="#">electronics</a></h6>
                <p>(4,521) ads</p>
             </div>
          </div>
          <div class="suggest-card">
             <div class="suggest-img"><img src="{{asset('assets/images/suggest/hospitality.png')}}" alt="clothes"></div>
             <div class="suggest-meta">
                <h6><a href="#">hospitality</a></h6>
                <p>(4,521) ads</p>
             </div>
          </div>
          <div class="suggest-card">
             <div class="suggest-img"><img src="{{asset('assets/images/suggest/gadgets.png')}}" alt="computer"></div>
             <div class="suggest-meta">
                <h6><a href="#">gadgets</a></h6>
                <p>(4,521) ads</p>
             </div>
          </div>
          <div class="suggest-card">
             <div class="suggest-img"><img src="{{asset('assets/images/suggest/education.png')}}" alt="phone"></div>
             <div class="suggest-meta">
                <h6><a href="#">education</a></h6>
                <p>(4,521) ads</p>
             </div>
          </div>
          <div class="suggest-card">
             <div class="suggest-img"><img src="{{asset('assets/images/suggest/software.png')}}" alt="scooter"></div>
             <div class="suggest-meta">
                <h6><a href="#">software</a></h6>
                <p>(4,521) ads</p>
             </div>
          </div>
          <div class="suggest-card">
             <div class="suggest-img"><img src="{{asset('assets/images/suggest/food.png')}}" alt="television"></div>
             <div class="suggest-meta">
                <h6><a href="#">food</a></h6>
                <p>(4,521) ads</p>
             </div>
          </div>
          <div class="suggest-card">
             <div class="suggest-img"><img src="{{asset('assets/images/suggest/services.png')}}" alt="truck"></div>
             <div class="suggest-meta">
                <h6><a href="#">services</a></h6>
                <p>(4,521) ads</p>
             </div>
          </div>
          <div class="suggest-card">
             <div class="suggest-img"><img src="{{asset('assets/images/suggest/animals.png')}}" alt="pet"></div>
             <div class="suggest-meta">
                <h6><a href="#">animals</a></h6>
                <p>(4,521) ads</p>
             </div>
          </div>
       </div>
    </div>
</section>


{{-- featured --}}
<section class="section feature-part">
    <div class="container">
       <div class="row">
          <div class="col-md-5 col-lg-5">
             <div class="section-side-heading">
                <h2>Find your needs in our best <span>Featured Ads</span></h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit aspernatur illum vel sunt libero voluptatum repudiandae veniam maxime tenetur fugiat eaque alias nobis doloremque culpa nam.</p>
                <a href="leftbar-list.html" class="btn btn-inline"><i class="fas fa-eye"></i><span>view all featured</span></a>
             </div>
          </div>
          <div class="col-md-7 col-lg-7">
             <div class="feature-item-slider slider-arrow">
                <div class="feature-card">
                   <div class="feature-img"><a href="#"><img src="{{asset('assets/images/product/10.jpg')}}" alt="feature"></a></div>
                   <div class="feature-badge">
                      <p>Featured</p>
                   </div>
                   <div class="feature-bookmark"><button type="button"><i class="fas fa-heart"></i></button></div>
                   <div class="feature-content">
                      <ol class="breadcrumb">
                         <li><span class="feature-cate rent">Rent</span></li>
                         <li class="breadcrumb-item"><a href="#">automobile</a></li>
                         <li class="breadcrumb-item active" aria-current="page">Private Car</li>
                      </ol>
                      <div class="feature-title">
                         <h3><a href="#">Unde eveniet ducimus nostrum maiores soluta temporibus ipsum dolor sit amet.</a></h3>
                      </div>
                      <ul class="feature-meta">
                         <li><span>$1200 <small>/Monthly</small></span></li>
                         <li><i class="fas fa-clock"></i><span>56 minute ago!</span></li>
                      </ul>
                   </div>
                </div>
                <div class="feature-card">
                   <div class="feature-img"><a href="#"><img src="{{asset('assets/images/product/01.jpg')}}" alt="feature"></a></div>
                   <div class="feature-badge">
                      <p>Featured</p>
                   </div>
                   <div class="feature-bookmark"><button type="button"><i class="fas fa-heart"></i></button></div>
                   <div class="feature-content">
                      <ol class="breadcrumb">
                         <li><span class="feature-cate booking">Booking</span></li>
                         <li class="breadcrumb-item"><a href="#">Property</a></li>
                         <li class="breadcrumb-item active" aria-current="page">House</li>
                      </ol>
                      <div class="feature-title">
                         <h3><a href="#">Unde eveniet ducimus nostrum maiores soluta temporibus ipsum dolor sit amet.</a></h3>
                      </div>
                      <ul class="feature-meta">
                         <li><span>$800 <small>/Per Day</small></span></li>
                         <li><i class="fas fa-clock"></i><span>56 minute ago!</span></li>
                      </ul>
                   </div>
                </div>
                <div class="feature-card">
                   <div class="feature-img"><a href="#"><img src="{{asset('assets/images/product/08.jpg')}}" alt="feature"></a></div>
                   <div class="feature-badge">
                      <p>Featured</p>
                   </div>
                   <div class="feature-bookmark"><button type="button"><i class="fas fa-heart"></i></button></div>
                   <div class="feature-content">
                      <ol class="breadcrumb">
                         <li><span class="feature-cate sale">sale</span></li>
                         <li class="breadcrumb-item"><a href="#">Gadget</a></li>
                         <li class="breadcrumb-item active" aria-current="page">Iphone</li>
                      </ol>
                      <div class="feature-title">
                         <h3><a href="#">Unde eveniet ducimus nostrum maiores soluta temporibus ipsum dolor sit amet.</a></h3>
                      </div>
                      <ul class="feature-meta">
                         <li><span>$1150 <small>/Negotiable</small></span></li>
                         <li><i class="fas fa-clock"></i><span>56 minute ago!</span></li>
                      </ul>
                   </div>
                </div>
                <div class="feature-card">
                   <div class="feature-img"><a href="#"><img src="{{asset('assets/images/product/06.jpg')}}" alt="feature"></a></div>
                   <div class="feature-badge">
                      <p>Featured</p>
                   </div>
                   <div class="feature-bookmark"><button type="button"><i class="fas fa-heart"></i></button></div>
                   <div class="feature-content">
                      <ol class="breadcrumb">
                         <li><span class="feature-cate sale">Sale</span></li>
                         <li class="breadcrumb-item"><a href="#">automobile</a></li>
                         <li class="breadcrumb-item active" aria-current="page">cycle</li>
                      </ol>
                      <div class="feature-title">
                         <h3><a href="#">Unde eveniet ducimus nostrum maiores soluta temporibus ipsum dolor sit amet.</a></h3>
                      </div>
                      <ul class="feature-meta">
                         <li><span>$455 <small>/Fixed</small></span></li>
                         <li><i class="fas fa-clock"></i><span>56 minute ago!</span></li>
                      </ul>
                   </div>
                </div>
             </div>
             <div class="feature-thumb-slider">
                <div><img src="{{asset('assets/images/product/10.jpg')}}" alt="feature"></div>
                <div><img src="{{asset('assets/images/product/01.jpg')}}" alt="feature"></div>
                <div><img src="{{asset('assets/images/product/08.jpg')}}" alt="feature"></div>
                <div><img src="{{asset('assets/images/product/06.jpg')}}" alt="feature"></div>
             </div>
          </div>
       </div>
    </div>
</section>

{{-- recommended-products --}}
<section class="section recomend-part">
    <div class="container">
       <div class="row">
          <div class="col-lg-12">
             <div class="section-center-heading">
                <h2>Our Recommend <span>Ads</span></h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit aspernatur illum vel sunt libero voluptatum repudiandae veniam maxime tenetur.</p>
             </div>
          </div>
       </div>
       <div class="row">
          <div class="col-lg-12">
             <div class="recomend-slider slider-arrow">
                <div class="product-card">
                   <div class="product-head">
                      <div class="product-img" style="background:url(images/product/01.jpg) no-repeat center; background-size:cover;">
                         <i class="cross-badge fas fa-bolt"></i><span class="flat-badge booking">booking</span>
                         <ul class="product-meta">
                            <li>
                               <i class="fas fa-eye"></i>
                               <p>264</p>
                            </li>
                            <li>
                               <i class="fas fa-mouse"></i>
                               <p>134</p>
                            </li>
                            <li>
                               <i class="fas fa-star"></i>
                               <p>4.5/7</p>
                            </li>
                         </ul>
                      </div>
                   </div>
                   <div class="product-info">
                      <div class="product-tag">
                         <i class="fas fa-tags"></i>
                         <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Luxury</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Duplex House</li>
                         </ol>
                      </div>
                      <div class="product-title">
                         <h5><a href="rightbar-details.html">Lorem ipsum dolor sit amet consect adipisicing elit</a></h5>
                         <ul class="product-location">
                            <li>
                               <i class="fas fa-map-marker-alt"></i>
                               <p>Uttara, Dhaka</p>
                            </li>
                            <li>
                               <i class="fas fa-clock"></i>
                               <p>30 min ago!</p>
                            </li>
                         </ul>
                      </div>
                      <div class="product-details">
                         <div class="product-price">
                            <h5>$1500</h5>
                            <span>/Per Day</span>
                         </div>
                         <ul class="product-widget">
                            <li><a href="compare.html" class="tooltip"><i class="fas fa-compress"></i><span class="tooltext top">compare</span></a></li>
                            <li><button class="tooltip"><i class="far fa-heart"></i><span class="tooltext top">bookmark</span></button></li>
                         </ul>
                      </div>
                   </div>
                </div>
                <div class="product-card">
                   <div class="product-head">
                      <div class="product-img" style="background:url(images/product/03.jpg) no-repeat center; background-size:cover;">
                         <i class="cross-badge fas fa-bolt"></i><span class="flat-badge sale">sale</span>
                         <ul class="product-meta">
                            <li>
                               <i class="fas fa-eye"></i>
                               <p>264</p>
                            </li>
                            <li>
                               <i class="fas fa-mouse"></i>
                               <p>134</p>
                            </li>
                            <li>
                               <i class="fas fa-star"></i>
                               <p>4.5/7</p>
                            </li>
                         </ul>
                      </div>
                   </div>
                   <div class="product-info">
                      <div class="product-tag">
                         <i class="fas fa-tags"></i>
                         <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Stationary</a></li>
                            <li class="breadcrumb-item active" aria-current="page">books</li>
                         </ol>
                      </div>
                      <div class="product-title">
                         <h5><a href="rightbar-details.html">Lorem ipsum dolor sit amet consect adipisicing elit</a></h5>
                         <ul class="product-location">
                            <li>
                               <i class="fas fa-map-marker-alt"></i>
                               <p>Uttara, Dhaka</p>
                            </li>
                            <li>
                               <i class="fas fa-clock"></i>
                               <p>30 min ago!</p>
                            </li>
                         </ul>
                      </div>
                      <div class="product-details">
                         <div class="product-price">
                            <h5>$470</h5>
                            <span>/fixed</span>
                         </div>
                         <ul class="product-widget">
                            <li><a href="compare.html" class="tooltip"><i class="fas fa-compress"></i><span class="tooltext top">compare</span></a></li>
                            <li><button class="tooltip"><i class="far fa-heart"></i><span class="tooltext top">bookmark</span></button></li>
                         </ul>
                      </div>
                   </div>
                </div>
                <div class="product-card">
                   <div class="product-head">
                      <div class="product-img" style="background:url(images/product/10.jpg) no-repeat center; background-size:cover;">
                         <i class="cross-badge fas fa-bolt"></i><span class="flat-badge rent">rent</span>
                         <ul class="product-meta">
                            <li>
                               <i class="fas fa-eye"></i>
                               <p>264</p>
                            </li>
                            <li>
                               <i class="fas fa-mouse"></i>
                               <p>134</p>
                            </li>
                            <li>
                               <i class="fas fa-star"></i>
                               <p>4.5/7</p>
                            </li>
                         </ul>
                      </div>
                   </div>
                   <div class="product-info">
                      <div class="product-tag">
                         <i class="fas fa-tags"></i>
                         <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">automobile</a></li>
                            <li class="breadcrumb-item active" aria-current="page">private car</li>
                         </ol>
                      </div>
                      <div class="product-title">
                         <h5><a href="rightbar-details.html">Lorem ipsum dolor sit amet consect adipisicing elit</a></h5>
                         <ul class="product-location">
                            <li>
                               <i class="fas fa-map-marker-alt"></i>
                               <p>Uttara, Dhaka</p>
                            </li>
                            <li>
                               <i class="fas fa-clock"></i>
                               <p>30 min ago!</p>
                            </li>
                         </ul>
                      </div>
                      <div class="product-details">
                         <div class="product-price">
                            <h5>$3300</h5>
                            <span>/per month</span>
                         </div>
                         <ul class="product-widget">
                            <li><a href="compare.html" class="tooltip"><i class="fas fa-compress"></i><span class="tooltext top">compare</span></a></li>
                            <li><button class="tooltip"><i class="far fa-heart"></i><span class="tooltext top">bookmark</span></button></li>
                         </ul>
                      </div>
                   </div>
                </div>
                <div class="product-card">
                   <div class="product-head">
                      <div class="product-img" style="background:url(images/product/09.jpg) no-repeat center; background-size:cover;">
                         <i class="cross-badge fas fa-bolt"></i><span class="flat-badge sale">sale</span>
                         <ul class="product-meta">
                            <li>
                               <i class="fas fa-eye"></i>
                               <p>264</p>
                            </li>
                            <li>
                               <i class="fas fa-mouse"></i>
                               <p>134</p>
                            </li>
                            <li>
                               <i class="fas fa-star"></i>
                               <p>4.5/7</p>
                            </li>
                         </ul>
                      </div>
                   </div>
                   <div class="product-info">
                      <div class="product-tag">
                         <i class="fas fa-tags"></i>
                         <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">animals</a></li>
                            <li class="breadcrumb-item active" aria-current="page">cat</li>
                         </ol>
                      </div>
                      <div class="product-title">
                         <h5><a href="rightbar-details.html">Lorem ipsum dolor sit amet consect adipisicing elit</a></h5>
                         <ul class="product-location">
                            <li>
                               <i class="fas fa-map-marker-alt"></i>
                               <p>Uttara, Dhaka</p>
                            </li>
                            <li>
                               <i class="fas fa-clock"></i>
                               <p>30 min ago!</p>
                            </li>
                         </ul>
                      </div>
                      <div class="product-details">
                         <div class="product-price">
                            <h5>$900</h5>
                            <span>/Negotiable</span>
                         </div>
                         <ul class="product-widget">
                            <li><a href="compare.html" class="tooltip"><i class="fas fa-compress"></i><span class="tooltext top">compare</span></a></li>
                            <li><button class="tooltip"><i class="far fa-heart"></i><span class="tooltext top">bookmark</span></button></li>
                         </ul>
                      </div>
                   </div>
                </div>
                <div class="product-card">
                   <div class="product-head">
                      <div class="product-img" style="background:url(images/product/02.jpg) no-repeat center; background-size:cover;">
                         <i class="cross-badge fas fa-bolt"></i><span class="flat-badge sale">sale</span>
                         <ul class="product-meta">
                            <li>
                               <i class="fas fa-eye"></i>
                               <p>264</p>
                            </li>
                            <li>
                               <i class="fas fa-mouse"></i>
                               <p>134</p>
                            </li>
                            <li>
                               <i class="fas fa-star"></i>
                               <p>4.5/7</p>
                            </li>
                         </ul>
                      </div>
                   </div>
                   <div class="product-info">
                      <div class="product-tag">
                         <i class="fas fa-tags"></i>
                         <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">fashion</a></li>
                            <li class="breadcrumb-item active" aria-current="page">shoes</li>
                         </ol>
                      </div>
                      <div class="product-title">
                         <h5><a href="rightbar-details.html">Lorem ipsum dolor sit amet consect adipisicing elit</a></h5>
                         <ul class="product-location">
                            <li>
                               <i class="fas fa-map-marker-alt"></i>
                               <p>Uttara, Dhaka</p>
                            </li>
                            <li>
                               <i class="fas fa-clock"></i>
                               <p>30 min ago!</p>
                            </li>
                         </ul>
                      </div>
                      <div class="product-details">
                         <div class="product-price">
                            <h5>$460</h5>
                            <span>/fixed</span>
                         </div>
                         <ul class="product-widget">
                            <li><a href="compare.html" class="tooltip"><i class="fas fa-compress"></i><span class="tooltext top">compare</span></a></li>
                            <li><button class="tooltip"><i class="far fa-heart"></i><span class="tooltext top">bookmark</span></button></li>
                         </ul>
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
       <div class="row">
          <div class="col-lg-12">
             <div class="center-50"><a href="leftbar-list.html" class="btn btn-inline"><i class="fas fa-eye"></i><span>view all recommend</span></a></div>
          </div>
       </div>
    </div>
</section>
@endsection
