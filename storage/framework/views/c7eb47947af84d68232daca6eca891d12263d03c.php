<!DOCTYPE html>
<html lang="en">


<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?php echo e(asset('adminpanel/assets/vendors/mdi/css/materialdesignicons.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('adminpanel/assets/vendors/flag-icon-css/css/flag-icon.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('adminpanel/assets/vendors/css/vendor.bundle.base.css')); ?>">
    <!-- endinject -->

    <link rel="stylesheet" href="<?php echo e(asset('adminpanel/assets/vendors/select2/select2.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('adminpanel/assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css')); ?>">

    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="<?php echo e(asset('adminpanel/assets/vendors/jquery-bar-rating/css-stars.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('adminpanel/assets/vendors/font-awesome/css/font-awesome.min.css')); ?>">
    <!-- End plugin css for this page -->


      <!-- Plugin css for this page -->
      <link rel="stylesheet" href="<?php echo e(asset('adminpanel/assets/vendors/dropzone/dropzone.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('adminpanel/assets/vendors/font-awesome/css/font-awesome.min.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('adminpanel/assets/vendors/jquery-bar-rating/bars-1to10.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('adminpanel/assets/vendors/jquery-bar-rating/bars-horizontal.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('adminpanel/assets/vendors/jquery-bar-rating/bars-movie.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('adminpanel/assets/vendors/jquery-bar-rating/bars-pill.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('adminpanel/assets/vendors/jquery-bar-rating/bars-reversed.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('adminpanel/assets/vendors/jquery-bar-rating/bars-square.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('adminpanel/assets/vendors/jquery-bar-rating/bootstrap-stars.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('adminpanel/assets/vendors/jquery-bar-rating/css-stars.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('adminpanel/assets/vendors/jquery-bar-rating/examples.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('adminpanel/assets/vendors/jquery-bar-rating/fontawesome-stars-o.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('adminpanel/assets/vendors/jquery-bar-rating/fontawesome-stars.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('adminpanel/assets/vendors/jquery-asColorPicker/css/asColorPicker.min.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('adminpanel/assets/vendors/x-editable/bootstrap-editable.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('adminpanel/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('adminpanel/assets/vendors/dropify/dropify.min.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('adminpanel/assets/vendors/jquery-file-upload/uploadfile.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('adminpanel/assets/vendors/jquery-tags-input/jquery.tagsinput.min.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('adminpanel/assets/vendors/tempusdominus-bootstrap-4/tempusdominus-bootstrap-4.min.css')); ?>">
      <!-- End plugin css for this page -->





    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="<?php echo e(asset('adminpanel/assets/css/demo_1/style.css')); ?>">
    <!-- End layout styles -->

    <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(asset('adminpanel/assets/images/favicon.ico')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('adminpanel/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css')); ?>">


</head>
  <body>
    <div class="container-scroller">
        
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            
            <li class="nav-item pt-3">
              <a class="nav-link d-block" href="<?php echo e(url('/vendor/dashboard')); ?>">
                <img class="sidebar-brand-logo" src="<?php echo e(asset('adminpanel/assets/images/logo.png')); ?>"  alt="" width="100%" height="50px;">
                
                
              </a>
              
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="<?php echo e(url('/vendor/dashboard')); ?>">
                <i class="mdi mdi-view-dashboard menu-icon"></i>
                <span class="menu-title">Dashboard</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#variations" aria-expanded="false" aria-controls="apps">
                <i class="mdi mdi-white-balance-iridescent menu-icon"></i>
                <span class="menu-title">Variations</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="variations">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="<?php echo e(url('/vendor/variation')); ?>">Variations </a></li>
                  <li class="nav-item"> <a class="nav-link" href="<?php echo e(url('/vendor/variation-items')); ?>">Variations Items</a></li>
                </ul>
              </div>
            </li>


            <li class="nav-item">
              <a class="nav-link" href="<?php echo e(url('/vendor/products')); ?>">
                <i class="mdi mdi-account-multiple-plus menu-icon"></i>
                <span class="menu-title">Products</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="<?php echo e(url('/')); ?>">
                <i class="mdi mdi-cart menu-icon"></i>
                <span class="menu-title">Orders</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="<?php echo e(url('/')); ?>">
                <i class="mdi mdi-keyboard-return menu-icon"></i>
                <span class="menu-title">Return Orders</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="<?php echo e(url('/')); ?>">
                <i class="mdi mdi-currency-inr menu-icon"></i>
                <span class="menu-title">Payout request</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="<?php echo e(url('/')); ?>">
                <i class="mdi mdi-currency-inr menu-icon"></i>
                <span class="menu-title">Shop settings</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#Setting" aria-expanded="false" aria-controls="apps">
                <i class="mdi mdi-settings menu-icon"></i>
                <span class="menu-title">Setting</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="Setting">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="<?php echo e(url('/admin/changepassword')); ?>">Change Password</a></li>
                  <li class="nav-item"> <a class="nav-link" href="<?php echo e(url('/admin/logout')); ?>">Logout</a></li>
                </ul>
              </div>
            </li>

          </ul>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">


          <!-- partial -->

          <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="navbar-menu-wrapper d-flex align-items-stretch">

              <ul class="navbar-nav">
                <li class="nav-item dropdown">
                  <a class="nav-link" id="messageDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="mdi mdi-email-outline"></i>
                  </a>
                  <div class="dropdown-menu dropdown-menu-left navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                    <h6 class="p-3 mb-0 font-weight-semibold">Messages</h6>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item preview-item">
                      <div class="preview-thumbnail">
                        
                      </div>
                      <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                        <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Mark send you a message</h6>
                        <p class="text-gray mb-0"> 1 Minutes ago </p>
                      </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item preview-item">
                      <div class="preview-thumbnail">
                        
                      </div>
                      <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                        <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Cregh send you a message</h6>
                        <p class="text-gray mb-0"> 15 Minutes ago </p>
                      </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item preview-item">
                      <div class="preview-thumbnail">
                        
                      </div>
                      <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                        <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Profile picture updated</h6>
                        <p class="text-gray mb-0"> 18 Minutes ago </p>
                      </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <h6 class="p-3 mb-0 text-center text-primary font-13">4 new messages</h6>
                  </div>
                </li>
                <li class="nav-item dropdown ms-3">
                  <a class="nav-link" id="notificationDropdown" href="#" data-bs-toggle="dropdown">
                    <i class="mdi mdi-bell-outline"></i>
                  </a>
                  <div class="dropdown-menu dropdown-menu-left navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                    <h6 class="px-3 py-3 font-weight-semibold mb-0">Notifications</h6>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item preview-item">
                      <div class="preview-thumbnail">
                        <div class="preview-icon bg-success">
                          <i class="mdi mdi-calendar"></i>
                        </div>
                      </div>
                      <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                        <h6 class="preview-subject font-weight-normal mb-0">New order recieved</h6>
                        <p class="text-gray ellipsis mb-0"> 45 sec ago </p>
                      </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item preview-item">
                      <div class="preview-thumbnail">
                        <div class="preview-icon bg-warning">
                          <i class="mdi mdi-settings"></i>
                        </div>
                      </div>
                      <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                        <h6 class="preview-subject font-weight-normal mb-0">Server limit reached</h6>
                        <p class="text-gray ellipsis mb-0"> 55 sec ago </p>
                      </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item preview-item">
                      <div class="preview-thumbnail">
                        <div class="preview-icon bg-info">
                          <i class="mdi mdi-link-variant"></i>
                        </div>
                      </div>
                      <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                        <h6 class="preview-subject font-weight-normal mb-0">Kevin karvelle</h6>
                        <p class="text-gray ellipsis mb-0"> 11:09 PM </p>
                      </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <h6 class="p-3 font-13 mb-0 text-primary text-center">View all notifications</h6>
                  </div>
                </li>
              </ul>
             <ul class="navbar-nav navbar-nav-right">

                <li class="nav-item nav-logout d-none d-lg-block">
                  <a class="nav-link" href="<?php echo e(url('/admin/logout')); ?>">
                    <i class="mdi mdi-logout-variant"></i>
                  </a>
                </li>
              </ul>
              <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                <span class="mdi mdi-menu"></span>
              </button>
            </div>
          </nav>
          <!-- partial -->





          <?php echo $__env->yieldContent('content'); ?>






        </div>
        <!-- page-body-wrapper ends -->
      </div>
      <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="<?php echo e(asset('adminpanel/assets/vendors/js/vendor.bundle.base.js')); ?>"></script>
    <!-- endinject -->
    <script src="<?php echo e(asset('adminpanel/assets/vendors/jquery-validation/jquery.validate.min.js')); ?>"></script>
    <script src="<?php echo e(asset('adminpanel/assets/vendors/bootstrap-maxlength/bootstrap-maxlength.min.js')); ?>"></script>



    <!-- Plugin js for this page -->
    <script src="<?php echo e(asset('adminpanel/assets/vendors/jquery-bar-rating/jquery.barrating.min.js')); ?>"></script>
    <script src="<?php echo e(asset('adminpanel/assets/vendors/chart.js/Chart.min.js')); ?>"></script>
    <script src="<?php echo e(asset('adminpanel/assets/vendors/flot/jquery.flot.js')); ?>"></script>
    <script src="<?php echo e(asset('adminpanel/assets/vendors/flot/jquery.flot.resize.js')); ?>"></script>
    <script src="<?php echo e(asset('adminpanel/assets/vendors/flot/jquery.flot.categories.js')); ?>"></script>
    <script src="<?php echo e(asset('adminpanel/assets/vendors/flot/jquery.flot.fillbetween.js')); ?>"></script>
    <script src="<?php echo e(asset('adminpanel/assets/vendors/flot/jquery.flot.stack.js')); ?>"></script>
    <script src="<?php echo e(asset('adminpanel/assets/js/jquery.cookie.js')); ?>" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="<?php echo e(asset('adminpanel/assets/js/off-canvas.js')); ?>"></script>
    <script src="<?php echo e(asset('adminpanel/assets/js/hoverable-collapse.js')); ?>"></script>
    <script src="<?php echo e(asset('adminpanel/assets/js/misc.js')); ?>"></script>
    <script src="<?php echo e(asset('adminpanel/assets/js/settings.js')); ?>"></script>
    <script src="<?php echo e(asset('adminpanel/assets/js/todolist.js')); ?>"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="<?php echo e(asset('adminpanel/assets/js/dashboard.js')); ?>"></script>
    <!-- End custom js for this page -->
    <script src="<?php echo e(asset('adminpanel/assets/js/data-table.js')); ?>"></script>

    <!-- Plugin js for this page -->
    <script src="<?php echo e(asset('adminpanel/assets/vendors/datatables.net/jquery.dataTables.js')); ?>"></script>
    <script src="<?php echo e(asset('adminpanel/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js')); ?>"></script>
    <!-- End plugin js for this page -->

    <!-- Custom js for this page -->
    
    <script src="<?php echo e(asset('adminpanel/assets/js/bt-maxLength.js')); ?>"></script>

    <script src="<?php echo e(asset('adminpanel/assets/vendors/select2/select2.min.js')); ?>"></script>
    <script src="<?php echo e(asset('adminpanel/assets/vendors/typeahead.js/typeahead.bundle.min.js')); ?>"></script>

    <script src="<?php echo e(asset('adminpanel/assets/js/typeahead.js')); ?>"></script>
    <script src="<?php echo e(asset('adminpanel/assets/js/select2.js')); ?>"></script>


    <!-- Plugin js for this page -->
    <script src="<?php echo e(asset('adminpanel/assets/vendors/jquery-bar-rating/jquery.barrating.min.js')); ?>"></script>
    <script src="<?php echo e(asset('adminpanel/assets/vendors/jquery-asColor/jquery-asColor.min.js')); ?>"></script>
    <script src="<?php echo e(asset('adminpanel/assets/vendors/jquery-asGradient/jquery-asGradient.min.js')); ?>"></script>
    <script src="<?php echo e(asset('adminpanel/assets/vendors/jquery-asColorPicker/jquery-asColorPicker.min.js')); ?>"></script>
    <script src="<?php echo e(asset('adminpanel/assets/vendors/x-editable/bootstrap-editable.min.js')); ?>"></script>
    <script src="<?php echo e(asset('adminpanel/assets/vendors/moment/moment.min.js')); ?>"></script>
    <script src="<?php echo e(asset('adminpanel/assets/vendors/tempusdominus-bootstrap-4/tempusdominus-bootstrap-4.js')); ?>"></script>
    <script src="<?php echo e(asset('adminpanel/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')); ?>"></script>
    <script src="<?php echo e(asset('adminpanel/assets/vendors/dropify/dropify.min.js')); ?>"></script>
    <script src="<?php echo e(asset('adminpanel/assets/vendors/jquery-file-upload/jquery.uploadfile.min.js')); ?>"></script>
    <script src="<?php echo e(asset('adminpanel/assets/vendors/jquery-tags-input/jquery.tagsinput.min.js')); ?>"></script>
    <script src="<?php echo e(asset('adminpanel/assets/vendors/dropzone/dropzone.js')); ?>"></script>
    <script src="<?php echo e(asset('adminpanel/assets/vendors/jquery.repeater/jquery.repeater.min.js')); ?>"></script>
    <script src="<?php echo e(asset('adminpanel/assets/vendors/inputmask/jquery.inputmask.bundle.js')); ?>"></script>
    <!-- End plugin js for this page -->

    <!-- Custom js for this page -->
    <script src="<?php echo e(asset('adminpanel/assets/js/formpickers.js')); ?>"></script>
    <script src="<?php echo e(asset('adminpanel/assets/js/form-addons.js')); ?>"></script>
    <script src="<?php echo e(asset('adminpanel/assets/js/x-editable.js')); ?>"></script>
    <script src="<?php echo e(asset('adminpanel/assets/js/dropify.js')); ?>"></script>
    <script src="<?php echo e(asset('adminpanel/assets/js/dropzone.js')); ?>"></script>
    <script src="<?php echo e(asset('adminpanel/assets/js/jquery-file-upload.js')); ?>"></script>
    <script src="<?php echo e(asset('adminpanel/assets/js/formpickers.js')); ?>"></script>
    <script src="<?php echo e(asset('adminpanel/assets/js/form-repeater.js')); ?>"></script>
    <script src="<?php echo e(asset('adminpanel/assets/js/inputmask.js')); ?>"></script>
    <!-- End custom js for this page -->


    <script src="//cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>




   <?php echo $__env->yieldPushContent('scripts'); ?>
  </body>

</html>
<?php /**PATH E:\webdev\hemchhaya\resources\views/layouts/vendor.blade.php ENDPATH**/ ?>