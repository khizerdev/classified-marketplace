@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/custom/leftbar-details.css')}}">
@endsection


@section('content')


      <section class="single-banner">
         <div class="container">
            <div class="row">
               <div class="col-lg-12">
                  <div class="single-content">
                     <h2>ad details </h2>
                     
                  </div>
               </div>
            </div>
         </div>
      </section>


      <section class="ad-details-part">
         <div class="container">
            <div class="row" >
               <div class="col-lg-4" id="app">
                  <div class="ad-details-price">
                     <h5>${{$ad->price}}</h5>
                     <span>/@if($ad->price_status === 'fixed') {{'fixed'}} @else {{'Negotiable'}} @endif</span><i class="flaticon-bargain"></i>
                  </div>
                  <phone phone={{$ad->user->profile->phone}}></phone>
                  <div class="ad-details-card">
                     <div class="ad-details-title">
                        <h5>author info</h5>
                       
                     </div>
                     <div class="ad-details-profile">
                        <div class="author-img"><a href="#"><img src="<?php echo ($ad->user->profile->avatar != NULL) ? url($ad->user->profile->avatar) : url("https://statics.olx.com.pk/external/base/img/avatar_4.png"); ?>" alt="avatar"><span class="author-status"></span></a></div>
                        <div class="author-intro">
                           <h4><a href="#">{{$ad->user->name}}</a></h4>
                           <h5>Member Since {{$ad->user->created_at->year}}</h5>
                           <p>Corporis dolore libero temporibus minus tempora quia voluptas nesciunt.</p>
                        </div>
                        <ul class="author-widget">
                           <li><a href="#"><i class="fas fa-phone-alt"></i></a></li>
                           
                           <li><a href="#"><i class="fas fa-eye"></i></a></li>
                        </ul>
                        <ul class="author-list">
                           <li>
                              <h6>total ads</h6>
                              <p>{{ App\Ad::where('user_id', $ad->user_id)->count() }}</p>
                           </li>
                           @if(Auth::check())
                              @if(Auth()->id() !== $ad->user->id)
                                 <li class="text-center" >
                                    <message 
                                    seller-name="{{$ad->user->name}}"
                                    user-id="{{auth()->user()->id}}"
                                    reciever-id="{{$ad->user->id}}"
                                    ad-id="{{$ad->id}}"
                                    ></message>
                                 </li>
                              @endif
                           @endif
                           <li><clickphone></clickphone></li>
                        </ul>
                        <div class="author-details">
                           <h6>{{$ad->user->profile->about}}</h6>
                        </div>
                     </div>
                  </div>
                  <div class="ad-details-card">
                     <div class="ad-details-title">
                        <h5>location</h5>
                     </div>
                     <div class="ad-details-location">
                        <iframe src="https://maps.google.com/maps?q={{$ad->location}}&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0"
                        style="border:0" allowfullscreen></iframe>
                     </div>
                  </div>
                  <div class="ad-details-card">
                     <div class="ad-details-title">
                        <h5>safety tips</h5>
                     </div>
                     <div class="ad-details-safety">
                        <ul>
                           <li>
                              <i class="fas fa-dot-circle"></i>
                              <p>Check the item before you buy</p>
                           </li>
                           <li>
                              <i class="fas fa-dot-circle"></i>
                              <p>Pay only after collecting item</p>
                           </li>
                           <li>
                              <i class="fas fa-dot-circle"></i>
                              <p>Beware of unrealistic offers</p>
                           </li>
                        </ul>
                     </div>
                  </div>
                  <div class="ad-details-card d-none">
                     <div class="ad-details-title">
                        <h5>featured ads</h5>
                     </div>
                     <div class="ad-details-feature slider-arrow">
                        <div class="feature-card">
                           <div class="feature-img"><a href="#"><img src="images/product/10.jpg" alt="feature"></a></div>
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
                     </div>
                  </div>
               </div>
               <div class="col-lg-8">
                  <div class="ad-details-card">
                     <div class="ad-details-breadcrumb">
                        <ol class="breadcrumb">
                           <li><span class="flat-badge sale">for sales</span></li>
                           <li class="breadcrumb-item"><a href="#">Property</a></li>
                           <li class="breadcrumb-item active" aria-current="page">house</li>
                        </ol>
                     </div>
                     <div class="ad-details-heading">
                        <h2><a href="#">{{$ad->name}}</a></h2>
                     </div>
                     <ul class="ad-details-meta">
                        <li>
                           <a href="#">
                              <i class="fas fa-eye"></i>
                              <p>preview<span>(134)</span></p>
                           </a>
                        </li>
                        <li>
                           <a href="#">
                              <i class="fas fa-star"></i>
                              <p>review<span>(29)</span></p>
                           </a>
                        </li>
                        <li>
                           @if(Auth::check())
                              @if(!$ad->didUserSavedAd() && $ad->user_id !== Auth::user()->id)
                              <form action="{{route('admin.save.ad')}}">
                                 {{csrf_field()}}
                                 <input name="user_id" type="hidden" value="@if(Auth::check()) {{Auth::user()->id}} @else {{'1'}} @endif" />
                                 <input name="ad_id" type="hidden" value="{{$ad->id}}" />
                                 <button type="submit" style="border: 1px solid var(--primary);
                                 border-radius: var(--card-radius);background: white;">
                                    <a style="cursor: pointer;border:none">
                                       <i class="fas fa-heart"></i>
                                       <p>save this ad<span></span></p>
                                    </a>
                                 </button>
                              </form>
                              @endif   
                           @endif
                        </li>
                     </ul>
                     <div class="ad-details-slider slider-arrow">
                        <?php $images = explode(',', $ad->featured); ?>
                        @foreach ($images as $image)
                       <div><img src="{{asset($image)}}" style="object-fit: contain !important" width="300" height="400" alt="details"></div>
                       @endforeach
                    </div>
                    <div class="ad-thumb-slider">
                       <?php $images = explode(',', $ad->featured); ?>
                        @foreach ($images as $image)
                       <div><img src="{{asset($image)}}" style="object-fit: contain" width="200" height="100"  alt="details"></div>
                       @endforeach
                     </div>
                     <div class="ad-details-action">
                        <ul>
                           <li>
                              <button type="button" data-toggle="modal" data-target="#reportModal">
                                 <i class="fas fa-exclamation-triangle"></i>
                                 <span>report</span>
                              </button>
                           </li>
                           <li><button type="button"><i class="fas fa-share-alt"></i><span>share</span></button></li>
                        </ul>
                     </div>
                  </div>
                  <div class="ad-details-card">
                     <div class="ad-details-title">
                        <h5>Specification</h5>
                     </div>
                     <div class="ad-details-specific">
                        <ul>
                           <li>
                              <h6>price:</h6>
                              <p>${{$ad->price}}</p>
                           </li>
                           <li>
                              <h6>published:</h6>
                              <p>{{$ad->created_at->format('jS F Y')}}</p>
                           </li>
                           <li>
                              <h6>location:</h6>
                              <p>{{$ad->location}}</p>
                           </li>
                           <li>
                              <h6>category:</h6>
                              <p>{{$ad->category->name}}</p>
                           </li>
                           <li>
                              <h6>condition:</h6>
                              <p>{{$ad->condition}}</p>
                           </li>
                           <li>
                              <h6>price type:</h6>
                              <p>{{$ad->price_status}}</p>
                           </li>
                        </ul>
                     </div>
                  </div>
                  <div class="ad-details-card">
                     <div class="ad-details-title">
                        <h5>description</h5>
                     </div>
                     <div class="ad-details-descrip">
                        <p>{{$ad->desc}}</span></p>
                     </div>
                  </div>
                  <div class="ad-details-card">
                     <div class="ad-details-title">
                        <h5>Reviews</h5>
                     </div>
                     <div class="ad-details-descrip">
                        <div id="disqus_thread"></div>
                        <script>
                            /**
                            *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                            *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
                            /*
                            var disqus_config = function () {
                            this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
                            this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                            };
                            */
                            (function() { // DON'T EDIT BELOW THIS LINE
                            var d = document, s = d.createElement('script');
                            s.src = 'https://classified-2.disqus.com/embed.js';
                            s.setAttribute('data-timestamp', +new Date());
                            (d.head || d.body).appendChild(s);
                            })();
                        </script>
                        <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>


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
                     @foreach ($relatedAds as $ad)     
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

     <div class="modal fade" id="reportModal" tabindex="-1" role="dialog" aria-labelledby="reportModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="reportModalLabel">Report Ad</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action={{route('report.ad')}} method="post">
             @csrf
          <div class="modal-body">
               <div class="form-group">
                  <div class="form-check">
                     <input class="form-check-input" type="radio" name="reason" id="reason1" value="badContent" checked>
                     <label class="form-check-label" for="reason1">
                       Offensive Content
                     </label>
                   </div>
                   <div class="form-check">
                     <input class="form-check-input" type="radio" name="reason" id="reason2" value="fraud">
                     <label class="form-check-label" for="reason2">
                        Fraud
                     </label>
                   </div>
                   <div class="form-check">
                     <input class="form-check-input" type="radio" name="reason" id="reason3" value="duplicated">
                     <label class="form-check-label" for="reason3">
                        Duplicate ad
                     </label>
                   </div>
                   <div class="form-check">
                     <input class="form-check-input" type="radio" name="reason" id="reason4" value="sold">
                     <label class="form-check-label" for="reason4">
                        Product already sold
                     </label>
                   </div>
                   <div class="form-group mt-1">
                     <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="@if(Auth::check()) {{Auth::user()->email}} @else {{''}} @endif" id="email" placeholder="Email" @if(Auth::check()) {{'readonly'}} @endif>
                     @error('email')
                     <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                     </span>
                 @enderror
                   </div>
                   <div class="form-group">
                     <textarea class="form-control @error('message') is-invalid @enderror" name="message" id="comment" rows="1" placeholder="Comment"></textarea>
                     @error('message')
                     <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                     </span>
                 @enderror
                   </div>
                   <input type="hidden" name="ad_id" value="{{$ad->id}}">
               </div>
            </div>
            <div class="modal-footer">
               <button type="submit" class="btn btn-danger btn-sm btn-block">Submit</button>
            </div>
         </form>  
        </div>
      </div>
    </div>
    
@endsection