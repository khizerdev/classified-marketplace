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
          <h5 class="card-title">Add a new Category</h5>
          <form action="{{route('admin.category.update',$category->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" value="{{$category->name}}" class="form-control @error('name') is-invalid @enderror" required>
                @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" value="{{$category->image}}" id="image" class="form-control">
                
                <img src="@if(isset($category) && $category->image !== '') {{asset($category->image)}} @else {{asset('https://reactnativecode.com/wp-content/uploads/2018/02/Default_Image_Thumbnail.png')}} @endif" id="getImage" class="img-fluid w-25 my-2" alt="">
            </div>
            
            <div class="form-group">
                <div class="text-center"> 
                    <button type="submit" class="btn btn-success">
                        Update Category
                    </button>
                </div>
            </div>
        </form>
        </div>
      </div>
   </div>
</section>
@endsection

@section('js')

<script>
    $('#image').on('change', function() {
var file = $(this).get(0).files;
var reader = new FileReader();
reader.readAsDataURL(file[0]);
reader.addEventListener("load", function(e) {
var image = e.target.result;
$("#getImage").attr('src', image);
    });
});
</script>

@endsection