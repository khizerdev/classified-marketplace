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
               <h2>my ads</h2>
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">my ads</li>
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
      <div class="card">
         <div class="card-body">
            <h5 class="card-title">All Categories</h5>
            <table class="table">
               <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Image</th>
                    <th scope="col">Action</th>
                  </tr>
               </thead>
               <tbody>
                <tr>
                    <?php $no = 1 ?>
                    @forelse ($categories as $category)    
                    <th scope="row">{{$no}}</th>
                    <td>{{$category->name}}</td>
                    <td><img src="{{asset($category->image)}}" width="50" alt=""></td>
                    <td> 
                        <a href="{{route('admin.category.edit' , $category->id)}}" class="btn btn-info"><i class="fas fa-pencil-alt"></i></a>
    
                        <a href="{{route('admin.category.destroy' , $category->id)}}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
    
                    </td>
                </tr>
                <?php $no++ ?>
                    @empty
                        <tr colspan="4"></tr>
                    @endforelse
               </tbody>
            </table>
         </div>
      </div>
   </div>
</section>
@endsection