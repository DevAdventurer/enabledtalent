<?php echo html()->form('PUT', route('admin.industries.update', $business_category->id))->id('updateForm')->attribute('files', true)->open(); ?>


<div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
        <?php echo e(html()->label('Name', 'name')); ?>

        <?php echo e(html()->text('name', $business_category->name)->class('form-control')->placeholder('Name')); ?>

        <small class="text-danger"><?php echo e($errors->first('name')); ?></small>
    </div>

    <div class="form-group<?php echo e($errors->has('description') ? ' has-error' : ''); ?>">
        <?php echo e(html()->label('Description', 'description')); ?>

        <?php echo e(html()->text('description', $business_category->description)->class('form-control')->placeholder('Description')); ?>

        <small class="text-danger"><?php echo e($errors->first('description')); ?></small>
    </div>

    <div class="form-group<?php echo e($errors->has('status') ? ' has-error' : ''); ?>">
        <?php echo e(html()->label('Status', 'status')); ?>

        <?php echo e(html()->select('status', App\Models\Status::whereIn('id', [14,15])->pluck('name', 'id'), $business_category->status_id)->class('form-control js-choice')->placeholder('Chosse Status')); ?>

        <small class="text-danger"><?php echo e($errors->first('status')); ?></small>
    </div>



<?php echo e(html()->button('Update Industry')->type('button')->class('update btn btn-success')); ?>



<?php echo e(html()->form()->close()); ?><?php /**PATH C:\Users\asifj\Documents\enabledtalent\resources\views/admin/industry/edit.blade.php ENDPATH**/ ?>