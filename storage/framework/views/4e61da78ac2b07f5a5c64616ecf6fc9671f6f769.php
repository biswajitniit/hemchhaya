<?php $__env->startSection('title', 'Category Listing'); ?>
<?php $__env->startSection('content'); ?>



<div class="main-panel">
    <div class="content-wrapper">
      

      <div class="page-header flex-wrap">
        <div class="header-left">
          
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
                
                <table class="table" id="my-table">
                  <thead>
                    <tr>
                      <th>Category Name</th>
                      <th>Category Sort No</th>
                      <th>Menu Dropdown</th>
                      <th>Menu Show Div Type</th>
                      <th>Menu Show In Header</th>
                      <th>Status</th>
                      <th>Actions</th>
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
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © <?php echo e(date('Y')); ?> <a href="<?php echo e(url('/')); ?>" target="_blank">Hemchhaya</a>. All rights reserved.</span>
        </div>
    </footer>
    <!-- partial -->
  </div>
  <!-- main-panel ends -->

<?php $__env->startPush('scripts'); ?>
    <script type="text/javascript">
        $(document).ready(function(){
        // DataTable
            $('#my-table').DataTable({
                processing: true,
                serverSide: true,
                lengthMenu: [[1, 100, 200], [1, 100, 200]],
                order: [[ 0, "desc" ]],
                columnDefs: [{
                    "searchable": true,
                    "orderable": false,
                    "targets": 0
                }],
                "ajax": {
                    data: ({_token: '<?php echo e(csrf_token()); ?>'}),
                    url : "<?php echo e(url('/')); ?>/categorylist",
                    type : 'GET',
                },
                columns: [
                        {data: 'category_name' },
                        {data: 'category_sort_no'},
                        {data: 'menu_dropdown'},
                        {data: 'menu_show_div_type'},
                        {data: 'menu_show_in_header'},
                        //{data: 'status'},
                        {
                            data: 'status',
                            render: function (data, type, row){
                               // return '<a href="javascript:void(0)" onclick="get_meeting_note(\'' +data+'\')" title="Edit Category"><i class="mdi mdi-table-edit"></i></a> | <a href="javascript:void(0)" onclick="get_meeting_note(\'' +data+'\')" title="Delete Category"><i class="mdi mdi-delete-forever"></i></a> ';
                                if(data == "Active"){
                                    return '<label class="badge badge-success">Active</label>';
                                }else{
                                    return '<label class="badge badge-danger">In Active</label>';
                                }
                            },
                        },
                       // {data: 'action'},
                       {
                            data: 'action',
                            render: function (data, type, row){
                                return '<a href="javascript:void(0)" onclick="get_meeting_note(\'' +data+'\')" title="Edit Category"><i class="mdi mdi-table-edit"></i></a> | <a href="javascript:void(0)" onclick="get_meeting_note(\'' +data+'\')" title="Delete Category"><i class="mdi mdi-delete-forever"></i></a> ';
                            },
                        },

                ]
            });
        });


    </script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\webdev\hemchhaya\resources\views/admin/category/category-list.blade.php ENDPATH**/ ?>