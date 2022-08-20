<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from www.bootstrapdash.com/demo/plus/jquery/template/demo_1/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Aug 2022 10:53:43 GMT -->
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
            <a class="nav-link d-block" href="<?php echo e(url('/admin/dashboard')); ?>">
              <img class="sidebar-brand-logo" src="<?php echo e(asset('adminpanel/assets/images/logo.png')); ?>"  alt="" width="100%" height="50px;">
              
              
            </a>
            
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="<?php echo e(url('/')); ?>">
              <i class="mdi mdi-view-dashboard menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>

          <li class="nav-item <?php if(Request::segment(2) == "category"): ?> active <?php elseif(Request::segment(2) == "sub-category"): ?>  active <?php elseif(Request::segment(2) == "sub-category-item"): ?> <?php endif; ?> ">
            <a class="nav-link" data-bs-toggle="collapse" href="#menulist" aria-expanded="false" aria-controls="apps">
              <i class="mdi mdi-menu menu-icon"></i>
              <span class="menu-title">Menu</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="menulist">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?php echo e(url('/admin/category')); ?>">Category</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo e(url('/admin/sub-category')); ?>">Sub Category</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo e(url('/admin/sub-category-item')); ?>">Sub Category Item</a></li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#Attribute" aria-expanded="false" aria-controls="apps">
              <i class="mdi mdi-layers menu-icon"></i>
              <span class="menu-title">Attribute</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="Attribute">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?php echo e(url('/admin/attribute')); ?>">Attribute</a></li>
                
                <li class="nav-item"> <a class="nav-link" href="<?php echo e(url('/admin/brands')); ?>">Brands</a></li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#HPS" aria-expanded="false" aria-controls="apps">
              <i class="mdi mdi-menu menu-icon"></i>
              <span class="menu-title">Home page settings</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="HPS">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="">Sliders</a></li>
                <li class="nav-item"> <a class="nav-link" href="">Top Banner</a></li>
                <li class="nav-item"> <a class="nav-link" href="">Large Banner</a></li>
                <li class="nav-item"> <a class="nav-link" href="">Left Banner</a></li>
                <li class="nav-item"> <a class="nav-link" href="">Bottom Banner</a></li>
                <li class="nav-item"> <a class="nav-link" href="">Popup Banner</a></li>
              </ul>
            </div>
          </li>


          <li class="nav-item">
            <a class="nav-link" href="<?php echo e(url('/')); ?>">
              <i class="mdi mdi-account-multiple-plus menu-icon"></i>
              <span class="menu-title">Vendors</span>
            </a>
          </li>


          <li class="nav-item">
            <a class="nav-link" href="<?php echo e(url('/')); ?>">
              <i class="mdi mdi-account-multiple-outline menu-icon"></i>
              <span class="menu-title">Customers</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="<?php echo e(url('/')); ?>">
              <i class="mdi mdi-currency-inr menu-icon"></i>
              <span class="menu-title">Payments</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="<?php echo e(url('/')); ?>">
              <i class="mdi mdi-gift menu-icon"></i>
              <span class="menu-title">Coupons</span>
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
              <span class="menu-title">Return Conditions</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="<?php echo e(url('/')); ?>">
              <i class="mdi mdi-credit-card menu-icon"></i>
              <span class="menu-title">Payout request</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="<?php echo e(url('/')); ?>">
              <i class="mdi mdi-comment-question-outline menu-icon"></i>
              <span class="menu-title">Help</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="<?php echo e(url('/')); ?>">
              <i class="mdi mdi-bookmark-check menu-icon"></i>
              <span class="menu-title">Subscribers</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#cmspage" aria-expanded="false" aria-controls="apps">
              <i class="mdi mdi-menu menu-icon"></i>
              <span class="menu-title">CMS Pages</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="cmspage">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?php echo e(url('/')); ?>">About</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo e(url('/')); ?>">Privacy policy</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo e(url('/')); ?>">Terms Conditions</a></li>
              </ul>
            </div>
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
        <!-- partial:partials/_settings-panel.html -->
        <div id="settings-trigger"><i class="mdi mdi-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close mdi mdi-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-default-theme">
            <div class="img-ss rounded-circle bg-light border me-3"></div>Default
          </div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme">
            <div class="img-ss rounded-circle bg-dark border me-3"></div>Dark
          </div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles default primary"></div>
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles light"></div>
          </div>
        </div>
        <!-- partial -->
        <!-- partial:partials/_navbar.html -->
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
                      <img src="../assets/images/faces/face1.jpg" alt="image" class="profile-pic">
                    </div>
                    <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                      <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Mark send you a message</h6>
                      <p class="text-gray mb-0"> 1 Minutes ago </p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <img src="../assets/images/faces/face6.jpg" alt="image" class="profile-pic">
                    </div>
                    <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                      <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Cregh send you a message</h6>
                      <p class="text-gray mb-0"> 15 Minutes ago </p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <img src="../assets/images/faces/face7.jpg" alt="image" class="profile-pic">
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

    <?php echo $__env->yieldPushContent('scripts'); ?>

  </body>

</html>
<?php /**PATH E:\webdev\hemchhaya\resources\views/layouts/admin.blade.php ENDPATH**/ ?>