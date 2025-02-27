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


<div id="section_<?php echo e($section->id); ?>" class="about-area py-120 mb-30">
            <div class="container">
                <div class="row align-items-center">
                	<?php if($content['image_position'] == 'left'): ?>
	                    <div class="col-lg-6">
	                        <div class="about-left">
	                        	<?php if(isset($content['image'])): ?>
		                            <div class="about-img">
		                                <img src="<?php echo e(asset($content['image'])); ?>" alt="">
		                            </div>
	                            <?php endif; ?>
	                            <div class="about-shape">
	                                <img src="<?php echo e(asset('assets/img/shape/01.svg')); ?>" alt="">
	                            </div>
	                        </div>
	                    </div>
                    
	                    <div class="col-lg-6">
	                        <div class="about-right">
	                            <div class="site-heading mb-3">
	                                <h2 class="site-title"><?php echo e($content['title']); ?></h2>
	                            </div>
	                            <p class="about-text"><?php echo e($content['description']); ?></p>
	                            
	                            <a href="about.html" class="theme-btn" style="margin-top:20px;">Read More <i class="far fa-arrow-right"></i></a>
	                        </div>
	                    </div>

                    <?php endif; ?>

                   <?php if($content['image_position'] == 'right'): ?>
	                    
                    
	                    <div class="col-lg-6">
	                        <div class="about-right">
	                            <div class="site-heading mb-3">
	                                <h2 class="site-title"><?php echo e($content['title']); ?></h2>
	                            </div>
	                            <p class="about-text"><?php echo e($content['description']); ?></p>
	                            
	                            <a href="about.html" class="theme-btn" style="margin-top:20px;">Read More <i class="far fa-arrow-right"></i></a>
	                        </div>
	                    </div>

	                    <div class="col-lg-6">
	                        <div class="about-left">
	                        	<?php if(isset($content['image'])): ?>
		                            <div class="about-img">
		                                <img src="<?php echo e(asset($content['image'])); ?>" alt="">
		                            </div>
	                            <?php endif; ?>
	                            <div class="about-shape">
	                                <img src="<?php echo e(asset('assets/img/shape/01.svg')); ?>" alt="">
	                            </div>
	                        </div>
	                    </div>

                    <?php endif; ?>

                </div>
            </div>
        </div>

<?php $__env->startPush('scripts'); ?>

<?php $__env->stopPush(); ?>
<?php /**PATH /Users/asifjamal/Documents/enabledtalent/resources/views/common/snippets/image-with-text.blade.php ENDPATH**/ ?>