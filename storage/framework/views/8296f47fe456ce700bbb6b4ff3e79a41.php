<?php $__env->startPush('links'); ?>
<?php $__env->stopPush(); ?>



<div class="about-area py-120 mb-30">
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
<?php /**PATH C:\Users\asifj\Documents\enabledtalent\resources\views/common/snippets/image-with-text.blade.php ENDPATH**/ ?>