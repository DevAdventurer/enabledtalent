<div class="card">

    <div class="card-header">
        <div class="d-flex align-items-center">
            <div class="flex-grow-1">
                <h6 class="card-title mb-0">Youtube Video</h6>
            </div>
            <div class="flex-shrink-0">
                <?php echo e(html()->button('Save Data')->type('button')->class('btn btn-sm btn-soft-secondary')->attribute('onclick = store(this)')); ?>


                <a class="btn btn-sm btn-soft-danger" href="">Delete</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <?php echo e(html()->hidden('type', 'youtube-video')); ?>

        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="form-group<?php echo e($errors->has('title') ? ' has-error' : ''); ?>">
                    <?php echo e(html()->label('Title', 'title')); ?>

                    <?php echo e(html()->text('title')->class('form-control')->placeholder('Title')); ?>

                    <small class="text-danger"><?php echo e($errors->first('title')); ?></small>
                </div>
                <div class="form-group<?php echo e($errors->has('youtube_id') ? ' has-error' : ''); ?>">
                    <?php echo e(html()->label('Youtube ID', 'youtube_id')); ?>

                    <?php echo e(html()->text('youtube_id')->class('form-control')->placeholder('Youtube ID')); ?>

                    <small class="text-danger"><?php echo e($errors->first('youtube_id')); ?></small>
                </div>


                <div class="form-group<?php echo e($errors->has('margin') ? ' has-error' : ''); ?>">
                    <?php echo e(html()->label('Margin', 'margin')); ?>

                    <div class="d-flex gap-2">
                        <?php echo e(html()->number('margin_top')->class('form-control')->placeholder('Top')); ?>

                        <?php echo e(html()->number('margin_right')->class('form-control')->placeholder('Right')); ?>

                        <?php echo e(html()->number('margin_bottom')->class('form-control')->placeholder('Bottom')); ?>

                        <?php echo e(html()->number('margin_left')->class('form-control')->placeholder('Left')); ?>

                    </div>
                    <small class="text-danger"><?php echo e($errors->first('margin')); ?></small>
                </div>

                <div class="form-group<?php echo e($errors->has('padding') ? ' has-error' : ''); ?>">
                    <?php echo e(html()->label('Padding', 'padding')); ?>

                    <div class="d-flex gap-2">
                        <?php echo e(html()->number('padding_top')->class('form-control')->placeholder('Top')); ?>

                        <?php echo e(html()->number('padding_right')->class('form-control')->placeholder('Right')); ?>

                        <?php echo e(html()->number('padding_bottom')->class('form-control')->placeholder('Bottom')); ?>

                        <?php echo e(html()->number('padding_left')->class('form-control')->placeholder('Left')); ?>

                    </div>
                    <small class="text-danger"><?php echo e($errors->first('padding')); ?></small>
                </div>


            </div>

            <div class="col-md-6 col-sm-12">
                <div class="form-group<?php echo e($errors->has('description') ? ' has-error' : ''); ?>">
                    <?php echo e(html()->label('Description', 'description')); ?>

                    <?php echo e(html()->textarea('description')->class('form-control')->placeholder('Description')); ?>

                    <small class="text-danger"><?php echo e($errors->first('description')); ?></small>
                </div>




                <div class="form-group<?php echo e($errors->has('image') ? ' has-error' : ''); ?>">
                    <div class="media-area" file-name="image">
                        <div class="media-file-value"></div>
                        <div class="media-file"></div>
                        <a class="text-secondary select-mediatype form-control " href="javascript:void(0);" mediatype='single' onclick="loadMediaFiles($(this))">Select Thumbnail Image</a>
                    </div>
                    <small class="text-danger"><?php echo e($errors->first('image')); ?></small>
                </div>

                <div class="form-group<?php echo e($errors->has('ordering') ? ' has-error' : ''); ?>">
                    <?php echo e(html()->label('Ordering', 'ordering')); ?>

                    <?php echo e(html()->text('ordering')->class('form-control')->placeholder('Ordering')); ?>

                    <small class="text-danger"><?php echo e($errors->first('ordering')); ?></small>
                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH /Users/asifjamal/Documents/enabledtalent/resources/views/admin/section-snippets/youtube-video.blade.php ENDPATH**/ ?>