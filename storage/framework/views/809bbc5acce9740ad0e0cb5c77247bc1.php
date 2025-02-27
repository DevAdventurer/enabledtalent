    
    <?php $__env->startPush('links'); ?>
    <!-- Select2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0/css/select2.min.css" rel="stylesheet" />
    <!-- Select2 JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0/js/select2.min.js"></script>
    <style>
        .choices {
            margin-bottom: 0 !important;
        }
    </style>
    <?php $__env->stopPush(); ?>




    <?php $__env->startSection('main'); ?>



    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0"><?php echo e(Str::title(str_replace('-', ' ', request()->segment(2)))); ?></h4>

                <?php echo e(Breadcrumbs::render('companies')); ?>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">

                    <form class="m-0">
                        <div class="d-flex gap-3 justify-content-between">
                            <div class="w-100">
                                <div class="m-0 form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                                    <?php echo e(html()->label('Name', 'name')); ?>

                                    <div class="search-box">
                                        <?php echo e(html()->search('name')->class('searchFilter form-control search')->placeholder('Name')); ?>

                                        <i class="ri-search-line search-icon"></i>
                                    </div>
                                    <small class="text-danger"><?php echo e($errors->first('name')); ?></small>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="w-100">
                                <div class="m-0 form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                                    <?php echo e(html()->label('Email', 'email')); ?>

                                    <div class="search-box">
                                        <?php echo e(html()->email('email')->class('searchFilter form-control search')->placeholder('Email')); ?>

                                        <i class="ri-search-line search-icon"></i>
                                    </div>
                                    <small class="text-danger"><?php echo e($errors->first('email')); ?></small>
                                </div>
                            </div>

                            <div class="w-100">
                                <div class="m-0 form-group<?php echo e($errors->has('mobile') ? ' has-error' : ''); ?>">
                                    <?php echo e(html()->label('Mobile', 'mobile')); ?>

                                    <div class="search-box">
                                        <?php echo e(html()->number('mobile')->class('searchFilter form-control')->placeholder('Mobile')); ?>

                                        <i class="ri-search-line search-icon"></i>
                                    </div>
                                    <small class="text-danger"><?php echo e($errors->first('mobile')); ?></small>
                                </div>
                            </div>

                            <div class="w-50">
                                <div class="m-0 form-group<?php echo e($errors->has('status') ? ' has-error' : ''); ?>">
                                    <?php echo e(html()->label('Status', 'status')); ?>

                                        <?php echo e(html()->select('status', App\Models\Status::whereIn('id', [1,14,15])->pluck('name', 'id'))->class('form-control js-choice searchFilterChange')); ?>

                                    <small class="text-danger"><?php echo e($errors->first('status')); ?></small>
                                </div>
                            </div>


                            <!--end col-->
                        </div>
                        <!--end row-->
                    </form>
                </div>
            </div>
        </div>


        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <form>
                        <div class="row g-3">

                            <div class="col-sm-4">
                                <button type="button" class="btn btn-primary w-100" onclick="filterData();">
                                    <i class="ri-equalizer-fill me-1 align-bottom"></i> Export
                                </button>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </form>
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-lg-12">
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
        </div><!--end col-->
    </div><!--end row-->



    <?php $__env->stopSection(); ?>


    <?php $__env->startPush('scripts'); ?>
<script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
<script>
    $(document).ready(function() {
        $(".js-choice").each(function() {
            new Choices($(this)[0], {
                allowHTML: true,
            }); 
        });
    });
</script>
    <script type="text/javascript">

        $(document).ready(function(){
            var table2 = $('#datatable').DataTable({
                "processing": true,
                "serverSide": true,
                "ordering": false,
                "searching": false,
                "lengthMenu": [25, 50, 100, 250, 500],
                'ajax': {
                    'url': '<?php echo e(route('admin.'.request()->segment(2).'.index')); ?>',
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

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/asifjamal/Documents/enabledtalent/resources/views/admin/companies/list.blade.php ENDPATH**/ ?>