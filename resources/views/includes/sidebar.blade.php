<div class="row ">
    <div class="col-lg-12">
       <div class="border dash-menu-list mt-0 shadow-lg">
          <ul class="flex-column">
             <li>
                 <a class="@if(request()->url() == route('admin.dashboard')) active @endif" href="{{route('admin.dashboard')}}">Dashboard</a>
               </li>
               @if(Auth::user()->admin)
             <li>
                 <a class="@if(request()->url() == route('admin.category.index')) active @endif" href="{{route('admin.category.index')}}">All Categories</a>
               </li>
             <li>
                 <a class="@if(request()->url() == route('admin.category.create')) active @endif" href="{{route('admin.category.create')}}">Add Category</a>
               </li>
             <li>
             <li>
                 <a class="@if(request()->url() == route('admin.subcategory.index')) active @endif" href="{{route('admin.subcategory.index')}}">All Sub Categories</a>
               </li>
             <li>
                 <a class="@if(request()->url() == route('admin.subcategory.create')) active @endif" href="{{route('admin.subcategory.create')}}">Add SubCategory</a>
               </li>
             <li>
             <li>
                 <a class="@if(request()->url() == route('admin.childcategory.index')) active @endif" href="{{route('admin.childcategory.index')}}">All Child Categories</a>
               </li>
             <li>
                 <a class="@if(request()->url() == route('admin.childcategory.create')) active @endif" href="{{route('admin.childcategory.create')}}">Add Child Category</a>
                </li>
                @endif
                @if(!Auth::user()->admin)
             <li>
                 <a class="@if(request()->url() == route('admin.ad.create')) active @endif" href="{{route('admin.ad.create')}}">Post Your Ad</a>
               </li>
               @endif
             <li>
                 <a class="@if(request()->url() == route('admin.ads.index')) active @endif" href="{{route('admin.ads.index')}}"> @if(Auth::user()->admin) {{'All Ads'}} @else {{'My Ads'}} @endif </a>
             </li>
             @if(!Auth::user()->admin)
             <li>
                 <a class="@if(request()->url() == route('admin.saved.index')) active @endif" href="{{route('admin.saved.index')}}">Saved Ads</a>
             </li>
             <li>
                 <a class="@if(request()->url() == route('admin.chats')) active @endif" href="{{route('admin.chats')}}">Chats</a>
             </li>
             @endif
             <li>
                 <a class="@if(request()->url() == route('admin.user.profile')) active @endif" href="{{route('admin.user.profile')}}">Edit Profile</a>
             </li>
             <li>
                 <a href="{{ route('logout') }}" onclick="event.preventDefault();
               document.getElementById('logout-form').submit();">Logout</a>
               <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                   @csrf
               </form>
              </li>
          </ul>
       </div>
    </div>
 </div>