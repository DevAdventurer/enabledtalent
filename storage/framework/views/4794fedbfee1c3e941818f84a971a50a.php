<?php echo e(html()->form('POST', route('admin.job-categories.store'))->attribute('enctype', 'multipart/form-data')->id('storeForm')->open()); ?>


    <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
        <?php echo e(html()->label('Name', 'name')); ?>

        <?php echo e(html()->text('name')->class('form-control')->placeholder('Name')); ?>

        <small class="text-danger"><?php echo e($errors->first('name')); ?></small>
    </div>

    <div class="form-group<?php echo e($errors->has('description') ? ' has-error' : ''); ?>">
        <?php echo e(html()->label('Description', 'description')); ?>

        <?php echo e(html()->text('description')->class('form-control')->placeholder('Description')); ?>

        <small class="text-danger"><?php echo e($errors->first('description')); ?></small>
    </div>

    <div class="form-group<?php echo e($errors->has('icon') ? ' has-error' : ''); ?>">
        <?php echo e(html()->label('Icon', 'icon')); ?>

        <?php echo e(html()->text('icon')->class('form-control')->placeholder('Icon')); ?>

        <small class="text-danger"><?php echo e($errors->first('icon')); ?></small>
    </div>

    <div class="form-group<?php echo e($errors->has('featured') ? ' has-error' : ''); ?>">
        <?php echo e(html()->label('Featured', 'featured')); ?>

        <?php echo e(html()->select('featured', [0 => 'No', 1 => 'Yes'], 0)->class('form-control')); ?>

        <small class="text-danger"><?php echo e($errors->first('featured')); ?></small>
    </div>

    <div class="form-group<?php echo e($errors->has('status') ? ' has-error' : ''); ?>">
        <?php echo e(html()->label('Status', 'status')); ?>

        <?php echo e(html()->select('status', App\Models\Status::whereIn('id', [14,15])->pluck('name', 'id'))->class('form-control js-choice')->placeholder('Chosse Status')); ?>

        <small class="text-danger"><?php echo e($errors->first('status')); ?></small>
    </div>

    <?php echo e(html()->button('Save Category')->type('button')->class('btn btn-success store')); ?>

<?php echo e(html()->form()->close()); ?><?php /**PATH /Users/asifjamal/Documents/enabledtalent/resources/views/admin/job-category/create.blade.php ENDPATH**/ ?>