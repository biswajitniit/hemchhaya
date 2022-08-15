@extends('layouts.admin')
@section('title', 'Category Listing')
@section('content')



<div class="main-panel">
    <div class="content-wrapper">
      {{--<div class="page-header">
        <h3 class="page-title"> Category table </h3>
         <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Tables</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data table</li>
          </ol>
        </nav>
      </div>--}}

      <div class="page-header flex-wrap">
        <div class="header-left">
          {{-- <button class="btn btn-primary mb-2 mb-md-0 me-2">Create new document</button>
          <button class="btn btn-outline-primary bg-white mb-2 mb-md-0">Import documents</button> --}}
        </div>
        <div class="header-right d-flex flex-wrap mt-2 mt-sm-0">

          <button type="button" class="btn btn-primary mt-2 mt-sm-0 btn-icon-text">
            <i class="mdi mdi-plus-circle"></i> Add Category </button>
        </div>
      </div>


      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Category table</h4>
          <div class="row">
            <div class="col-12">
              <div class="table-responsive">
                <table id="order_listing" class="table">
                  <thead>
                    <tr>
                      <th>Order #</th>
                      <th>Purchased On</th>
                      <th>Customer</th>
                      <th>Ship to</th>
                      <th>Base Price</th>
                      <th>Purchased Price</th>
                      <th>Status</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>

                    <tr>
                      <td>1</td>
                      <td>2012/08/03</td>
                      <td>Edinburgh</td>
                      <td>New York</td>
                      <td>$1500</td>
                      <td>$3200</td>
                      <td>
                        <label class="badge badge-info">On hold</label>
                      </td>
                      <td>
                        <button class="btn btn-outline-primary">View</button>
                      </td>
                    </tr>

                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:../../partials/_footer.html -->
    <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © {{ date('Y') }} <a href="{{ url('/') }}" target="_blank">Hemchhaya</a>. All rights reserved.</span>
        </div>
    </footer>
    <!-- partial -->
  </div>
  <!-- main-panel ends -->

@push('scripts')
    <script>
        $(document).ready(function(){
            var leadDataTable = $('#order_listing').DataTable({
                order: [[0, "desc" ]],
                'processing': true,
                'destroy': true,
                'serverSide': true,
                'serverMethod': 'post',
                'pageLength': '10',
                'lengthMenu': [ [10, 20, 50], [10, 20, 50] ],
                'searching': true,
                "ordering": true,
                'ajax': {
                    //url:'https://cmp.centuryply.com/referrercrm/admin/dashboard/getAllFolowUpdataWithFilter/'+$('#relationship_manager_id').val()+'/'+$('#follow_up_date_filer').val()+'',
                    'data': function(data){

                    }
                },
                'columns':[
                    { data: 'architectName' },
                    { data: 'rm_name' },
                    { data: 'firstMeeting' },
                    { data: 'lastcaller' },
                    { data: 'firm_name' },
                    { data: 'firm_city' },
                    { data: 'date_of_next_call' },
                    {
                            data: 'meeting_note',
                            render: function (data, type, row){

                                return '<a href="javascript:void(0)" onclick="get_meeting_note(\'' +data.userid.trimLeft()+'\',\''+data.arti_name.replace(/[&\/\\#,+()$~%.'":*?<>{}]/g, '')+'\',\''+data.art_firm_name.replace(/[&\/\\#,+()$~%.'":*?<>{}]/g, '')+'\',\''+data.art_mobile.replace(/[&\/\\#,+()$~%.'":*?<>{}]/g, '')+'\')">View</a>';
                            },
                    },
                    { data: 'dispositions_msg' },
                    { data: 'action' },
                    { data: 'telicaller_name' },
                ],
                'columnDefs': [ {
                    'targets': [0,1,2,3,4,5,6,7,8,9,10],
                    'orderable': false,
                }]

            });
        });
    </script>
@endpush
@endsection
