<section class="dash-header-part">
    <div class="container">
       <div class="dash-header-card">
          <div class="row">
             <div class="col-lg-5">
                <div class="dash-header-left">
                   <div class="dash-avatar"><a href="#"><img src="images/avatar/01.jpg" alt="avatar"></a></div>
                   <div class="dash-intro">
                      <h4><a href="#">gackon Honson</a></h4>
                      <h5>new seller</h5>
                      <ul class="dash-meta">
                         <li><i class="fas fa-phone-alt"></i><span>(123) 000-1234</span></li>
                         <li><i class="fas fa-envelope"></i><span>gackon@gmail.com</span></li>
                         <li><i class="fas fa-map-marker-alt"></i><span>Los Angeles, West America</span></li>
                      </ul>
                   </div>
                </div>
             </div>
             <div class="col-lg-7">
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
          <div class="row">
             <div class="col-lg-12">
                <div class="dash-header-alert alert fade show">
                   <p>From your account dashboard. you can easily check & view your recent orders, manage your shipping and billing addresses and Edit your password and account details.</p>
                   <button data-dismiss="alert"><i class="fas fa-times"></i></button>
                </div>
             </div>
          </div>
          <div class="row">
             <div class="col-lg-12">
                <div class="dash-menu-list">
                   <ul>
                      <li><a class="@if(request()->url() == route('admin.dashboard')) active @endif" href="{{route('admin.dashboard')}}">Profile</a></li>
                      <li><a class="@if(request()->url() == route('admin.ad.create')) active @endif" href="{{route('admin.ad.create')}}">Ad post</a></li>
                      <li><a class="@if(request()->url() == route('admin.ads.index')) active @endif" href="{{route('admin.ads.index')}}">My ads</a></li>
                      <li><a class="@if(request()->url() == route('admin.saved.ads')) active @endif" href="{{route('admin.saved.ads')}}">Bookmarks</a></li>
                      <li><a class="@if(request()->url() == route('admin.chats')) active @endif" href="{{route('admin.chats')}}">Chats</a></li>
                      <li><a class="@if(request()->url() == route('admin.user.profile')) active @endif" href="{{route('admin.user.profile')}}">Edit Profile</a></li>
                      <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form></li>
                   </ul>
                </div>
             </div>
          </div>
       </div>
    </div>
 </section>