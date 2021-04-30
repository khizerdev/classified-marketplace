@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/custom/ad-post.css')}}">
@endsection
@section('content')
<section class="single-banner">
   <div class="container">
      <div class="row">
         <div class="col-lg-12">
            <div class="single-content">
               <h2>ad post</h2>
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">ad post</li>
               </ol>
            </div>
         </div>
      </div>
   </div>
</section>
@include('includes.profile')
<section class="adpost-part">
   <div class="container">
      <div class="row">
         <div class="col-lg-3">
            @include('includes.sidebar')
         </div>
         <div class="col-lg-8">
            <form class="adpost-form" action="{{route('admin.ad.store')}}" method="post" enctype="multipart/form-data">
               @csrf
               <div class="adpost-card">
                  <div class="adpost-title">
                     <h3>Post Your Ad</h3>
                  </div>
                  <div class="row" id="app">
                     <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-label">Ad Title</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Type your product title here" name="name">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                     </div>
                        <category-dropdown></category-dropdown>
                    
                     <div class="col-md-4 col-lg-4">
                        <div class="form-group">
                           <ul class="form-check-list">
                              <li>
                                  <label class="form-label">
                                       condition
                                    </label>
                                </li>
                            <li>
                                <input name="condition" value="new" type="radio" class="form-check" id="new-check" checked>
                                <label for="new-check" class="form-check-text">
                                    new
                                    </label>
                                </li>
                              <li>
                                  <input name="condition" value="used" type="radio" class="form-check" id="use-check">
                                  <label for="use-check" class="form-check-text">
                                      used
                                    </label>
                                </li>
                           </ul>
                        </div>
                     </div>
                     
                     <div class="col-lg-12">
                        <div class="form-group">
                           <label class="form-label">Ad images</label>
                           <featured-image></featured-image>
                        </div>
                     </div>
                     <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-label">
                                ad description
                            </label>
                            <textarea class="form-control @error('desc') is-invalid @enderror" placeholder="Describe your message" name="desc">
                            </textarea>
                            @error('desc')
                           <span class="invalid-feedback" role="alert">
                               <strong>{{ $message }}</strong>
                           </span>
                       @enderror
                            </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label">
                                Price
                            </label>
                            <input type="number" name="price" class="form-control  @error('price') is-invalid @enderror" placeholder="Enter your pricing amount">
                            @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                     </div>
                     <div class="col-lg-4">
                        <div class="form-group">
                           <label class="form-label">Price Status</label>
                           <select name="price_status" class="form-control @error('price_status') is-invalid @enderror custom-select">
                              <option value="">Select</option>
                              <option value="negotiable">Negotiable</option>
                              <option value="fixed">Fixed</option>
                           </select>
                           @error('price_status')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                     </div>
                     <div class="col-lg-12">
                        <div class="form-group">
                           <label class="form-label">Listing Location</label>
                           <input type="text" name="location" class="form-control @error('location') is-invalid @enderror">
                           @error('location')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                     </div>
                     <address-dropdown></address-dropdown>
                  </div>
               </div>
               <div class="adpost-card">
                  <div class="adpost-title">
                     <h3>Your Information</h3>
                  </div>
                  <div class="row">
                     <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" placeholder="{{Auth::user()->name}}" readonly="readonly"></div>
                     </div>
                     <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label">Phone No</label>
                            <input type="number" name="phone" class="form-control" placeholder="Your Phone no"></div>
                     </div>
                  </div>
               </div>
               <div class="adpost-card pb-2">
                  <div class="form-group text-right">
                      <button class="btn btn-inline" type="submit">
                          <i class="fas fa-check-circle"></i>
                          <span>published your ad</span>
                        </button>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</section>
@endsection