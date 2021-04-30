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
                <h2>{{$childCategorySlug}}</h2>
                <ol class="breadcrumb">
                   <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                   <li class="breadcrumb-item active" aria-current="page">{{$subCategorySlug}}</li>
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
                   <p>Showing 1–9 of 130 results</p>
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
                          <h6>Filter</h6>
                       </div>
                       <div class="product-sidebar-content">
                          <ul class="product-sidebar-list">
                             @foreach ($filteredByChildCategory as $category)    
                                <li>
                                    <a href="{{($category->childcategories->slug)??''}}">
                                        <label>{{$category->childcategories->name}}</label>
                                    </a>
                                </li>
                             @endforeach
                          </ul>
                          <button class="product-filter-btn"><i class="fas fa-broom"></i><span>Clear Filter</span></button>
                       </div>
                    </div>
                 </div>
                <div class="col-md-6 col-lg-12">
                   <div class="product-sidebar">
                      <div class="product-sidebar-title">
                         <h6>Filter by Price</h6>
                      </div>
                      <form action="{{url()->current()}}" method="get">
                          <div class="product-sidebar-content mt-2">
                             <div class="price-range">
                                 <label for="minPrice">Minimum Price</label>
                                <input type="number" @if(isset($minPrice)) value="{{$minPrice}} @endif" name="minPrice" class="form-control bg-white">
                             </div>
                             <div class="price-range">
                                 <label for="maxPrice">Maximum Price</label>
                                <input type="number" name="maxPrice" class="form-control bg-white">
                             </div>
                             <button type="submit" class="product-filter-btn"><i class="fas fa-search"></i><span>search</span></button>
                          </div>
                      </form>
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
                 @forelse ($ads as $ad)
                 <div class="col-sm-6 col-md-4 col-lg-4 card-grid">
                     <div class="product-card">
                        <div class="product-head">
                          @php $img = explode(',', $ad->featured); @endphp
                           <div class="product-img" style="background:url({{asset($img[0])}}) no-repeat center; background-size:cover;">
                              <i class="cross-badge fas fa-bolt"></i><span class="flat-badge booking">booking</span>
                              <ul class="product-meta">
                                 <li>
                                    <i class="fas fa-eye"></i>
                                    <p>264</p>
                                 </li>
                              </ul>
                           </div>
                        </div>
                        <div class="product-info">
                           <div class="product-tag">
                              <i class="fas fa-tags"></i>
                              <ol class="breadcrumb">
                                 <li class="breadcrumb-item"><a href="{{route('ad.show' , $ad->slug)}}">{{Str::limit($ad->name,25)}}</a></li>
                                 <li class="breadcrumb-item d-none" aria-current="page">Duplex House</li>
                              </ol>
                           </div>
                           <div class="product-title">
                              <h5><a href="{{route('ad.show' , $ad->slug)}}">{{Str::words( $ad->desc , 3)}}</a></h5>
                              <ul class="product-location">
                                 <li>
                                    <i class="fas fa-map-marker-alt"></i>
                                    <p>{{ Str::limit($ad->location,10)}}, {{$ad->country_id}}</p>
                                 </li>
                                 <li>
                                    <i class="fas fa-clock"></i>
                                    <p>{{ $ad->created_at->diffForHumans()}}</p>
                                 </li>
                              </ul>
                           </div>
                           <div class="product-details">
                              <div class="product-price">
                                 <h5>${{ $ad->price}}</h5>
                                 <span></span>
                              </div>
                              <ul class="product-widget">
                                 <li><a href="compare.html" class="tooltip"><i class="fas fa-compress"></i><span class="tooltext top">compare</span></a></li>
                                 <li><button class="tooltip"><i class="far fa-heart"></i><span class="tooltext top">bookmark</span></button></li>
                              </ul>
                           </div>
                        </div>
                     </div>
                 </div>
                 @empty
                     <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <p>No Product Found</p>
                            </div>
                        </div>
                     </div>
                 @endforelse
                <div class="col-sm-6 col-md-4 col-lg-4 card-grid">
                   
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


      
 
