<?php $__env->startPush('links'); ?>

<?php $__env->stopPush(); ?>




<?php $__env->startSection('main'); ?>




        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0"><?php echo e(Str::title(str_replace('-', ' ', request()->segment(2)))); ?></h4>

                    <div class="page-title-right">
                        <?php if (\Illuminate\Support\Facades\Blade::check('can', 'add_bread')): ?>
                        <a href="<?php echo e(route('admin.'.request()->segment(2).'.create')); ?>"  class="btn-sm btn btn-primary btn-label rounded-pill">
                            <i class="align-middle bx bx-plus label-icon rounded-pill fs-16 me-2"></i>
                            Add <?php echo e(Str::title(str_replace('-', ' ', request()->segment(2)))); ?>

                        </a>
                        <?php endif; ?>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->




        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable" class="table align-middle datatable table-sm border-secondary table-bordered nowrap" style="width:100%">
                            <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Name</th>
                                  <th>Slug</th>
                                  <th>Action</th>
                                </tr>
                            </thead>
                       
                        </table>
                        </div>
                    </div>
                </div>
            </div><!--end col-->
        </div><!--end row-->





<?php $__env->stopSection(); ?>


<?php $__env->startPush('scripts'); ?>

<script type="text/javascript">
$(document).ready(function(){
    var table2 = $('#datatable').DataTable({
     "processing": true,
     "serverSide": true,
     "ordering": false,
    'ajax': {
    'url': '<?php echo e(route('admin.'.request()->segment(2).'.index')); ?>',
    'data': function(d) {
        d._token = '<?php echo e(csrf_token()); ?>';
        d._method = 'PATCH';
    }

    },
    "columns": [
        { "data": "sn" }, 
        { "data": "name" }, 
        { "data": "slug" },  
        {
            "data": "action",
            render: function(data, type, row) {
                if (type === 'display') {
                    var btn = '<div class="dropdown d-inline-block"><button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="align-middle ri-more-fill"></i></button><ul class="dropdown-menu dropdown-menu-end">';

                    <?php if (\Illuminate\Support\Facades\Blade::check('can', ['edit_bread','delete_bread','read_bread'])): ?>

                    <?php if (\Illuminate\Support\Facades\Blade::check('can', 'read_bread')): ?>
                    btn += '<li><a class="dropdown-item" href="<?php echo e(request()->url()); ?>/' + row['slug'] + '"><i class="align-bottom ri-eye-fill me-2 text-muted"></i> View</a></li>';
                    <?php endif; ?>

                    <?php if (\Illuminate\Support\Facades\Blade::check('can', 'edit_bread')): ?>
                        btn+='<li><a class="dropdown-item edit-item-btn" href="'+window.location.href+'/'+row['slug']+'/edit"><i class="align-bottom ri-pencil-fill me-2 text-muted"></i> Edit</a></li>';
                    <?php endif; ?>

                    <?php if (\Illuminate\Support\Facades\Blade::check('can', 'delete_bread')): ?>
                        btn += '<li><button type="button" onclick="deleteAjax(\''+window.location.href+'/'+row['slug']+'/delete\')" class="dropdown-item remove-item-btn"><i class="align-bottom ri-delete-bin-fill me-2 text-muted"></i> Delete</button></li>';
                    <?php endif; ?>

                    <?php endif; ?>
                     btn += '</ul></div>';
                    return btn;
                }
                return ' ';
            },
    }]

});
});
    </script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/asifjamal/Documents/enabledtalent/resources/views/admin/bread/list.blade.php ENDPATH**/ ?>