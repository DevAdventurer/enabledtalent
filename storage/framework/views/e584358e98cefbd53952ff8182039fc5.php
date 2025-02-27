<!-- process-area -->
        <div class="process-area py-80">
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
        <!-- process-area end --><?php /**PATH C:\Users\asifj\Documents\enabledtalent\resources\views/common/snippets/how-it-work.blade.php ENDPATH**/ ?>