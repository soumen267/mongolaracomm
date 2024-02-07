<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from www.urbanui.com/melody/template/pages/samples/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 15 Sep 2018 06:08:53 GMT -->
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Login</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset("assets/vendors/iconfonts/font-awesome/css/all.min.css") }}">
  <link rel="stylesheet" href="{{ asset("assets/vendors/css/vendor.bundle.base.css") }}">
  <link rel="stylesheet" href="{{ asset("assets/vendors/css/vendor.bundle.addons.css") }}">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset("assets/css/style.css") }}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ asset("assets/images/favicon.png") }}" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left p-5">
              <div class="brand-logo">
                <img src="{{ asset("assets/images/logo.svg") }}" alt="logo">
              </div>
              <h4>Hello! let's get started</h4>
              <h6 class="font-weight-light">Sign in to continue.</h6>
              <form class="pt-3" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                  <input id="email" type="email" class="form-control  form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
                  @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="form-group">
                  <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                  @error('password')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">
                        {{ __('SIGN IN') }}
                    </button>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                      Keep me signed in
                    </label>
                  </div>
                  @if (Route::has('password.request'))
                       <a class="auth-link text-black" href="{{ route('password.request') }}">
                           {{ __('Forgot password?') }}
                        </a>
                  @endif
                </div>
                <div class="mb-2">
                  <button type="button" class="btn btn-block btn-facebook auth-form-btn">
                    <i class="fab fa-facebook-f mr-2"></i>Connect using facebook
                  </button>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Don't have an account? 
                  <a class="text-primary" href="{{ route('register') }}">{{ __('Register') }}</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="{{ asset("assets/vendors/js/vendor.bundle.base.js") }}"></script>
  <script src="{{ asset("assets/vendors/js/vendor.bundle.addons.js") }}"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="{{ asset("assets/js/off-canvas.js") }}"></script>
  <script src="{{ asset("assets/js/hoverable-collapse.js") }}"></script>
  <script src="{{ asset("assets/js/misc.js") }}"></script>
  <script src="{{ asset("assets/js/settings.js") }}"></script>
  <script src="{{ asset("assets/js/todolist.js") }}"></script>
  <!-- endinject -->
</body>


<!-- Mirrored from www.urbanui.com/melody/template/pages/samples/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 15 Sep 2018 06:08:53 GMT -->
</html>