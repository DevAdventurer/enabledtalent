<?php $__env->startPush('links'); ?>

<?php $__env->stopPush(); ?>




<?php $__env->startSection('main'); ?>
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0"><?php echo e(Str::title(str_replace('-', ' ', request()->segment(2)))); ?></h4>
            <?php if (\Illuminate\Support\Facades\Blade::check('can', 'browse_client')): ?>
                <div class="page-title-right">
                    <a href="<?php echo e(route('admin.' . request()->segment(2) . '.index')); ?>"
                        class="btn-sm btn btn-secondary btn-label">
                        <i class="align-middle bx bx-list-ul label-icon fs-16 me-2"></i>
                        All <?php echo e(Str::title(str_replace('-', ' ', request()->segment(2)))); ?>s List
                    </a>
                </div>
            <?php endif; ?>

        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group<?php echo e($errors->has('section') ? ' has-error' : ''); ?>">
            <?php echo e(html()->label('Section', 'section')); ?>

            <?php echo e(html()->select('section', App\Models\Section::orderBy('name', 'asc')->pluck('name', 'id'))->class('form-control')->placeholder('Add New Section')); ?>

            <small class="text-danger"><?php echo e($errors->first('section')); ?></small>
        </div>
    </div>
</div>


<div class="modal fade zoomIn" id="pageItem" tabindex="-1" aria-labelledby="pageItemLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0">
            <div class="modal-header p-3 bg-success-subtle">
                <h5 class="modal-title" id="pageItemLabel">Create Folder</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" id="addFolderBtn-close" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form autocomplete="off" class="needs-validation createfolder-form" id="createfolder-form" novalidate="">
                   <div id="pageSection">
                       hghjgj
                   </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>




<?php $__env->startPush('scripts'); ?>
   <script>
       $('body').on('change', '#section', function(){
            var id = $(this).val();
            $.ajax({
            type: "GET",
            enctype: 'multipart/form-data',
            url: '<?php echo e(route('admin.common.page.item.add', '')); ?>/'+id,
            success: function(response) {
                $('#pageSection').html(response);
                $('#pageItem').modal('show');
            }
        });
       });
   </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\asifj\Documents\enabledtalent\resources\views/admin/page/create.blade.php ENDPATH**/ ?>