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
          <h5 class="card-title">Add a new Child Category</h5>
          <form action="{{route('admin.childcategory.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" required>
                @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="name">Select Parent Category</label>
                <select name="subcategory_id" id="subcategory_id" class="form-control">
                    <option value="">Select Category</option>
                    @forelse ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @empty
                    <option value="">No Option Found</option>
                    @endforelse
                </select>
                @error('category_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror
            </div>
            
            <div class="form-group">
                <div class="text-center"> 
                    <button type="submit" class="btn btn-success">
                        Create Sub Category
                    </button>
                </div>
            </div>
        </form>
        </div>
      </div>
   </div>
</section>
@endsection