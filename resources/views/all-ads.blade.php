@extends('layouts.app')

@section('css')

<link rel="stylesheet" href="{{ asset('assets/css/custom/leftbar-list.css')}}">

@endsection


@section('content')

<section class="single-banner">
    <div class="container">
       <div class="row">
          <div class="col-lg-12">
             <div class="single-content">
                <h2>all ads</h2>
                <ol class="breadcrumb">
                   <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                   <li class="breadcrumb-item active" aria-current="page">Listing</li>
                </ol>
             </div>
          </div>
       </div>
    </div>
</section>

<section class="ad-list-part">
    <div class="container">
       <div class="row">
          <div class="col-lg-12">
             <div class="product-filter">
                <div class="product-page-number">
                   <p>Showing 1–9 of {{count($ads)}} results</p>
                </div>
                <select class="product-short-select custom-select">
                   <option selected>Short by Best Sell</option>
                   <option value="1">Short by New Item</option>
                   <option value="2">Short by Popularity</option>
                   <option value="3">Short by Average review</option>
                </select>
                <ul class="product-card-type">
                   <li class="grid-verti active"><i class="fas fa-grip-vertical"></i></li>
                   <li class="grid-hori"><i class="fas fa-grip-horizontal"></i></li>
                </ul>
             </div>
          </div>
       </div>
       <div class="row content-reverse">
          <div class="col-lg-3">
             <div class="row">
                <div class="col-md-6 col-lg-12">
                   <div class="product-sidebar">
                      <div class="product-sidebar-title">
                         <h6>Filter by Price</h6>
                      </div>
                      <div class="product-sidebar-content">
                         <div class="price-range">
                            <input type="text" id="amount" readonly>
                            <div id="slider-range"></div>
                         </div>
                         <button type="button" class="product-filter-btn"><i class="fas fa-search"></i><span>search</span></button>
                      </div>
                   </div>
                </div>
                <div class="col-md-6 col-lg-12">
                   <div class="product-sidebar">
                      <div class="product-sidebar-title">
                         <h6>Filter by type</h6>
                      </div>
                      <div class="product-sidebar-content">
                         <ul class="product-sidebar-list">
                            <li><input type="checkbox" id="typ1"><label for="typ1">sales</label></li>
                            <li><input type="checkbox" id="typ2"><label for="typ2">rental</label></li>
                            <li><input type="checkbox" id="typ3"><label for="typ3">booking</label></li>
                         </ul>
                         <button class="product-filter-btn"><i class="fas fa-broom"></i><span>Clear Filter</span></button>
                      </div>
                   </div>
                </div>
                <div class="col-md-6 col-lg-12">
                   <div class="product-sidebar">
                      <div class="product-sidebar-title">
                         <h6>Filter by rating</h6>
                      </div>
                      <div class="product-sidebar-content">
                         <ul class="product-sidebar-list rating">
                            <li><input type="checkbox" id="rat1"><label for="rat1"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></label></li>
                            <li><input type="checkbox" id="rat2"><label for="rat2"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i></label></li>
                            <li><input type="checkbox" id="rat3"><label for="rat3"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i></label></li>
                            <li><input type="checkbox" id="rat4"><label for="rat4"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i></label></li>
                            <li><input type="checkbox" id="rat5"><label for="rat5"><i class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i></label></li>
                         </ul>
                         <button class="product-filter-btn"><i class="fas fa-broom"></i><span>Clear Filter</span></button>
                      </div>
                   </div>
                </div>
                <div class="col-md-6 col-lg-12">
                   <div class="product-sidebar">
                      <div class="product-sidebar-title">
                         <h6>Filter by cities</h6>
                      </div>
                      <div class="product-sidebar-content">
                         <div class="product-sidebar-search"><input type="text" placeholder="Search"></div>
                         <ul class="product-sidebar-list widget">
                            <li><input type="checkbox" id="cit1"><label for="cit1"><span>Los Angeles</span><span>(15)</span></label></li>
                            <li><input type="checkbox" id="cit2"><label for="cit2"><span>San Francisco</span><span>(28)</span></label></li>
                            <li><input type="checkbox" id="cit3"><label for="cit3"><span>California</span><span>(35)</span></label></li>
                            <li><input type="checkbox" id="cit4"><label for="cit4"><span>New York</span><span>(47)</span></label></li>
                            <li><input type="checkbox" id="cit5"><label for="cit5"><span>Manhattan</span><span>(59)</span></label></li>
                            <li><input type="checkbox" id="cit6"><label for="cit6"><span>Baltimore</span><span>(64)</span></label></li>
                            <li><input type="checkbox" id="cit7"><label for="cit7"><span>Avocados</span><span>(19)</span></label></li>
                         </ul>
                         <button class="product-filter-btn"><i class="fas fa-broom"></i><span>Clear Filter</span></button>
                      </div>
                   </div>
                </div>
                <div class="col-md-6 col-lg-12">
                   <div class="product-sidebar">
                      <div class="product-sidebar-title">
                         <h6>Filter by tags</h6>
                      </div>
                      <div class="product-sidebar-content">
                         <div class="product-sidebar-search"><input type="text" placeholder="Search"></div>
                         <ul class="product-sidebar-list widget">
                            <li><input type="checkbox" id="tag1"><label for="tag1"><span>private car</span><span>(13)</span></label></li>
                            <li><input type="checkbox" id="tag2"><label for="tag2"><span>motorbike</span><span>(28)</span></label></li>
                            <li><input type="checkbox" id="tag3"><label for="tag3"><span>ladies bag</span><span>(35)</span></label></li>
                            <li><input type="checkbox" id="tag4"><label for="tag4"><span>jeans pant</span><span>(47)</span></label></li>
                            <li><input type="checkbox" id="tag5"><label for="tag5"><span>shoes</span><span>(59)</span></label></li>
                            <li><input type="checkbox" id="tag6"><label for="tag6"><span>wallet</span><span>(64)</span></label></li>
                            <li><input type="checkbox" id="tag7"><label for="tag7"><span>microphone</span><span>(19)</span></label></li>
                         </ul>
                         <button class="product-filter-btn"><i class="fas fa-broom"></i><span>Clear Filter</span></button>
                      </div>
                   </div>
                </div>
                <div class="col-md-6 col-lg-12">
                   <div class="product-sidebar">
                      <div class="product-sidebar-title">
                         <h6>Filter by Categories</h6>
                      </div>
                      <div class="product-sidebar-content">
                         <div class="product-sidebar-search"><input type="text" placeholder="Search"></div>
                         <ul class="nasted-dropdown">
                            <li>
                               <div class="nasted-menu">
                                  <p><span class="fas fa-tags"></span>electronics</p>
                                  <i class="fas fa-chevron-down"></i>
                               </div>
                               <ul class="nasted-menu-list">
                                  <li><a href="#">Demo item (0)</a></li>
                                  <li><a href="#">Demo item (0)</a></li>
                                  <li><a href="#">Demo item (0)</a></li>
                               </ul>
                            </li>
                            <li>
                               <div class="nasted-menu">
                                  <p><span class="fas fa-tags"></span>gadgets</p>
                                  <i class="fas fa-chevron-down"></i>
                               </div>
                               <ul class="nasted-menu-list">
                                  <li><a href="#">Demo item (0)</a></li>
                                  <li><a href="#">Demo item (0)</a></li>
                                  <li><a href="#">Demo item (0)</a></li>
                               </ul>
                            </li>
                            <li>
                               <div class="nasted-menu">
                                  <p><span class="fas fa-tags"></span>furnitures</p>
                                  <i class="fas fa-chevron-down"></i>
                               </div>
                               <ul class="nasted-menu-list">
                                  <li><a href="#">Demo item (0)</a></li>
                                  <li><a href="#">Demo item (0)</a></li>
                                  <li><a href="#">Demo item (0)</a></li>
                               </ul>
                            </li>
                            <li>
                               <div class="nasted-menu">
                                  <p><span class="fas fa-tags"></span>animals</p>
                                  <i class="fas fa-chevron-down"></i>
                               </div>
                               <ul class="nasted-menu-list">
                                  <li><a href="#">Demo item (0)</a></li>
                                  <li><a href="#">Demo item (0)</a></li>
                                  <li><a href="#">Demo item (0)</a></li>
                               </ul>
                            </li>
                            <li>
                               <div class="nasted-menu">
                                  <p><span class="fas fa-tags"></span>fashions</p>
                                  <i class="fas fa-chevron-down"></i>
                               </div>
                               <ul class="nasted-menu-list">
                                  <li><a href="#">Demo item (0)</a></li>
                                  <li><a href="#">Demo item (0)</a></li>
                                  <li><a href="#">Demo item (0)</a></li>
                               </ul>
                            </li>
                            <li>
                               <div class="nasted-menu">
                                  <p><span class="fas fa-tags"></span>motorbikes</p>
                                  <i class="fas fa-chevron-down"></i>
                               </div>
                               <ul class="nasted-menu-list">
                                  <li><a href="#">Demo item (0)</a></li>
                                  <li><a href="#">Demo item (0)</a></li>
                                  <li><a href="#">Demo item (0)</a></li>
                               </ul>
                            </li>
                            <li>
                               <div class="nasted-menu">
                                  <p><span class="fas fa-tags"></span>properties</p>
                                  <i class="fas fa-chevron-down"></i>
                               </div>
                               <ul class="nasted-menu-list">
                                  <li><a href="#">Demo item (0)</a></li>
                                  <li><a href="#">Demo item (0)</a></li>
                                  <li><a href="#">Demo item (0)</a></li>
                               </ul>
                            </li>
                            <li>
                               <div class="nasted-menu">
                                  <p><span class="fas fa-tags"></span>automobiles</p>
                                  <i class="fas fa-chevron-down"></i>
                               </div>
                               <ul class="nasted-menu-list">
                                  <li><a href="#">Demo item (0)</a></li>
                                  <li><a href="#">Demo item (0)</a></li>
                                  <li><a href="#">Demo item (0)</a></li>
                               </ul>
                            </li>
                            <li>
                               <div class="nasted-menu">
                                  <p><span class="fas fa-tags"></span>bussiness</p>
                                  <i class="fas fa-chevron-down"></i>
                               </div>
                               <ul class="nasted-menu-list">
                                  <li><a href="#">Demo item (0)</a></li>
                                  <li><a href="#">Demo item (0)</a></li>
                                  <li><a href="#">Demo item (0)</a></li>
                               </ul>
                            </li>
                         </ul>
                         <button class="product-filter-btn"><i class="fas fa-broom"></i><span>Clear Filter</span></button>
                      </div>
                   </div>
                </div>
             </div>
          </div>
          <div class="col-lg-9">
             <div class="row">
                <div class="col-sm-6 col-md-4 col-lg-4 card-grid">
                   <div class="product-card">
                      <div class="product-head">
                         <div class="product-img" style="background:url(images/product/01.jpg) no-repeat center; background-size:cover;">
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
                               <li class="breadcrumb-item"><a href="#">property</a></li>
                               <li class="breadcrumb-item active" aria-current="page">house</li>
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
                               <span>/Negotiable</span>
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
             <div class="row">
                <div class="col-lg-12">
                   <ul class="pagination">
                      <li class="page-item"><a class="page-link" href="#"><i class="fas fa-long-arrow-alt-left"></i></a></li>
                      <li class="page-item"><a class="page-link active" href="#">1</a></li>
                      <li class="page-item"><a class="page-link" href="#">2</a></li>
                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                      <li class="page-item">...</li>
                      <li class="page-item"><a class="page-link" href="#">67</a></li>
                      <li class="page-item"><a class="page-link" href="#"><i class="fas fa-long-arrow-alt-right"></i></a></li>
                   </ul>
                </div>
             </div>
          </div>
       </div>
    </div>
</section>

@endsection


      
 
