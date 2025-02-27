<?php $__env->startPush('links'); ?>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('main'); ?>

<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0"><?php echo e(Str::title(str_replace('-', ' ', request()->segment(2)))); ?></h4>
            <?php if (\Illuminate\Support\Facades\Blade::check('can', 'browse_employee')): ?>
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

<div class="card">
    <div class="card-content">
        <div class="card-body">
         <?php echo e(html()->form('POST', route('admin.menu.store'))->attribute('enctype', 'multipart/form-data')->id('store')->open()); ?>

         <div class="row">
            <div class="col-md-3 col-sm-12">
                <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                    <?php echo e(html()->label('Menu Name')->for('name')); ?>

                    <?php echo e(html()->text('name')->class('form-control')->id('name')->value(old('name'))); ?>

                    <small class="text-danger"><?php echo e($errors->first('name')); ?></small>
                </div>
            </div>
            <div class="col-md-3 col-sm-12">

                <div class="form-group<?php echo e($errors->has('icon') ? ' has-error' : ''); ?>">
                    <?php echo e(html()->label('Icon')->for('icon')); ?>

                    <?php echo e(html()->text('icon')->class('form-control')->id('icon')->value(old('icon'))); ?>

                    <small class="text-danger"><?php echo e($errors->first('icon')); ?></small>
                </div>
            </div>
            <div class="col-md-3 col-sm-12">
                <div class="form-group<?php echo e($errors->has('status') ? ' has-error' : ''); ?>">
                    <?php echo e(html()->label('Status')->for('status')); ?>

                    <?php echo e(html()->select('status', [1 => 'Active', 0 => 'Deactive'])->class('form-control')->id('menu_status')->placeholder('Choose Status')->value(old('status'))); ?>

                    <small class="text-danger"><?php echo e($errors->first('status')); ?></small>
                </div>
            </div>

            <div class="col-md-3 col-sm-12">

                <div class="form-group" style="margin-top:22px;">
                    <?php echo e(html()->button('Create')->type('submit')->class('btn btn-success')); ?>

                </div>
            </div>
        </div>
        <?php echo e(html()->form()->close()); ?>


    </div>

</div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>


<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/asifjamal/Documents/enabledtalent/resources/views/admin/menu/create.blade.php ENDPATH**/ ?>