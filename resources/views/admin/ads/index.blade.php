@extends('layouts.app')

@section('css')

<link rel="stylesheet" href="{{ asset('assets/css/custom/my-ads.css')}}">
<link rel="stylesheet" href="https://cdn.datatables.net/plug-ins/f2c75b7247b/integration/bootstrap/3/dataTables.bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/1.0.4/css/dataTables.responsive.css">

@endsection

@section('content')

<div>
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
    <section class="myads-part" >
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    @include('includes.sidebar')
                </div>
                <div class="col-lg-9">
                    <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Manage Ads</h1>
                 
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">All Ads</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive w-100">
                                @if(count($ads) > 0)
                                <table class="table table-bordered " width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            @if(!Auth::user()->admin)
                                            <th>Description</th>
                                            @endif
                                            <th>Price</th>
                                            <th>Status</th>
                                            @if(Auth::user()->admin)
                                                <th>Change Status</th>
                                            @endif
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Title</th>
                                            @if(!Auth::user()->admin)
                                            <th>Description</th>
                                            @endif
                                            <th>Price</th>
                                            <th>Status</th>
                                            @if(Auth::user()->admin)
                                                <th>Update Status</th>
                                            @endif
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($ads as $ad)       
                                        <tr>
                                            <td>{{ Str::words($ad->name,2)}}</td>
                                            @if(!Auth::user()->admin)
                                            <td>{{Str::limit($ad->name,33)}}</td>
                                            @endif
                                            <td>
                                                <b>
                                                    {{$ad->price}}
                                                </b>
                                            </td>
                                            <td>
                                                @if($ad->status === 'pending')
                                                <span class="badge badge-info">{{$ad->status}}</span>
                                                @elseif($ad->status === 'disabled')
                                                <span class="badge badge-warning">{{$ad->status}}</span>
                                                @else
                                                <span class="badge badge-success">{{$ad->status}}</span>
                                                @endif
                                                
                                            </td>
                                            @if(Auth::user()->admin)
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-secondary dropdown-toggle" style="padding: 10px;font-size:10px" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                      Change Status
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        @if($ad->status === 'pending')
                                                        <a class="dropdown-item" href="{{route('admin.ad.active' , $ad->id)}}">Active</a>
                                                        @endif
                                                        @if($ad->status === 'active')
                                                        <a class="dropdown-item" href="{{route('admin.ad.disable' ,$ad->id)}}">Disable</a>
                                                        @endif
                                                        @if($ad->status === 'disabled')
                                                        <a class="dropdown-item" href="{{route('admin.ad.active' , $ad->id)}}">Active</a>
                                                        @endif
                                                    </div>
                                                  </div>
                                            </td>
                                            @endif
                                            <td>
                                                @if(!Auth::user()->admin)
                                                <a href="{{route('admin.ad.edit' , $ad->id)}}" class=" btn-info btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                                @endif
                                                <a href="{{route('admin.ad.show' , $ad->slug)}}" target="_blank" class=" btn-success btn-sm"><i class="fas fa-eye"></i></a>
                                                @if(!Auth::user()->admin)
                                                <a href="{{route('admin.ad.destroy' , $ad->id)}}" class=" btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                                @endif
                                            </td>
                                            
                                        </tr>

                                        @endforeach
                                    
                                     
                                    </tbody>
                                </table>
                                @else 
                                <div class="text-center py-5">
                                    <p>No Ads Found</p>
                                    <a href="{{route('admin.ad.create')}}" class="btn btn-inline mt-5 "><i class="fas fa-plus-circle"></i><span>post your first ad</span></a>
                                </div>

                                @endif

                                {{$ads->links()}}
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
                </div>
            </div>
        
        </div>
    </section>
</div>



@endsection

@section('js')
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
{{-- <script src="{{ asset('assets/js/custom/price-range.js ')}}"></script> --}}
<script src="https://cdn.datatables.net/1.10.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/plug-ins/f2c75b7247b/integration/bootstrap/3/dataTables.bootstrap.js"></script>
<script src="https://cdn.datatables.net/responsive/1.0.4/js/dataTables.responsive.js"></script>

<script>
    $('#dataTable').DataTable();
</script>


@endsection