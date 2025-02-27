<?php echo e(html()->form('POST', route('admin.page.section.update', $section->id))->attribute('enctype', 'multipart/form-data')->id('storeForm')->open()); ?>



<div class="card">
    
    <div class="card-header">
        <div class="d-flex align-items-center">
            <div class="flex-grow-1">
                <h6 class="card-title mb-0">Text With Video</h6>
            </div>
            <div class="flex-shrink-0">
                <?php echo e(html()->button('Save Data')->type('button')->class('btn btn-sm btn-soft-secondary')->attribute('onclick = store(this)')); ?>


                <a class="btn btn-sm btn-soft-danger" href="">Delete</a>
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-6">
                <?php echo e(html()->hidden('type', 'image-with-text')); ?>

                <div class="form-group<?php echo e($errors->has('title') ? ' has-error' : ''); ?>">
                    <?php echo e(html()->label('Title', 'title')); ?>

                    <?php echo e(html()->text('title', $content['title']??'')->class('form-control')->placeholder('Title')); ?>

                    <small class="text-danger"><?php echo e($errors->first('title')); ?></small>
                </div>

                <div class="form-group<?php echo e($errors->has('description') ? ' has-error' : ''); ?>">
                    <?php echo e(html()->label('Description', 'description')); ?>

                    <?php echo e(html()->textarea('description', $content['description']??'')->class('form-control')->placeholder('Description')); ?>

                    <small class="text-danger"><?php echo e($errors->first('description')); ?></small>
                </div>
                <div class="form-group<?php echo e($errors->has('ordering') ? ' has-error' : ''); ?>">
                    <?php echo e(html()->label('Ordering', 'ordering')); ?>

                    <?php echo e(html()->text('ordering', $section->ordering)->class('form-control')->placeholder('Ordering')); ?>

                    <small class="text-danger"><?php echo e($errors->first('ordering')); ?></small>
                </div>
            </div>

            <div class="col-6">
                
                <div class="form-group<?php echo e($errors->has('youtube_id') ? ' has-error' : ''); ?>">
                    <?php echo e(html()->label('Youtube Id', 'youtube_id')); ?>

                    <?php echo e(html()->text('youtube_id', $content['youtube_id']??'')->class('form-control')->placeholder('Youtube Id')); ?>

                    <small class="text-danger"><?php echo e($errors->first('youtube_id')); ?></small>
                </div>

                <div class="media-area" file-name="image">
                    <div class="media-file-value">
                        <?php if(isset($content['thumbnail_image'])): ?>
                        <input type="hidden" name="logo" value="<?php echo e($content['thumbnail_image']??''); ?>" class="fileid<?php echo e($section->id); ?>">
                        <?php endif; ?>
                    </div>
                    <div class="media-file">
                         <?php if(isset($content['thumbnail_image'])): ?>
                        <div class="file-container d-inline-block fileid<?php echo e($section->id); ?>">
                            <span data-id="<?php echo e($section->id); ?>" class="remove-file">✕</span>
                            <img class="w-100 d-block img-thumbnail" src="<?php echo e(asset($content['thumbnail_image'])); ?>" alt="img">
                        </div>
                        <?php endif; ?>
                    </div>
                    <a class="text-secondary form-control select-mediatype" href="javascript:void(0);" mediatype='single' onclick="loadMediaFiles($(this))">Select Image</a>
                </div>
            </div>

        </div>
    </div>
</div>
<?php echo e(html()->form()->close()); ?>


<?php /**PATH C:\Users\asifj\Documents\enabledtalent\resources\views/admin/page-items/youtube-video.blade.php ENDPATH**/ ?>