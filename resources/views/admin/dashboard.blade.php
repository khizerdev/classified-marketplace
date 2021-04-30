@extends('layouts.app')

@section('css')

<link rel="stylesheet" href="{{ asset('assets/css/custom/profile.css')}}">

@endsection


@section('content')


      <section class="single-banner">
         <div class="container">
            <div class="row">
               <div class="col-lg-12">
                  <div class="single-content">
                     <h2>Welcome to Dashboard</h2>
                     <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                     </ol>
                  </div>
               </div>
            </div>
         </div>
      </section>
        @include('includes.profile')
      <section class="profile-part">
         <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    @include('includes.sidebar')
                </div>
                <div class="col-lg-9">
                        <div class="card">
                           <div class="card-body">
                              <div class="dash-header-right">
                                 <div class="dash-focus dash-list">
                                    <h2>2433</h2>
                                    <p>listing ads</p>
                                 </div>
                                 <div class="dash-focus dash-book">
                                    <h2>2433</h2>
                                    <p>bookmark ads</p>
                                 </div>
                                 <div class="dash-focus dash-rev">
                                    <h2>2433</h2>
                                    <p>total review</p>
                                 </div>
                              </div>
                           </div>
                        </div>
                </div>
            </div>
         </div>
      </section>
@endsection