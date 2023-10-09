<?php $__env->startSection('title', 'Order Listing'); ?>
<?php $__env->startSection('content'); ?>



<div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title"> Manage Sold Item(s) </h3>
         <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Orders</a></li>
            <li class="breadcrumb-item active" aria-current="page">Orders List</li>
          </ol>
        </nav>
      </div>



      <?php if(session()->has('message')): ?>
            <div class="alert alert-danger">
                <?php echo e(session()->get('message')); ?>

            </div>
      <?php endif; ?>


      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Manage Sold Item(s)</h4>
          <div class="row">
            <div class="col-12">
              <div class="table-responsive">
                <table class="table table-bordered table-striped mb-none" id="my-table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Age</th>
                            <th>Start Date</th>
                            <th>Salary</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Age</th>
                            <th>Start Date</th>
                            <th>Salary</th>
                        </tr>
                    </tfoot>
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
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © <?php echo e(date('Y')); ?> <a href="<?php echo e(url('/')); ?>" target="_blank">Hemchhaya</a>. All rights reserved.</span>
        </div>
    </footer>
    <!-- partial -->
  </div>
  <!-- main-panel ends -->

<?php $__env->startPush('scripts'); ?>
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
                    data: ({_token: '<?php echo e(csrf_token()); ?>'}),
                    url : "<?php echo e(url('/')); ?>/getorder",
                    type : 'GET',
                },
                columns: [
                        //  {data: 'category_name' },
                        //  {data: 'sub_category_name'},
                        //  {data: 'sub_category_item_name'},
                         {
                            data: 'product_info',
                            render: function (data, type, row){
                                return '<img src="'+data.frontimage+'" /></br><p>Name : '+data.name+'</p></br><p>SKU : '+data.skuid+'</p>';
                            },
                        },
                        {
                            data: 'status',
                            render: function (data, type, row){
                                if(data == "Active"){
                                    return '<label class="badge badge-success">Active</label>';
                                }else{
                                    return '<label class="badge badge-danger">In Active</label>';
                                }
                            },
                        },
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
                        {
                            data: 'action',
                            render: function (data, type, row){
                                return '<a href="http://localhost:8000/vendor/edit-variation/'+data+'" onclick="geturldata(event)" title="Edit Variation"><i class="mdi mdi-table-edit"></i></a>';
                            },
                        },
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
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.vendor', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\webdev\hemchhaya\resources\views/vendor/order/order-list.blade.php ENDPATH**/ ?>