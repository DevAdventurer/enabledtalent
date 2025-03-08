<?php $__env->startPush('links'); ?>
<?php $__env->stopPush(); ?>


<?php $__env->startSection('main'); ?>
       




        <!-- job grid -->
        <div class="job-grid ">
            <div class="container">

                <div class="search-form mt-5 mb-5">
                    <div class="col-lg-9 mx-auto">
                        <div class="search-form-wrapper">
                            <form action="#">
                                <div class="row">
                                    <div class="col-md-4 px-0">
                                        <div class="form-group">
                                            <div class="form-group-icon">
                                                <input type="text" class="form-control"
                                                    placeholder="Type Keyword...">
                                                <i class="fe-search"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 px-0">
                                        <div class="form-group">
                                            <div class="form-group-icon">
                                                <select class="select">
                                                    <option value="">Location</option>
                                                    <option value="1">Brazil</option>
                                                    <option value="2">Canada</option>
                                                    <option value="3">Germany</option>
                                                    <option value="4">Italy</option>
                                                    <option value="5">Japan</option>
                                                    <option value="6">USA</option>
                                                    <option value="7">UK</option>
                                                </select>
                                                <i class="fe-map-pin"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 px-0">
                                        <div class="form-group">
                                            <div class="form-group-icon">
                                                <select class="select">
                                                    <option value="">Category</option>
                                                    <option value="1">Web Designer</option>
                                                    <option value="2">Developer</option>
                                                    <option value="3">Software</option>
                                                    <option value="4">Finance</option>
                                                    <option value="5">Management</option>
                                                    <option value="6">Advertising</option>
                                                    <option value="7">Accountant</option>
                                                </select>
                                                <i class="fe-briefcase"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 px-1">
                                        <div class="form-group">
                                            <button type="submit" class="theme-btn w-100"><span
                                                    class="fe-search"></span>Search</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4 col-xl-3 mb-4">
                        <div class="job-sidebar">
                            
                 

                         <div class="job-sidebar-item">
    <h4 class="job-sidebar-title">Job Type</h4>
    <div class="job-type">
        <?php $__currentLoopData = App\Models\JobType::orderBy('name', 'asc')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="form-check">
                <input class="form-check-input filter" name="job_types[]" type="checkbox" value="<?php echo e($job_type->id); ?>">
                <label class="form-check-label">
                    <?php echo e($job_type->name); ?> <span>(<?php echo e($job_type->jobListings()->count()); ?>)</span>
                </label>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>

<div class="job-sidebar-item">
    <h4 class="job-sidebar-title">Experience Level</h4>
    <div class="job-experience">
        <?php $__currentLoopData = App\Models\Experience::orderBy('name', 'asc')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $experience): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="form-check">
                <input class="form-check-input filter" name="experiences[]" type="checkbox" value="<?php echo e($experience->id); ?>">
                <label class="form-check-label">
                    <?php echo e($experience->name); ?> <span>(<?php echo e($experience->jobListings->count()); ?>)</span>
                </label>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
                           
                        </div>
                    </div>
                    <div class="col-lg-8 col-xl-9">
                        
    <div class="row" id="jobListContainer">
        <?php echo $__env->make('web.partials.job_list', ['jobs' => $jobs], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>



                            

                            
                        </div>

                        <!-- pagination -->
                        <div class="pagination-area">
    <div aria-label="Page navigation example">
        <ul class="pagination">
            
            <?php if($jobs->onFirstPage()): ?>
                <li class="page-item disabled">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true"><i class="far fa-angle-double-left"></i></span>
                    </a>
                </li>
            <?php else: ?>
                <li class="page-item">
                    <a class="page-link" href="<?php echo e($jobs->previousPageUrl()); ?>" aria-label="Previous">
                        <span aria-hidden="true"><i class="far fa-angle-double-left"></i></span>
                    </a>
                </li>
            <?php endif; ?>

            
            <?php $__currentLoopData = $jobs->links()->elements[0]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="page-item <?php echo e($page == $jobs->currentPage() ? 'active' : ''); ?>">
                    <a class="page-link" href="<?php echo e($url); ?>"><?php echo e($page); ?></a>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            
            <?php if($jobs->hasMorePages()): ?>
                <li class="page-item">
                    <a class="page-link" href="<?php echo e($jobs->nextPageUrl()); ?>" aria-label="Next">
                        <span aria-hidden="true"><i class="far fa-angle-double-right"></i></span>
                    </a>
                </li>
            <?php else: ?>
                <li class="page-item disabled">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true"><i class="far fa-angle-double-right"></i></span>
                    </a>
                </li>
            <?php endif; ?>
        </ul>
    </div>

    
    <div class="pagination-showing">
        <p>Showing <?php echo e($jobs->firstItem()); ?> - <?php echo e($jobs->lastItem()); ?> of <?php echo e($jobs->total()); ?> Jobs</p>
    </div>
</div>

                    </div>
                </div>
            </div>
        </div>

        
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
$(document).ready(function() {
    $('.filter').on('change', function() {
        let jobTypes = [];
        let experiences = [];

        $('input[name="job_types[]"]:checked').each(function() {
            jobTypes.push($(this).val());
        });

        $('input[name="experiences[]"]:checked').each(function() {
            experiences.push($(this).val());
        });

        $.ajax({
            url: "<?php echo e(route('web.jobs')); ?>",
            type: "GET",
            data: {
                job_types: jobTypes,
                experiences: experiences
            },
            beforeSend: function() {
                $('#jobListContainer').html('<div class="text-center">Loading...</div>');
            },
            success: function(response) {
                $('#jobListContainer').html(response.jobList);
            }
        });
    });
});
</script>
        <?php $__env->stopPush(); ?>
<?php echo $__env->make('common.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/asifjamal/Documents/enabledtalent/resources/views/web/job.blade.php ENDPATH**/ ?>