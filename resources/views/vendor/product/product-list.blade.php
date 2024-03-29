@extends('layouts.vendor')
@section('title', 'Product Listing')
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
          <button type="button" onclick="location.href='{{ route('vendor.add-product-category') }}'" class="btn btn-primary mt-2 mt-sm-0 btn-icon-text">
            <i class="mdi mdi-plus-circle"></i> Add Product</button>
        </div>
      </div>

      @if(session()->has('message'))
            <div class="alert alert-danger">
                {{ session()->get('message') }}
            </div>
      @endif


      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Product table</h4>
          <div class="row">
            <div class="col-12">
              <div class="table-responsive">
                <table class="table table-bordered table-striped mb-none" id="my-table">
                  <thead>
                    <tr>
                      <th>Category Name</th>
                      <th>Sub Category Name</th>
                      <th>Sub Category Item Name</th>
                      <th>Product Information</th>
                      {{--<th>Current Stock</th> --}}
                      <th>Stock</th>
                    </tr>
                  </thead>

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
    <script type="text/javascript">
        $(".alert").delay(2000).slideUp(200, function () {
            $(this).alert('close');
        });


        $(document).ready(function(){
        // DataTable
            $('#my-table').DataTable({
                processing: true,
                serverSide: true,
                lengthMenu: [[100, 200, 300], [100, 200, 300]],
                order: [[ 0, "asc" ]],
                columnDefs: [{
                    "searchable": true,
                    "orderable": false,
                    "targets": 0
                }],
                "ajax": {
                    data: ({_token: '{{csrf_token()}}'}),
                    url : "{{url('/')}}/getvendorproduct",
                    type : 'GET',
                },
                columns: [
                         {data: 'category_name' },
                         {data: 'sub_category_name'},
                         {data: 'sub_category_item_name'},
                         {
                            data: 'product_info',
                            render: function (data, type, row){
                                return '<img src="'+data.frontimage+'" /></br><p>Name : '+data.name+'</p></br><p>SKU : '+data.skuid+'</p>';
                                //return '<img src="'+data.frontimage+'" />';
                            },
                        },
                        // {
                        //     data: 'status',
                        //     render: function (data, type, row){
                        //         if(data == "Active"){
                        //             return '<label class="badge badge-success">Active</label>';
                        //         }else{
                        //             return '<label class="badge badge-danger">In Active</label>';
                        //         }
                        //     },
                        // },

                        {
                            data: 'stock',
                            render: function (data, type, row){
                                return '<input type="textbox" name="stockqty" value="'+data.stock+'">';
                            },
                        },
                    //    {
                    //         data: 'action',
                    //         render: function (data, type, row){
                    //             return '<a href="add-product?catid='+data.catid+'&subcatid='+data.subcatid+'&subcatitemid='+data.subcatitemid+'&pid='+data.pid+'" class="btn btn-primary">Make Copy</a>';
                    //         },
                    //     },

                        // {
                        //     data: 'action',
                        //     render: function (data, type, row){
                        //         return '<a href="add-product?catid='+data.catid+'&subcatid='+data.subcatid+'&subcatitemid='+data.subcatitemid+'&pid='+data.pid+'" class="btn btn-primary">Make Copy</a>';
                        //     },
                        // },

                ]
            });
        });

        function confirmMsg()
        {
            var answer = confirm("Delete selected record?")
            if (answer){
                return true;
            }
            return false;
        }
    </script>
@endpush
@endsection
