@extends('layouts.app')

@section('css')

<link rel="stylesheet" href="{{ asset('assets/css/custom/bookmark.css')}}">

@endsection

@section('content')
      <section class="single-banner">
         <div class="container">
            <div class="row">
               <div class="col-lg-12">
                  <div class="single-content">
                     <h2>Saved Ads</h2>
                     <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">saved ads</li>
                     </ol>
                  </div>
               </div>
            </div>
         </div>
      </section>
      @include('includes.profile')
      <section class="bookmark-part">
         <div class="container">
             <div class="row">
                 <div class="col-lg-3">
                    @include('includes.sidebar')
                 </div>
                 <div class="col-lg-9">
                 <div class="row">
                    <div class="col-lg-12">
                       <div class="product-filter">
                          <div class="product-page-number">
                             <p>{{count($ads)}} results</p>
                          </div>
                          <ul class="product-card-type">
                             <li class="grid-verti active"><i class="fas fa-grip-vertical"></i></li>
                             <li class="grid-hori"><i class="fas fa-grip-horizontal"></i></li>
                          </ul>
                       </div>
                    </div>
                 </div>
                 <div class="row justify-content-center">
                    @forelse ($ads as $ad)
                     <div class="col-sm-6 col-md-4 col-lg-4 card-grid">
                        <div class="product-card">
                           <div class="product-head">
                              @php $img = explode(',', $ad->ad->featured); @endphp
                              <div class="product-img" style="background:url({{asset($img[0])}}) no-repeat center; background-size:cover;">
                                 <i class="cross-badge fas fa-bolt"></i><span class="flat-badge rent">rent</span>
                               
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
                                 <h5><a target="_blank" href="{{route('ad.show' ,$ad->ad->slug)}}">{{$ad->ad->name}}</a></h5>
                                 <ul class="product-location">
                                    <li>
                                       <i class="fas fa-map-marker-alt"></i>
                                       <p>{{$ad->ad->location}}</p>
                                    </li>
                                    <li>
                                       <i class="fas fa-clock"></i>
                                       <p>{{$ad->ad->created_at->diffForHumans()}}</p>
                                    </li>
                                 </ul>
                              </div>
                              <div class="product-details">
                                 <div class="product-price">
                                    <h5>${{$ad->ad->price}}</h5>
                                    <span>/{{$ad->ad->price_status}}</span>
                                 </div>
                                 <div>
                                    <form action="{{route('admin.save.ad.remove')}}">
                                       {{csrf_field()}}
                                       <input name="user_id" type="hidden" value="@if(Auth::check()) {{Auth::user()->id}} @else {{'1'}} @endif" />
                                       <input name="ad_id" type="hidden" value="{{$ad->ad->id}}" />
                                       <button type="submit" style="border: none">
                                             <i class="fas fa-heart" title="Remove from Saved"></i>
                                       </button>
                                    </form>
                                 </div>
                                 
                              </div>
                           </div>
                        </div>
                     </div>
                    @empty

                    <div class="text-center py-5">
                     <p>No Saved Ads</p>
                     <a href="{{route('home')}}" class="btn btn-inline mt-5 "><i class="fas fa-plus-circle"></i><span>See Ads</span></a>
                     </div>

                 @endif
                 </div>
                
                 </div>
             </div>
         </div>
      </section>

      @endsection