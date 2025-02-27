<?php echo html()->form('PUT', route('admin.job-categories.update', $job_category->id))->id('updateForm')->attribute('files', true)->open(); ?>


<div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
        <?php echo e(html()->label('Name', 'name')); ?>

        <?php echo e(html()->text('name', $job_category->name)->class('form-control')->placeholder('Name')); ?>

        <small class="text-danger"><?php echo e($errors->first('name')); ?></small>
    </div>

    <div class="form-group<?php echo e($errors->has('description') ? ' has-error' : ''); ?>">
        <?php echo e(html()->label('Description', 'description')); ?>

        <?php echo e(html()->text('description', $job_category->description)->class('form-control')->placeholder('Description')); ?>

        <small class="text-danger"><?php echo e($errors->first('description')); ?></small>
    </div>

    <div class="form-group<?php echo e($errors->has('icon') ? ' has-error' : ''); ?>">
        <?php echo e(html()->label('Icon', 'icon')); ?>

        <?php echo e(html()->text('icon', $job_category->icon)->class('form-control')->placeholder('Icon')); ?>

        <small class="text-danger"><?php echo e($errors->first('icon')); ?></small>
    </div>

    <div class="form-group<?php echo e($errors->has('featured') ? ' has-error' : ''); ?>">
        <?php echo e(html()->label('Featured', 'featured')); ?>

        <?php echo e(html()->select('featured', [0 => 'No', 1 => 'Yes'], $job_category->featured)->class('form-control')); ?>

        <small class="text-danger"><?php echo e($errors->first('featured')); ?></small>
    </div>

    <div class="form-group<?php echo e($errors->has('status') ? ' has-error' : ''); ?>">
        <?php echo e(html()->label('Status', 'status')); ?>

        <?php echo e(html()->select('status', App\Models\Status::whereIn('id', [14,15])->pluck('name', 'id'), $job_category->status_id)->class('form-control js-choice')->placeholder('Chosse Status')); ?>

        <small class="text-danger"><?php echo e($errors->first('status')); ?></small>
    </div>



<?php echo e(html()->button('Update Category')->type('button')->class('update btn btn-success')); ?>



<?php echo e(html()->form()->close()); ?><?php /**PATH /Users/asifjamal/Documents/enabledtalent/resources/views/admin/job-category/edit.blade.php ENDPATH**/ ?>