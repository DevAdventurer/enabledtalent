<?php
    $styles = json_decode($section->styles, true);
    $styleAttributes = [];

    // Margin
    if (validStyle($styles['margin']['top'])) $styleAttributes[] = "margin-top: {$styles['margin']['top']}px;";
    if (validStyle($styles['margin']['right'])) $styleAttributes[] = "margin-right: {$styles['margin']['right']}px;";
    if (validStyle($styles['margin']['bottom'])) $styleAttributes[] = "margin-bottom: {$styles['margin']['bottom']}px;";
    if (validStyle($styles['margin']['left'])) $styleAttributes[] = "margin-left: {$styles['margin']['left']}px;";

    // Padding
    if (validStyle($styles['padding']['top'])) $styleAttributes[] = "padding-top: {$styles['padding']['top']}px;";
    if (validStyle($styles['padding']['right'])) $styleAttributes[] = "padding-right: {$styles['padding']['right']}px;";
    if (validStyle($styles['padding']['bottom'])) $styleAttributes[] = "padding-bottom: {$styles['padding']['bottom']}px;";
    if (validStyle($styles['padding']['left'])) $styleAttributes[] = "padding-left: {$styles['padding']['left']}px;";

    $styleString = !empty($styleAttributes) ? implode(' ', $styleAttributes) : '';
?>

<?php $__env->startPush('links'); ?>
<style>
    #section_<?php echo e($section->id); ?>{
        <?php echo $styleString; ?>

    }
</style>
<?php $__env->stopPush(); ?>

<!-- process-area -->
        <div id="section_<?php echo e($section->id); ?>" class="process-area py-80">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 mx-auto">
                        <div class="site-heading text-center">
                            <h2 class="site-title"><?php echo e($section->heading); ?></h2>
                            <span><?php echo e($section->subheading); ?></span>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <?php $__currentLoopData = $content; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <div class="process-item">
                            <span class="process-count"><?php echo e($loop->index+1); ?></span>
                            <div class="process-icon">
                                <i class="<?php echo e($item['icon']??''); ?>"></i>
                            </div>
                            <div class="process-content">
                                <h5><?php echo e($item['title']??''); ?></h5>
                                <p><?php echo e($item['description']??''); ?></p>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php if(isset($section->button_link)): ?>
                        <div class="col-md-12 text-center">
                            <a class="btn btn-primary" href="<?php echo e($section->button_link); ?>"><?php echo e($section->button_label); ?></a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <!-- process-area end --><?php /**PATH /Users/asifjamal/Documents/enabledtalent/resources/views/common/snippets/how-it-work.blade.php ENDPATH**/ ?>