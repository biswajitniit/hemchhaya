<?php $__env->startSection('title', 'Banner Listing'); ?>
<?php $__env->startSection('content'); ?>



<div class="main-panel">
    <div class="content-wrapper">
      

      <div class="page-header flex-wrap">
        <div class="header-left">
          
        </div>
        <div class="header-right d-flex flex-wrap mt-2 mt-sm-0">

          <button type="button" onclick="location.href='<?php echo e(route('admin.add-banner')); ?>'" class="btn btn-primary mt-2 mt-sm-0 btn-icon-text">
            <i class="mdi mdi-plus-circle"></i> Add Banner </button>
        </div>
      </div>

      <?php if(session()->has('message')): ?>
            <div class="alert alert-danger">
                <?php echo e(session()->get('message')); ?>

            </div>
      <?php endif; ?>


      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Banner table</h4>
          <div class="row">
            <div class="col-12">
              <div class="table-responsive">
                
                <table class="table table-bordered table-striped mb-none" id="my-table">
                  <thead>
                    <tr class="bg-primary text-white">
                      <th>Banner Order</th>
                      <th>Text Top</th>
                      <th>Text Middele</th>
                      <th>Text Buttom</th>
                      <th>Banner URL</th>
                      <th>Banner Image</th>
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
        $(".alert").delay(2000).slideUp(200, function () {
            $(this).alert('close');
        });


        $(document).ready(function(){
        // DataTable
            $('#my-table').DataTable({
                processing: true,
                serverSide: true,
                lengthMenu: [[100, 200, 300], [100, 200, 300]],
                order: [[ 1, "asc" ]],
                columnDefs: [{
                    "searchable": true,
                    "orderable": false,
                    "targets": 0
                }],
                "ajax": {
                    data: ({_token: '<?php echo e(csrf_token()); ?>'}),
                    url : "<?php echo e(url('/')); ?>/bannerlist",
                    type : 'GET',
                },
                columns: [
                        {data: 'banner_order' },
                        {data: 'banner_text_top'},
                        {data: 'banner_text_middle'},
                        {data: 'banner_text_buttom'},
                        {data: 'banner_url'},
                        {
                            data: 'banner_image',
                            render: function (data, type, row){
                                  return '<img src='+data+'>';
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
                            data: 'action',
                            render: function (data, type, row){
                                return '<a href="<?php echo url("admin/edit-banner")?>/'+data+'" title="Edit Banner"><i class="mdi mdi-table-edit"></i></a> | <a href="<?php echo url("admin/bannertrash")?>/'+data+'" title="Trash Banner" onclick="return confirm("Are you sure?")"><i class="mdi mdi-delete-forever"></i></a> ';
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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\webdev\hemchhaya\resources\views/admin/banner/banner-list.blade.php ENDPATH**/ ?>