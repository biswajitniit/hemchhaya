@extends('layouts.vendor')
@section('title', 'Dashboard')
@section('content')

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
                                  {{-- <div class="d-flex text-muted font-20">
                                    <i class="mdi mdi-printer mouse-pointer"></i>
                                    <i class="mdi mdi-help-circle-outline ms-2 mouse-pointer"></i>
                                  </div> --}}
                                </div>
                                {{-- <h3 class="font-weight-bold mb-0">0.40% <span class="text-success h5">0.20%<i class="mdi mdi-arrow-up"></i></span></h3>
                                <span class="text-muted font-13">Avg customers/Day</span> --}}
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
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © {{ date('Y') }} <a href="{{ url('/') }}" target="_blank">Hemchhaya</a>. All rights reserved.</span>
            {{-- <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i></span> --}}
        </div>
    </footer>
    <!-- partial -->
</div>
<!-- main-panel ends -->

@endsection
