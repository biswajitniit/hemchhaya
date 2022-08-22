@extends('layouts.vendor')
@section('title', 'Dashboard')
@section('content')





<div class="main-panel">
    <div class="content-wrapper pb-0">

      <!-- table row starts here -->
      <div class="row ">
        <div class="col-xl-4 grid-margin">
          <div class="card card-stat stretch-card mb-3">
            <div class="card-body">
              <div class="d-flex justify-content-between">
                <div class="text-white">
                  <h3 class="font-weight-bold mb-0">$168.90</h3>
                  <h6>This Month</h6>
                  <div class="badge badge-danger">23%</div>
                </div>
                <div class="flot-bar-wrapper">
                  <div id="column-chart" class="flot-chart"></div>
                </div>
              </div>
            </div>


          </div>

        </div>

      </div>
      <!-- doughnut chart row starts -->

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
