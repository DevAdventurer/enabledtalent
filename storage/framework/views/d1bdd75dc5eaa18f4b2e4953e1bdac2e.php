<?php
    $jobs = App\Models\JobListing::where('status_id', 14)
    ->with(['state', 'city', 'jobType'])
    ->where('deadline', '>=', today())->paginate(12);


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

<div id="section_<?php echo e($section->id); ?>" class="job-area bg py-120">
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
<?php $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
        <div class="card-grid-2 hover-up">
            <div class="card-grid-2-image-left"><span class="flash"></span>
                <div class="image-box job-company-logo"><img src="<?php echo e(asset($job->company->details->logo)); ?>"></div>
                <div class="right-info"><a class="name-job" href="company-details.html"><?php echo e($job->company->details->company_name); ?></a><span class="location-small"><?php echo e($job->city->name); ?>, <?php echo e($job->state->country->name); ?></span></div>
            </div>
            <div class="card-block-info">
                <h6><a href="<?php echo e(route('web.job.single', $job->slug)); ?>"><?php echo e($job->title); ?></a></h6>
                <a href="<?php echo e(route('web.job.category', $job->jobCategory->slug)); ?>"><?php echo e($job->jobCategory->name); ?></a>
                <div class="mt-1"><span class="card-briefcase"><?php echo e($job->jobType->name); ?></span><span class="card-time"><?php echo e($job->created_at->diffForHumans()); ?></span>
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

<?php if(isset($section->button_link)): ?>
    <div class="col-md-12 text-center">
        <a class="btn btn-primary" href="<?php echo e($section->button_link); ?>"><?php echo e($section->button_label); ?></a>
    </div>
<?php endif; ?>
</div>
</div>
</div>
<?php /**PATH /Users/asifjamal/Documents/enabledtalent/resources/views/common/snippets/recent-job.blade.php ENDPATH**/ ?>