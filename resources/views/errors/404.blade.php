@extends('layouts.app')

@section('css')

<link rel="stylesheet" href="{{ asset('assets/css/custom/404.css')}}">

@endsection


@section('content')

<section class="error-part">
    <div class="container">
       <div class="error">
          <h1>404</h1>
          <h2>Oops! Something Went Wrong?</h2>
          <a href="{{route('home')}}" class="btn btn-outline"><i class="fas fa-home"></i><span>go to homepage</span></a>
       </div>
    </div>
 </section>

@endsection
