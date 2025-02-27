<?php echo e(html()->hidden('type', 'text-with-video')); ?>

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

<div class="form-group<?php echo e($errors->has('vide_url') ? ' has-error' : ''); ?>">
    <?php echo e(html()->label('Vide URL', 'vide_url')); ?>

    <?php echo e(html()->text('vide_url')->class('form-control')->placeholder('Vide URL')); ?>

    <small class="text-danger"><?php echo e($errors->first('vide_url')); ?></small>
</div>

<?php /**PATH C:\Users\asifj\Documents\enabledtalent\resources\views/admin/section-snippets/text-with-video.blade.php ENDPATH**/ ?>