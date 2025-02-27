<?php echo html()->form('PUT', route('admin.skill.update', $skill->id))->id('updateForm')->attribute('files', true)->open(); ?>


<div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
        <?php echo e(html()->label('Name', 'name')); ?>

        <?php echo e(html()->text('name', $skill->name)->class('form-control')->placeholder('Name')); ?>

        <small class="text-danger"><?php echo e($errors->first('name')); ?></small>
    </div>


    <div class="form-group<?php echo e($errors->has('status') ? ' has-error' : ''); ?>">
        <?php echo e(html()->label('Status', 'status')); ?>

        <?php echo e(html()->select('status', App\Models\Status::whereIn('id', [14,15])->pluck('name', 'id'), $skill->status_id)->class('form-control js-choice')->placeholder('Chosse Status')); ?>

        <small class="text-danger"><?php echo e($errors->first('status')); ?></small>
    </div>



<?php echo e(html()->button('Update Industry')->type('button')->class('update btn btn-success')); ?>



<?php echo e(html()->form()->close()); ?><?php /**PATH /Users/asifjamal/Documents/enabledtalent/resources/views/admin/skill/edit.blade.php ENDPATH**/ ?>