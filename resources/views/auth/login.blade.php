
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="icon" href="images/favicon.png {{ asset('assets/fonts/flaticon/flaticon.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />

    <!-- Styles -->
      <link rel="stylesheet" href="{{ asset('assets/css/vendor/slick.min.css')}}">
      <link rel="stylesheet" href="{{ asset('assets/css/vendor/bootstrap.min.css')}}">
      <link rel="stylesheet" href="{{ asset('assets/css/custom/main.css')}}">
      <link rel="stylesheet" href="{{ asset('assets/css/custom/index.css')}}">
      <link rel="stylesheet" href="{{ asset('assets/css/custom/user-form.css')}}">
</head>
<body>
      {{-- login-and-register-form --}}
      <section class="user-form-part">
         <div class="user-form-banner">
            <div class="user-form-content">
               <a href="#"><img src="{{asset('assets/images/logo.png')}}" alt="logo"></a>
               <h1>Advertise your assets <span>Buy what are you needs.</span></h1>
               <p>Biggest Online Advertising Marketplace in the World.</p>
            </div>
         </div>
         <div class="user-form-category">
            <div class="user-form-header"><a href="#"><img src="{{asset('assets/images/logo.png')}}" alt="logo"></a><a href="index.html"><i class="fas fa-arrow-left"></i></a></div>
            <div class="user-form-category-btn">
               <ul class="nav nav-tabs">
                  <li><a href="#login-tab" class="nav-link active" data-toggle="tab">sign in</a></li>
                  <li><a href="#register-tab" class="nav-link" data-toggle="tab">sign up</a></li>
               </ul>
            </div>
            <div class="tab-pane active" id="login-tab">
               <div class="user-form-title">
                  <h2>Welcome!</h2>
                  <p>Use credentials to access your account.</p>
               </div>
               <form method="POST" action="{{ route('login') }}">
                @csrf
                  <div class="row">
                     <div class="col-12">
                        <div class="form-group">
                            <input type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ old('email') }}" required>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                     </div>
                     <div class="col-12">
                        <div class="form-group">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="pass" placeholder="Password" required>
                            <button type="button" class="form-icon"><i class="eye fas fa-eye"></i>
                            </button>
                            @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                     </div>
                     </div>
                     <div class="col-6">
                        <div class="form-group">
                           <div class="custom-control custom-checkbox">
                               <input type="checkbox" name="remember" id="remember" class="custom-control-input" {{ old('remember') ? 'checked' : '' }}>
                               <label class="custom-control-label" for="remember">{{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                     </div>
                     @if (Route::has('password.request'))
                     <div class="col-6">
                        <div class="form-group text-right"><a href="{{ route('password.request') }}" class="form-forgot">{{ __('Forgot Your Password?') }}</a></div>
                     </div>
                     @endif
                     <div class="col-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-inline"><i class="fas fa-unlock"></i><span>Enter your account</span>
                            </button>
                        </div>
                     </div>
                  </div>
               </form>
               <div class="user-form-direction">
                  <p>Don't have an account? click on the <span>( sign up )</span>button above.</p>
               </div>
            </div>
            <div class="tab-pane" id="register-tab">
                <div class="user-form-title">
                   <h2>Register</h2>
                   <p>Setup a new account in a minute.</p>
                </div>
                <ul class="user-form-option">
                   <li><a href="#"><i class="fab fa-facebook-f"></i><span>facebook</span></a></li>
                   <li><a href="#"><i class="fab fa-twitter"></i><span>twitter</span></a></li>
                   <li><a href="#"><i class="fab fa-google"></i><span>google</span></a></li>
                </ul>
                <div class="user-form-devider">
                   <p>or</p>
                </div>
                <form method="POST" action="{{ route('register') }}">
                 @csrf
                   <div class="row">
                      <div class="col-12">
                         <div class="form-group">
                             <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Name" value="{{ old('name') }}">
                             @error('name')
                             <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                             </span>
                              @enderror
                         </div>
                      </div>
                      <div class="col-12">
                         <div class="form-group">
                             <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter Email" value="{{ old('email') }}" required>
                             @error('email')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                             @enderror
                             
                         </div>
                      </div>
                      <div class="col-12">
                         <div class="form-group">
                             <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required autocomplete="new-password">
                             <button class="form-icon d-none"><i class="eye fas fa-eye"></i></button>
                             @error('password')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                             @enderror
                         </div>
                      </div>
                      <div class="col-12">
                         <div class="form-group">
                             <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                             <button class="form-icon">
                                 <i class="eye fas fa-eye"></i>
                             </button>
                         </div>
                      </div>
                      <div class="col-12">
                         <div class="form-group">
                             <button type="submit" class="btn btn-inline"><i class="fas fa-user-check"></i>
                                 <span>Create new account</span>
                             </button>
                         </div>
                      </div>
                   </div>
                </form>
                <div class="user-form-direction">
                   <p>Already have an account? click on the <span>( sign in )</span>button above.</p>
                </div>
             </div>
         </div>
      </section>

      <script src="{{ asset('assets/js/vendor/jquery-1.12.4.min.js')}}"></script>
      <script src="{{ asset('assets/js/vendor/popper.min.js')}}"></script>
      <script src="{{ asset('assets/js/vendor/bootstrap.min.js ')}}"></script>
      <script src="{{ asset('assets/js/vendor/slick.min.js')}}"></script>
      <script src="{{ asset('assets/js/custom/slick.js')}}"></script>
      <script src="{{ asset('assets/js/custom/main.js ')}}"></script>
      @yield('js')
   </body>
   </html>
   
