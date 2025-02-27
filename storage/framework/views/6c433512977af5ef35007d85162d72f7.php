<?php $__env->startPush('links'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('main'); ?>

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0"><?php echo e(Str::title(str_replace('-', ' ', request()->segment(2)))); ?></h4>

            <div class="page-title-right">
                <a href="<?php echo e(route('admin.' . request()->segment(2) . '.create')); ?>" class="btn-sm btn btn-primary btn-label rounded-pill">
                    <i class="align-middle bx bx-plus label-icon rounded-pill fs-16 me-2"></i>
                    Add <?php echo e(Str::title(str_replace('-', ' ', request()->segment(2)))); ?>

                </a>
            </div>
        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-md-3 col-sm-12"></div>
    <div class="col-md-6 col-sm-12">
        <div class="card">
            <div class="card-body">
                <?php echo html()->form('POST', route('admin.bread.store'))->open(); ?>


                <div class="mb-3 form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                    <?php echo html()->label('Name', 'name'); ?>

                    <?php echo html()->text('name')->class('form-control')->placeholder('Name'); ?>

                    <small class="text-danger"><?php echo e($errors->first('name')); ?></small>
                </div>

                <div class="form-group">
                    <?php echo html()->button('Create')->class('btn btn-soft-secondary waves-effect waves-light'); ?>

                </div>

                <?php echo html()->form()->close(); ?>

            </div>
        </div>
    </div><!--end col-->
    <div class="col-md-3 col-sm-12"></div>
</div><!--end row-->

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\asifj\Documents\enabledtalent\resources\views/admin/bread/create.blade.php ENDPATH**/ ?>