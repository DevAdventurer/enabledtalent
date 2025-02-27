
<?php $__env->startPush('links'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
<?php $__env->stopPush(); ?>


<?php $__env->startSection('main'); ?>
<!-- employer-dashboard -->
<div class="user-profile py-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">

                <?php echo $__env->make('company.layouts.aside', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


            </div>
            <div class="col-lg-9">
                <div class="user-profile-wrapper">
                   <div class="user-profile-card">
                    <?php echo e(html()->form('POST', route('company.jobs.store'))->attribute('enctype', 'multipart/form-data')->id('storeForm')->open()); ?>


                    

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group<?php echo e($errors->has('title') ? ' has-error' : ''); ?>">
                                <?php echo e(html()->label('Job Title', 'title')); ?>

                                <?php echo e(html()->text('title')->class('form-control')->placeholder('Enter Job Title')); ?>

                                <small class="text-danger"><?php echo e($errors->first('title')); ?></small>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group <?php echo e($errors->has('category') ? ' has-error' : ''); ?>">
                                <?php echo e(html()->label('Job Category', 'category')); ?>

                                <?php echo e(html()->select('category', App\Models\JobCategory::orderBy('name', 'asc')->pluck('name', 'id'))->class(' select')->placeholder('Choose Job Category')); ?>

                                <small class="text-danger"><?php echo e($errors->first('category')); ?></small>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group <?php echo e($errors->has('job_type') ? ' has-error' : ''); ?>">
                                <?php echo e(html()->label('Job Type', 'job_type')); ?>

                                <?php echo e(html()->select('job_type', App\Models\JobType::orderBy('name', 'asc')->pluck('name', 'id'))->placeholder('Choose Job Type')->class('select')); ?>

                                <small class="text-danger"><?php echo e($errors->first('job_type')); ?></small>
                            </div>
                        </div>


                        <div class="col-md-6 col-sm-12">
                            <div class="form-group <?php echo e($errors->has('experience') ? ' has-error' : ''); ?>">
                                <?php echo e(html()->label('Experience', 'experience')); ?>

                                <?php echo e(html()->select('experience', App\Models\Experience::orderBy('name', 'asc')->pluck('name', 'id'))->placeholder('Choose Experience')->class('select')); ?>

                                <small class="text-danger"><?php echo e($errors->first('experience')); ?></small>
                            </div>
                        </div>
                         <div class="col-md-6 col-sm-12">
                            <div class="form-group <?php echo e($errors->has('qualification') ? ' has-error' : ''); ?>">
                                <?php echo e(html()->label('Qualification', 'qualification')); ?>

                                <?php echo e(html()->select('qualification[]', [])->id('qualification')->class('form-control')); ?>

                                <small class="text-danger"><?php echo e($errors->first('qualification')); ?></small>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-12">
                            <div class="form-group <?php echo e($errors->has('offer_salary_min') ? ' has-error' : ''); ?>">
                                <?php echo e(html()->label('Offer Salary Min', 'offer_salary_min')); ?>

                                <?php echo e(html()->text('offer_salary_min')->class('form-control')->placeholder('Enter Offered Minimum Salary')); ?>

                                <small class="text-danger"><?php echo e($errors->first('offer_salary_min')); ?></small>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-12">
                            <div class="form-group <?php echo e($errors->has('offer_salary_max') ? ' has-error' : ''); ?>">
                                <?php echo e(html()->label('Offer Salary Max', 'offer_salary_max')); ?>

                                <?php echo e(html()->text('offer_salary_max')->class('form-control')->placeholder('Enter Offered Maximum Salary')); ?>

                                <small class="text-danger"><?php echo e($errors->first('offer_salary_max')); ?></small>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-12">
                            <div class="form-group <?php echo e($errors->has('salary_type') ? ' has-error' : ''); ?>">
                                <?php echo e(html()->label('Salary Type', 'salary_type')); ?>

                                <?php echo e(html()->select('salary_type', ['Per hour' => 'Per hour', 'Per month' => 'Per month', 'Per annum' => 'Per annum'])->class('form-control')->placeholder('Salary Type')); ?>

                                <small class="text-danger"><?php echo e($errors->first('salary_type')); ?></small>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group <?php echo e($errors->has('skills') ? ' has-error' : ''); ?>">
                                <?php echo e(html()->label('Required Skills', 'skills')); ?>

                                <?php echo e(html()->select('skills[]', [])->id('skills')->class('form-control')); ?>

                                <small class="text-danger"><?php echo e($errors->first('skills')); ?></small>
                            </div>
                        </div>


                        <div class="col-sm-12 col-md-6">
                            <div class="form-group<?php echo e($errors->has('country') ? ' has-error' : ''); ?>">
                                <?php echo e(html()->label('Country', 'country')); ?>

                                <?php echo e(html()->select('country', [])->class('form-control')->placeholder('Choose  Country')); ?>

                                <small class="text-danger"><?php echo e($errors->first('country')); ?></small>
                            </div>
                        </div>


                        <div class="col-sm-12 col-md-6">
                            <div class="form-group<?php echo e($errors->has('state') ? ' has-error' : ''); ?>">
                                <?php echo e(html()->label('State', 'state')); ?>

                                <?php echo e(html()->select('state', [])->class('form-control')->placeholder('State')); ?>

                                <small class="text-danger"><?php echo e($errors->first('state')); ?></small>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-6">
                            <div class="form-group<?php echo e($errors->has('district') ? ' has-error' : ''); ?>">
                                <?php echo e(html()->label('District', 'district')); ?>

                                <?php echo e(html()->select('district', [])->class('form-control')->placeholder('District')); ?>

                                <small class="text-danger"><?php echo e($errors->first('district')); ?></small>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-6">
                            <div class="form-group<?php echo e($errors->has('city') ? ' has-error' : ''); ?>">
                                <?php echo e(html()->label('City', 'city')); ?>

                                <?php echo e(html()->select('city', [])->class('form-control')->placeholder('City')); ?>

                                <small class="text-danger"><?php echo e($errors->first('city')); ?></small>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-6">
                            <div class="form-group<?php echo e($errors->has('pincode') ? ' has-error' : ''); ?>">
                                <?php echo e(html()->label('Pincode', 'pincode')); ?>

                                <?php echo e(html()->text('pincode')->class('form-control')->placeholder('Pincode')); ?>

                                <small class="text-danger"><?php echo e($errors->first('pincode')); ?></small>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-6">
                            <div class="form-group<?php echo e($errors->has('address') ? ' has-error' : ''); ?>">
                                <?php echo e(html()->label('Address', 'address')); ?>

                                <?php echo e(html()->text('address')->class('form-control')->placeholder('Address')); ?>

                                <small class="text-danger"><?php echo e($errors->first('address')); ?></small>
                            </div>
                        </div>


                       
                        <div class="col-md-6">
                            <div class="form-group <?php echo e($errors->has('deadline') ? ' has-error' : ''); ?>">
                                <?php echo e(html()->label('Deadline', 'deadline')); ?>

                                <?php echo e(html()->date('deadline')->class('form-control')); ?>

                                <small class="text-danger"><?php echo e($errors->first('deadline')); ?></small>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group<?php echo e($errors->has('status') ? ' has-error' : ''); ?>">
                                <?php echo e(html()->label('Status', 'status')); ?>

                                <?php echo e(html()->select('status', App\Models\Status::whereIn('id', [14, 15])->pluck('name', 'id'))->class('form-control')->placeholder('Choose Status')); ?>

                                <small class="text-danger"><?php echo e($errors->first('status')); ?></small>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group<?php echo e($errors->has('about_job') ? ' has-error' : ''); ?>">
                                <?php echo e(html()->label('About Job', 'about_job')); ?>

                                <?php echo e(html()->textarea('about_job')->class('form-control')->placeholder('About Job')); ?>

                                <small class="text-danger"><?php echo e($errors->first('about_job')); ?></small>
                            </div>
                        </div>

                    </div>
                    
                    <?php echo e(html()->button('<span class="far fa-check-circle"></span> Publish Your Job', 'button')->attribute('onclick = store(this)')->class('theme-btn')); ?>

                    <?php echo e(html()->form()->close()); ?>

                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- employer-dashboard end -->   
<?php $__env->stopSection(); ?>


<?php $__env->startPush('scripts'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function(){
        getCountry('country')
    });

    $('body').on('change', '#country', function(){
        var country = $(this).val();
        $('#state, #district, #city').val(null).trigger('change');
        getState('state', country)
    });


    $('body').on('change', '#state', function(){
        var state = $(this).val();
        $('#district, #city').val(null).trigger('change');
        getDistrict('district', state)
    });

    $('body').on('change', '#district', function(){
        var district = $(this).val();
        $('#city').val(null).trigger('change');
        getCity('city', district)
    });

    $(document).ready(function() {
        $('#skills').select2({
            placeholder: "Select Skills",
            allowClear: true,
            multiple: true,
            ajax: {
                url: "<?php echo e(route('web.common.skills.list')); ?>",
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        term: params.term, // Search term
                        page: params.page || 1
                    };
                },
                processResults: function (data, params) {
                    params.page = params.page || 1;

                    return {
                        results: data.results,
                        pagination: {
                            more: data.pagination.more
                        }
                    };
                },
                cache: true
            },
            //minimumInputLength: 1 // Start searching after 1 character
        });
    });


    $(document).ready(function() {
        $('#qualification').select2({
            placeholder: "Select Qualification",
            allowClear: true,
            multiple: true,
            ajax: {
                url: "<?php echo e(route('web.common.qualification.list')); ?>",
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        term: params.term, // Search term
                        page: params.page || 1
                    };
                },
                processResults: function (data, params) {
                    params.page = params.page || 1;

                    return {
                        results: data.results,
                        pagination: {
                            more: data.pagination.more
                        }
                    };
                },
                cache: true
            },
            //minimumInputLength: 1 // Start searching after 1 character
        });
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('common.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/asifjamal/Documents/enabledtalent/resources/views/company/job/create.blade.php ENDPATH**/ ?>