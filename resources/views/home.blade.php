@extends('layouts.app')

@section('css')

<style>



</style>


@endsection


@section('content')

<section class="banner-part">
    <div class="container">
       <div class="banner-content">
          <h1>You can #Buy, #Rent, #Booking anything from here.</h1>
          <p>Buy and sell everything from used cars to mobile phones and computers, or search for property, jobs and more in the world.</p>
          <a href="{{route('ad.all')}}" class="btn btn-outline"><i class="fas fa-eye"></i><span>Show all ads</span></a>
       </div>
    </div>
</section>

{{-- suggest --}}
<section class="suggest-part">
    <div class="container">
       <div class="suggest-slider slider-arrow">
          @foreach ($categories as $category)    
            <div class="suggest-card">
               <div class="suggest-img"><img src="{{asset($category->image)}}" alt="car"></div>
               <div class="suggest-meta">
                  <h6><a href="#">{{$category->name}}</a></h6>
                  <p>(4,521) ads</p>
               </div>
            </div>
          @endforeach
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
                <a href="#" class="btn btn-inline"><i class="fas fa-eye"></i><span>view all featured</span></a>
             </div>
          </div>
          <div class="col-md-7 col-lg-7">
             <div class="feature-item-slider slider-arrow">
                @foreach ($latestAds as $ad)
                <div class="feature-card">
                   <div class="feature-img"><a href="{{route('ad.show' , $ad->slug)}}">
                     @php $img = explode(',', $ad->featured); @endphp
                     <img src="{{asset($img[0])}}" alt="feature"></a></div>
                   {{-- <div class="feature-badge">
                      <p>Featured</p>
                   </div> --}}
                   <div class="feature-bookmark">
                      <button type="button">
                         <i class="fas fa-heart"></i>
                     </button>
                  </div>

                   <div class="feature-content">
                      <ol class="breadcrumb">
                         <li><span class="feature-cate rent">Rent</span></li>
                         <li class="breadcrumb-item"><a href="#">automobile</a></li>
                         <li class="breadcrumb-item active" aria-current="page">Private Car</li>
                      </ol>
                      <div class="feature-title">
                         <h3><a href="{{route('ad.show' ,$ad->slug)}}">{{$ad->name}}</a></h3>
                      </div>
                      <ul class="feature-meta">
                         <li><span>{{$ad->price}} <small></small></span></li>
                         <li><i class="fas fa-clock"></i><span>{{$ad->created_at->diffForHumans()}}</span></li>
                      </ul>
                   </div>
                </div>
                    
                @endforeach
             </div>
           
             <div class="feature-thumb-slider">
               @foreach ($latestAds as $ad)
                  <?php $images = explode(',', $ad->featured); ?>
                  <div><img src="{{asset($images[0])}}" style="object-fit: contain" width="200" height="100"  alt="feature"></div>
                  
               @endforeach
             </div>
          </div>
       </div>
    </div>
</section>

{{-- recommended-products --}}
<section class="section recomend-part mb-4">
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
                @foreach ($ads as $ad)     
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
                            <li class="breadcrumb-item"><a href="{{route('ad.show' , $ad->slug)}}">{{Str::limit($ad->name,30)}}</a></li>
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
                @endforeach
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
