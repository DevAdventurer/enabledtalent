<?php $__env->startPush('links'); ?>
<?php $__env->stopPush(); ?>


<?php $__env->startSection('main'); ?>
       <?php $__currentLoopData = $page->pageItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php if(view()->exists("common.snippets.{$section->type}")): ?>
                     <?php echo $__env->make("common.snippets.{$section->type}", ['content' => $section->content, 'section' => $section], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
              <?php endif; ?>
       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 <?php echo $__env->make('common.snippets.featured-job', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

       
        
<?php $__env->stopSection(); ?>
<?php echo $__env->make('common.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/asifjamal/Documents/enabledtalent/resources/views/web/home.blade.php ENDPATH**/ ?>