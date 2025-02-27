
<?php $__env->startPush('links'); ?>
<?php $__env->stopPush(); ?>


<?php $__env->startSection('main'); ?>
<!-- employer-dashboard -->
        <div class="user-profile py-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">

                        <?php echo $__env->make('company.layouts.aside', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


                    </div>
                    <div class="col-lg-9">
                        <div class="user-profile-wrapper">
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="card">

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable" class="table align-middle datatable table-sm border-secondary table-bordered nowrap" style="width:100%">

                            <thead>
                                <tr>
                                    <th>Si</th>
                                    <th></th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Industry</th>
                                    <th>Location</th>
                                    <th>Status</th>
                                    <th>Job Status</th>
                                    <?php if (\Illuminate\Support\Facades\Blade::check('can', ['edit_all_companies','delete_all_companies', 'read_all_companies'])): ?>
                                    <th>Action</th>
                                    <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody id="sortable-table">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- employer-dashboard end -->   
<?php $__env->stopSection(); ?>


 <?php $__env->startPush('scripts'); ?>

    <script type="text/javascript">

        $(document).ready(function(){
            var table2 = $('#datatable').DataTable({
                "processing": true,
                "serverSide": true,
                "ordering": false,
                "searching": false,
                "lengthMenu": [25, 50, 100, 250, 500],
                'ajax': {
                    'url': '<?php echo e(route('company.'.request()->segment(2).'.index')); ?>',
                    'data': function(d) {
                        d._token = '<?php echo e(csrf_token()); ?>';
                        d._method = 'PATCH';
                        d.name = $('#name').val();
                        d.email = $('#email').val();
                        d.mobile = $('#mobile').val();
                        d.status = $('#status').val();
                    }

                },
                "columns": [
                    { "data": "sn" },
                    { "data": "featured",  
                        render: function(data, type, row) {
                            if(row['featured'] == 1){
                                return '<button onclick="updateData(\'<?php echo e(route('admin.all-companies.featured')); ?>\',{featured:0, id:'+row['id']+'})" class="btn btn-sm btn-success"> <i class="ri-star-fill"></i> </button>';
                            }

                            if(row['featured'] == 0){
                            return '<button onclick="updateData(\'<?php echo e(route('admin.all-companies.featured')); ?>\',{featured:1, id:'+row['id']+'})" class="btn btn-sm btn-soft-success"> <i class="ri-star-line"></i> </button>';
                            }
                        }
                    },
                    { "data": "name" },
                    { "data": "email" },
                    { "data": "mobile" },
                    { "data": "category" },
                    { "data": "location" },
                    { "data": "status" },
                    { "data": "job_status" },
                    {
                        "data": "action",
                        render: function(data, type, row) {
                            if (type === 'display') {
                        var btn = '<div class="dropdown d-inline-block"><button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="align-middle ri-more-fill"></i></button><ul class="dropdown-menu dropdown-menu-end">';

                        <?php if (\Illuminate\Support\Facades\Blade::check('can', ['edit_all_companies','delete_all_companies','read_all_companies'])): ?>

                        <?php if (\Illuminate\Support\Facades\Blade::check('can', 'read_all_companies')): ?>
                        btn += '<li><a class="dropdown-item" href="<?php echo e(request()->url()); ?>/' + row['id'] + '"><i class="align-bottom ri-eye-fill me-2 text-muted"></i> View</a></li>';
                        <?php endif; ?>

                        <?php if (\Illuminate\Support\Facades\Blade::check('can', 'edit_all_companies')): ?>
                        btn+='<li><a class="dropdown-item edit-item-btn" href="'+window.location.href+'/'+row['id']+'/edit"><i class="align-bottom ri-pencil-fill me-2 text-muted"></i> Edit</a></li>';
                        <?php endif; ?>

                        <?php if (\Illuminate\Support\Facades\Blade::check('can', 'delete_all_companies')): ?>
                        btn += '<li><button type="button" onclick="deleteModel(\''+window.location.href+'/'+row['id']+'/delete\')" class="dropdown-item remove-item-btn"><i class="align-bottom ri-delete-bin-fill me-2 text-muted"></i> Delete</button></li>';
                        <?php endif; ?>

                        <?php endif; ?>
                        btn += '</ul></div>';
                        return btn;
                    }
                    return ' ';
                },
            }]

        });

     $('body').on('keyup', '.searchFilter', function(){
        table2.draw('page');
    });

    $('body').on('change', '.searchFilterChange', function(){
        table2.draw('page');
    });


});

    </script>



    <?php $__env->stopPush(); ?>

<?php echo $__env->make('common.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\asifj\Documents\enabledtalent\resources\views/company/job/index.blade.php ENDPATH**/ ?>