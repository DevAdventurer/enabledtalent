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

        <div id="section_<?php echo e($section->id); ?>" class="partner-area bg pt-40 pb-30">
            <div class="container">
                <div class="partner-wrapper">
                    <div class="partner-slider owl-carousel owl-theme">
                        <?php $__currentLoopData = $content; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(isset($item['logo'])): ?>
                                <div class="partner-item">
                                    <img src="<?php echo e(asset($item['logo'])); ?>" alt="thumb">
                                </div>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
         <!-- partner area end --><?php /**PATH /Users/asifjamal/Documents/enabledtalent/resources/views/common/snippets/logo-slider.blade.php ENDPATH**/ ?>