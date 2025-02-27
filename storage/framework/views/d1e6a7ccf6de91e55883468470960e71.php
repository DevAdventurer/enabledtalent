<?php echo e(html()->form('POST', route('admin.section.store'))->attribute('enctype', 'multipart/form-data')->id('storeForm')->open()); ?>


                <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                    <?php echo e(html()->label('Name', 'name')); ?>

                    <?php echo e(html()->text('name')->class('form-control')->placeholder('Name')); ?>

                    <small class="text-danger"><?php echo e($errors->first('name')); ?></small>
                </div>

                <div class="form-group<?php echo e($errors->has('snippet_name') ? ' has-error' : ''); ?>">
                    <?php echo e(html()->label('Snippet Name', 'snippet_name')); ?>

                    <?php echo e(html()->text('snippet_name')->class('form-control')->placeholder('Snippet Name')); ?>

                    <small class="text-danger"><?php echo e($errors->first('snippet_name')); ?></small>
                </div>


                <?php echo e(html()->button('Save Section')->type('button')->class('btn btn-success store')); ?>

            <?php echo e(html()->form()->close()); ?><?php /**PATH /Users/asifjamal/Documents/enabledtalent/resources/views/admin/section/create.blade.php ENDPATH**/ ?>