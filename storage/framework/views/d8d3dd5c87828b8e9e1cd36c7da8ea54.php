<!-- partner area -->
        <div class="partner-area bg pt-40 pb-30">
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
         <!-- partner area end --><?php /**PATH C:\Users\asifj\Documents\enabledtalent\resources\views/common/snippets/logo-slider.blade.php ENDPATH**/ ?>