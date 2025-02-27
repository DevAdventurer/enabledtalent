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

                    <?php echo e(html()->text('title', $content['title'])->class('form-control')->placeholder('Title')); ?>

                    <small class="text-danger"><?php echo e($errors->first('title')); ?></small>
                </div>

                <div class="form-group<?php echo e($errors->has('description') ? ' has-error' : ''); ?>">
                    <?php echo e(html()->label('Description', 'description')); ?>

                    <?php echo e(html()->textarea('description', $content['description'])->class('form-control')->placeholder('Description')); ?>

                    <small class="text-danger"><?php echo e($errors->first('description')); ?></small>
                </div>
            </div>

            <div class="col-6"><?php echo e($content['video']); ?>

                <img src="https://img.youtube.com/vi/<?php echo e($content['video']); ?>/maxresdefault.jpg">
            </div>

        </div>
    </div>
</div>
<?php echo e(html()->form()->close()); ?>


<?php /**PATH C:\Users\asifj\Documents\enabledtalent\resources\views/admin/page-items/text-with-video.blade.php ENDPATH**/ ?>