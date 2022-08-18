<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Hemchhaya Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('adminpanel/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminpanel/assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminpanel/assets/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('adminpanel/assets/css/demo_1/style.css') }}">
    <!-- End layout styles -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('adminpanel/assets/images/favicon.ico') }}">
  </head>
  <body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
          <div class="content-wrapper d-flex align-items-center auth">
            <div class="row flex-grow">
              <div class="col-lg-4 mx-auto">
                <div class="auth-form-light text-left p-5">
                  <div class="brand-logo">
                    {{-- <img src="https://www.bootstrapdash.com/demo/plus/jquery/template/assets/images/logo.svg"> --}}
                    <img src="{{ asset('adminpanel/assets/images/logo.png') }}">

                  </div>
                  <h4>Sign in to continue.</h4>
                  {{-- <h6 class="font-weight-light">Sign in to continue.</h6> --}}
                  <form action="{{ route('adminLoginPost') }}" name="adminlogin" id="adminlogin" class="pt-3" method="POST">
                    @csrf
                    <div class="form-group">
                      <input type="email" class="form-control form-control-lg" name="email" id="exampleInputEmail1" placeholder="Email">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-lg" name="password" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <div class="my-2 d-flex justify-content-between align-items-center">
                        <div class="form-check">
                          <label class="form-check-label text-muted">
                            <input type="checkbox" class="form-check-input"> Keep me signed in </label>
                        </div>

                      </div>
                    <div class="mt-3">
                      <button class="btn btn-block btn-primary btn-lg font-weight-semibold auth-form-btn">SIGN IN</button>
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
    <script src="{{ asset('adminpanel/assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('adminpanel/assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('adminpanel/assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('adminpanel/assets/js/misc.js') }}"></script>
    <script src="{{ asset('adminpanel/assets/js/settings.js') }}"></script>
    <script src="{{ asset('adminpanel/assets/js/todolist.js') }}"></script>
    <!-- endinject -->
  </body>

</html>
