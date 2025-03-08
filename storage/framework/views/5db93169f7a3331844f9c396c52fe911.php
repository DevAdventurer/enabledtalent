<?php $__env->startPush('links'); ?>
<?php $__env->stopPush(); ?>


<?php $__env->startSection('main'); ?>
hghjg
<?php echo e(auth('candidate')->user()->name); ?>    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('common.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/asifjamal/Documents/enabledtalent/resources/views/candidate/dashboard.blade.php ENDPATH**/ ?>