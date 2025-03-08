<div class="row">
    <?php if($jobs->count() > 0): ?>
        <?php $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                <div class="card-grid-2 hover-up">
                    <div class="card-grid-2-image-left"><span class="flash"></span>
                        <div class="image-box job-company-logo"><img src="<?php echo e(asset($job->company->details->logo)); ?>"></div>
                        <div class="right-info">
                            <a class="name-job" href="company-details.html"><?php echo e($job->company->details->company_name); ?></a>
                            <span class="location-small"><?php echo e($job->city->name); ?>, <?php echo e($job->state->country->name); ?></span>
                        </div>
                    </div>
                    <div class="card-block-info">
                        <h6><a href="<?php echo e(route('web.job.single', $job->slug)); ?>"><?php echo e($job->title); ?></a></h6>
                        <a href="<?php echo e(route('web.job.category', $job->jobCategory->slug)); ?>"><?php echo e($job->jobCategory->name); ?></a>
                        <div class="mt-1">
                            <span class="card-briefcase"><?php echo e($job->jobType->name); ?></span>
                            <span class="card-time"><?php echo e($job->created_at->diffForHumans()); ?></span>
                        </div>
                        <p class="font-sm color-text-paragraph mt-15">
                            <?php echo e(Str::words(strip_tags($job->description), 30, '...')); ?>

                        </p>
                        <div class="mt-30">
                            <?php $__currentLoopData = $job->skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a class="btn btn-grey-small mr-5" href="jobs-grid.html"><?php echo e($skill->name); ?></a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <div class="card-2-bottom mt-30">
                            <div class="row">
                                <div class="col-lg-12 col-12 text-center">
                                    <div class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalApplyJobForm">Apply now</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php else: ?>
        <div class="col-12 text-center">
            <p class="text-muted">No jobs found matching your criteria.</p>
        </div>
    <?php endif; ?>
</div><?php /**PATH /Users/asifjamal/Documents/enabledtalent/resources/views/web/partials/job_list.blade.php ENDPATH**/ ?>