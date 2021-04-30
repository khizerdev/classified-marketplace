@extends('layouts.app')

@section('css')

<link rel="stylesheet" href="{{ asset('assets/css/custom/setting.css')}}">

@endsection

@section('content')

<section class="single-banner">
   <div class="container">
      <div class="row">
         <div class="col-lg-12">
            <div class="single-content">
               <h2>Edit Profile</h2>
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Profile</li>
               </ol>
            </div>
         </div>
      </div>
   </div>
</section>

@include('includes.profile')

<div class="setting-part">
   <div class="container">
      <div class="row">
         <div class="col-lg-3">
            @include('includes.sidebar')
         </div>
         <div class="col-lg-9">
            <div class="account-card alert fade show" id="app">
               <div class="account-title">
                  <h3>Edit Profile</h3>
                  <button data-dismiss="alert">close</button>
               </div>
               <form class="setting-form" action="{{route('admin.user.profile.update' , $user->id)}}" method="post" enctype="multipart/form-data">
                  @method('PUT')
                  @csrf
                  <div class="row">
                     <div class="col-lg-12">
                        @if ($errors->any())
                           <div class="alert alert-danger">
                              <ul>
                                    @foreach ($errors->all() as $error)
                                       <li>{{ $error }}</li>
                                    @endforeach
                              </ul>
                           </div>
                        @endif
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-lg-6">
                        <div class="form-group"><label class="form-label">Name</label><input type="text" name="name" value="{{$user->name}}" class="form-control" placeholder="Your Name"></div>
                     </div>
                     <div class="col-lg-6">
                        <div class="form-group"><label class="form-label">Email</label><input type="email" name="email" value="{{$user->email}}"  class="form-control" placeholder="Your Email"></div>
                     </div>
                     <div class="col-lg-6 ">
                        <div class="form-group">
                           <label class="form-label" for="password">New Password</label>
                           <input type="password" name="password" class="form-control">
                       </div>
                     </div>
                     <address-dropdown user="{{Auth::user()->profile->toJson()}}"></address-dropdown>
                     <div class="col-lg-6">
                        <div class="form-group"><label class="form-label">Facebook</label><input type="text" name="facebook_id" value="{{$user->profile->facebook_id}}" class="form-control" placeholder="Facebook URL"></div>
                     </div>
                     <div class="col-lg-6">
                        <div class="form-group">
                           <label class="form-label">Phone</label>
                           <input type="text" class="form-control" name="phone" value="{{$user->profile->phone}}" placeholder="Phone No"></div>
                     </div>
                     <div class="col-lg-6">
                         <div class="form-group">
                           <label class="form-label">Profile Image</label>
                           <input type="file" name="avatar" accept="image/*" class="form-control">
                           </div>
                        </div>
                        <div class="col-lg-12">
                           <div class="form-group">
                              <label class="form-label">About Me</label>
                              <textarea placeholder="(Optional)" name="about" name="desc" class="form-control ">{{$user->profile->about}}</textarea>
                        </div>
                     </div>
                     </div>
                     <div class="col-lg-5 offset-7">
                        <button class="btn btn-inline">
                           <i class="fas fa-user-check"></i>
                           <span>update profile</span>
                        </button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>


@endsection


 