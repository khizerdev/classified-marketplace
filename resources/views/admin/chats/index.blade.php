@extends('layouts.app')
@section('css')

<link rel="stylesheet" href="{{ asset('assets/css/custom/my-ads.css')}}">
@endsection
@section('content')
<section class="single-banner">
    <div class="container">
       <div class="row">
          <div class="col-lg-12">
             <div class="single-content">
                <h2>Chats</h2>
                <ol class="breadcrumb">
                   <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                   <li class="breadcrumb-item active" aria-current="page">my chats</li>
                </ol>
             </div>
          </div>
       </div>
    </div>
 </section>
 @include('includes.profile')
 <section class="myads-part">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
            @include('includes.sidebar')
            </div>
            <div class="col-lg-9">
                <div class="container-fluid">
                    <div class="row justify-content-around">
                        <div class="col-lg-12">
                            <div id="app">
                                <conversation></conversation>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 </section>
@endsection