<section class="dash-header-part">
    <div class="container">
       <div class="dash-header-card">
          <div class="row">
             <div class="col-lg-5">
                <div class="dash-header-left">
                   <div class="dash-avatar">
                      <a href="#">
                         <img src="<?php echo (Auth::user()->profile->avatar != NULL) ? url(Auth::user()->profile->avatar) : url("https://statics.olx.com.pk/external/base/img/avatar_4.png"); ?>" alt="avatar">
                        </a>
                     </div>
                   <div class="dash-intro">
                      <h4><a href="#">{{Auth::user()->name}}</a></h4>
                      <ul class="dash-meta">
                         <li><i class="fas fa-phone-alt"></i><span>{{Auth::user()->profile->phone}}</span></li>
                         <li><i class="fas fa-envelope"></i><span>{{Auth::user()->email}}</span></li>
                         <li><i class="fas fa-map-marker-alt"></i><span>{{Auth::user()->profile->location->name}}</span></li>
                      </ul>
                   </div>
                </div>
             </div>
             <div class="col-lg-7">
                <div class="dash-header-right">
                   <div class="dash-focus dash-list">
                      <h2>
                         @if(Auth::user()->admin)
                         {{ App\Ad::count() }}
                         @else
                         {{ App\Ad::where('user_id', Auth::user()->id)->count() }}
                         @endif
                      </h2>
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
 </section>