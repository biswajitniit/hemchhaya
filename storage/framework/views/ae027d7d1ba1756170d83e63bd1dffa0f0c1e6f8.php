<?php $__env->startSection('title', 'Dashboard'); ?>
<?php $__env->startSection('content'); ?>

<div class="main-panel">
    <div class="content-wrapper pb-0">
        <!-- table row starts here -->
        <div class="row">
            <div class="col-xl-4 grid-margin">
                <div class="card stretch-card mb-3 ">
                    <div class="card-body d-flex flex-wrap justify-content-between">
                      <div>
                        <h4 class="font-weight-semibold mb-1 text-black">Total Orders</h4>
                        <h6 class="text-muted">Average Weekly Profit</h6>
                      </div>
                      <h3 class="text-success font-weight-bold">+168.900</h3>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 grid-margin">
                <div class="card stretch-card mb-3">
                    <div class="card-body d-flex flex-wrap justify-content-between">
                      <div>
                        <h4 class="font-weight-semibold mb-1 text-black">Total Return Orders</h4>
                        <h6 class="text-muted">Average Weekly Profit</h6>
                      </div>
                      <h3 class="text-success font-weight-bold">+168.900</h3>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 grid-margin">
                <div class="card stretch-card mb-3">
                    <div class="card-body d-flex flex-wrap justify-content-between">
                      <div>
                        <h4 class="font-weight-semibold mb-1 text-black">Total Cancelled Orders</h4>
                        <h6 class="text-muted">Average Weekly Profit</h6>
                      </div>
                      <h3 class="text-success font-weight-bold">+168.900</h3>
                    </div>
                </div>
            </div>
        </div>
        <!-- doughnut chart row starts -->

       <!-- doughnut chart row starts -->
        <div class="row">
            <div class="col-sm-12 stretch-card grid-margin">
                <div class="card">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card border-0">
                                <div class="card-body">
                                    <div class="card-title">Last 6 Months Sales</div>
                                    <div class="d-flex flex-wrap">
                                        <div class="doughnut-wrapper w-50">
                                            <canvas id="doughnutChart2" width="100" height="100"></canvas>
                                        </div>
                                        <div id="doughnut-chart-legend2" class="pl-lg-3 rounded-legend align-self-center flex-grow legend-vertical legend-bottom-left"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8 stretch-card grid-margin">
                            <div class="card border-0">
                              <div class="card-body">
                                <div class="d-flex justify-content-between">
                                  <div class="card-title">MONTHLY ORDERS <small class="d-block text-muted">Jan - June</small>
                                  </div>
                                  
                                </div>
                                
                                <div class="bar-chart-wrapper">
                                  <canvas id="barchart" height="80"></canvas>
                                </div>
                              </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- last row starts here -->




    </div>

    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © <?php echo e(date('Y')); ?> <a href="<?php echo e(url('/')); ?>" target="_blank">Hemchhaya</a>. All rights reserved.</span>
            
        </div>
    </footer>
    <!-- partial -->
</div>
<!-- main-panel ends -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.vendor', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\webdev\hemchhaya\resources\views/vendor/dashboard/index.blade.php ENDPATH**/ ?>