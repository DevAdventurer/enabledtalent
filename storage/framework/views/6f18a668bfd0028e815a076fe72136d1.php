<?php echo e(html()->hidden('type', 'youtube-video')); ?>

<div class="form-group<?php echo e($errors->has('title') ? ' has-error' : ''); ?>">
    <?php echo e(html()->label('Title', 'title')); ?>

    <?php echo e(html()->text('title')->class('form-control')->placeholder('Title')); ?>

    <small class="text-danger"><?php echo e($errors->first('title')); ?></small>
</div>

<div class="form-group<?php echo e($errors->has('description') ? ' has-error' : ''); ?>">
    <?php echo e(html()->label('Description', 'description')); ?>

    <?php echo e(html()->textarea('description')->class('form-control')->placeholder('Description')); ?>

    <small class="text-danger"><?php echo e($errors->first('description')); ?></small>
</div>

<div class="form-group<?php echo e($errors->has('youtube_id') ? ' has-error' : ''); ?>">
    <?php echo e(html()->label('Youtube ID', 'youtube_id')); ?>

    <?php echo e(html()->text('youtube_id')->class('form-control')->placeholder('Youtube ID')); ?>

    <small class="text-danger"><?php echo e($errors->first('youtube_id')); ?></small>
</div>


<div class="form-group<?php echo e($errors->has('image') ? ' has-error' : ''); ?>">
    <div class="media-area" file-name="image">
        <div class="media-file-value"></div>
        <div class="media-file"></div>
        <p><br></p>
        <a class="text-secondary select-mediatype" href="javascript:void(0);" mediatype='single' onclick="loadMediaFiles($(this))">Select Thumbnail Image</a>
    </div>
    <small class="text-danger"><?php echo e($errors->first('image')); ?></small>
</div>
<?php /**PATH C:\Users\asifj\Documents\enabledtalent\resources\views/admin/section-snippets/youtube-video.blade.php ENDPATH**/ ?>