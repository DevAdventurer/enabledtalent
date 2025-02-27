<div class="card">
    
    <div class="card-header">
        <div class="d-flex align-items-center">
            <div class="flex-grow-1">
                <h6 class="card-title mb-0">Image With Text</h6>
            </div>
            <div class="flex-shrink-0">
                <?php echo e(html()->button('Save Data')->type('button')->class('btn btn-sm btn-soft-secondary')->attribute('onclick = store(this)')); ?>


                <a class="btn btn-sm btn-soft-danger" href="">Delete</a>
            </div>
        </div>
    </div>
    <div class="card-body">


        <?php echo e(html()->hidden('type', 'image-with-text')); ?>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group<?php echo e($errors->has('title') ? ' has-error' : ''); ?>">
                    <?php echo e(html()->label('Title', 'title')); ?>

                    <?php echo e(html()->text('title')->class('form-control')->placeholder('Title')); ?>

                    <small class="text-danger"><?php echo e($errors->first('title')); ?></small>
                </div>

                

                <div class="form-group<?php echo e($errors->has('button_label') ? ' has-error' : ''); ?>">
                    <?php echo e(html()->label('Button Label', 'button_label')); ?>

                    <?php echo e(html()->text('button_label')->class('form-control')->placeholder('Button Label')); ?>

                    <small class="text-danger"><?php echo e($errors->first('button_label')); ?></small>
                </div>
            
                <div class="form-group<?php echo e($errors->has('button_link') ? ' has-error' : ''); ?>">
                    <?php echo e(html()->label('Button Link', 'button_link')); ?>

                    <?php echo e(html()->text('button_link')->class('form-control')->placeholder('Button Link')); ?>

                    <small class="text-danger"><?php echo e($errors->first('button_link')); ?></small>
                </div>

                <div class="form-group<?php echo e($errors->has('image_position') ? ' has-error' : ''); ?>">
                    <?php echo e(html()->label('Image Position', 'image_position')); ?>

                    <?php echo e(html()->select('image_position', ['left' => 'Left', 'right' => 'Right'])->class('form-control')->placeholder('Image Position')); ?>

                    <small class="text-danger"><?php echo e($errors->first('image_position')); ?></small>
                </div>

            </div>

            <div class="col-md-6">
                <div class="form-group<?php echo e($errors->has('description') ? ' has-error' : ''); ?>">
                    <?php echo e(html()->label('Description', 'description')); ?>

                    <?php echo e(html()->textarea('description')->class('form-control')->placeholder('Description')); ?>

                    <small class="text-danger"><?php echo e($errors->first('description')); ?></small>
                </div>
                
                <div class="form-group<?php echo e($errors->has('decription') ? ' has-error' : ''); ?>">
                    <?php echo e(html()->label('Image', 'image')); ?>

                    <div class="media-area" file-name="image">
                        <div class="media-file-value"></div>
                        <div class="media-file"></div>
                        <a class="text-secondary select-mediatype" href="javascript:void(0);" mediatype='single' onclick="loadMediaFiles($(this))">Select Image</a>
                    </div>
                </div>
            </div>

        </div>


    </div>
</div>

<?php /**PATH C:\Users\asifj\Documents\enabledtalent\resources\views/admin/section-snippets/image-with-text.blade.php ENDPATH**/ ?>