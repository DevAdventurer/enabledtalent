<?php echo e(html()->form('POST', route('admin.industries.store'))->attribute('enctype', 'multipart/form-data')->id('storeForm')->open()); ?>


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

    <div class="form-group<?php echo e($errors->has('status') ? ' has-error' : ''); ?>">
        <?php echo e(html()->label('Status', 'status')); ?>

        <?php echo e(html()->select('status', App\Models\Status::whereIn('id', [14,15])->pluck('name', 'id'))->class('form-control js-choice')->placeholder('Chosse Status')); ?>

        <small class="text-danger"><?php echo e($errors->first('status')); ?></small>
    </div>

    <?php echo e(html()->button('Save Industry')->type('button')->class('btn btn-success store')); ?>

<?php echo e(html()->form()->close()); ?><?php /**PATH /Users/asifjamal/Documents/enabledtalent/resources/views/admin/industry/create.blade.php ENDPATH**/ ?>