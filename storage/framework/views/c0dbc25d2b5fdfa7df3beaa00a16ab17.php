<?php $__env->startPush('links'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/dropify-master/dist/css/dropify.min.css')); ?>">
<?php $__env->stopPush(); ?>


<?php $__env->startSection('main'); ?>
<!-- employer-profile -->
<div class="user-profile py-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">

                <?php echo $__env->make('candidate.layouts.aside', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>


            </div>
            <div class="col-lg-9">

                <div class="user-profile-wrapper">
                    <div class="user-profile-card">
                        <h4 class="user-profile-card-title">Profile Details</h4>
                        <div class="col-lg-12">
                            <div class="profile-form">
                                <?php echo e(html()->form('POST', route('candidate.details.detail.store'))->attribute('enctype', 'multipart/form-data')->id('storeForm')->open()); ?>


                                <div class="row">
                                    <div class="col-sm-12 col-md-4">
                                        <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                                            <?php echo e(html()->label('Name', 'name')); ?>

                                            <?php echo e(html()->text('name', $candidate->name)->class('form-control')->placeholder('Full Name')); ?>

                                            <small class="text-danger"><?php echo e($errors->first('name')); ?></small>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-md-4">
                                        <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                                            <?php echo e(html()->label('Email', 'email')); ?>

                                            <?php echo e(html()->email('email', $candidate->email)->class('form-control')->placeholder('Email')->attribute('readonly')); ?>

                                            <small class="text-danger"><?php echo e($errors->first('email')); ?></small>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-md-4">
                                        <div class="form-group<?php echo e($errors->has('mobile_no') ? ' has-error' : ''); ?>">
                                            <?php echo e(html()->label('Mobile No.', 'mobile_no')); ?>

                                            <?php echo e(html()->text('mobile_no', $candidate->details?$candidate->details->mobile:null)->class('form-control')->placeholder('Mobile No.')->attribute('maxlength', 12)->attribute('oninput', "this.value=this.value.replace(/[^0-9]/g,'')")); ?>

                                            <small class="text-danger"><?php echo e($errors->first('mobile_no')); ?></small>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group<?php echo e($errors->has('website') ? ' has-error' : ''); ?>">
                                            <?php echo e(html()->label('Website', 'website')); ?>

                                            <?php echo e(html()->text('website', $candidate->details?$candidate->details->website_url:null)->class('form-control')->placeholder('Website')); ?>

                                            <small class="text-danger"><?php echo e($errors->first('website')); ?></small>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-md-3">
                                        <div class="form-group<?php echo e($errors->has('age') ? ' has-error' : ''); ?>">
                                            <?php echo e(html()->label('Age', 'age')); ?>

                                            <?php echo e(html()->number('age', $candidate->details?$candidate->details->age:'')->class('form-control')->placeholder('Age')); ?>

                                            <small class="text-danger"><?php echo e($errors->first('age')); ?></small>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-md-3">
                                        <div class="form-group<?php echo e($errors->has('gender') ? ' has-error' : ''); ?>">
                                            <?php echo e(html()->label('Gender', 'gender')); ?>

                                            <?php echo e(html()->select('gender', ['male' => 'Male', 'female' => 'Female', 'other' => 'Other'], $candidate->details?$candidate->details->gender:null)
                                                ->class('form-control')); ?>

                                            <small class="text-danger"><?php echo e($errors->first('gender')); ?></small>
                                        </div>
                                    </div>

                                    
                                </div>


                                <div class="row">
                                    
                                    <div class="col-sm-12 col-md-4">
                                        <div class="form-group<?php echo e($errors->has('join_date') ? ' has-error' : ''); ?>">
                                            <?php echo e(html()->label('Join Date', 'join_date')); ?>

                                            <?php echo e(html()->date('join_date', $candidate->details?$candidate->details->join_date:null)->class('form-control')); ?>

                                            <small class="text-danger"><?php echo e($errors->first('join_date')); ?></small>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-md-4">
                                        <div class="form-group<?php echo e($errors->has('qualification_type') ? ' has-error' : ''); ?>">
                                            <?php echo e(html()->label('Qualification Type', 'qualification_type')); ?>

                                            <?php echo e(html()->select('qualification_type', [
                                                    'high_school' => 'High School',
                                                    'bachelor' => 'Bachelor’s Degree',
                                                    'master' => 'Master’s Degree',
                                                    'phd' => 'PhD',
                                                    'other' => 'Other'
                                                ], $candidate->details?$candidate->details->qualification_type:null)->class('form-control')); ?>

                                            <small class="text-danger"><?php echo e($errors->first('qualification_type')); ?></small>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-md-4">
                                        <div class="form-group<?php echo e($errors->has('language') ? ' has-error' : ''); ?>">
                                            <?php echo e(html()->label('Preferred Language', 'language')); ?>

                                            <?php echo e(html()->select('language', [
                                                    'english' => 'English',
                                                    'spanish' => 'Spanish',
                                                    'french' => 'French',
                                                    'german' => 'German',
                                                    'chinese' => 'Chinese',
                                                    'other' => 'Other'
                                                ], $candidate->details?$candidate->details->language:null)->class('form-control')); ?>

                                            <small class="text-danger"><?php echo e($errors->first('language')); ?></small>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-sm-12 col-md-3">
                                        <div class="form-group<?php echo e($errors->has('job_category') ? ' has-error' : ''); ?>">
                                            <?php echo e(html()->label('Job Category', 'job_category')); ?>

                                            <?php echo e(html()->select('job_category', [
                                                    'it' => 'IT & Software',
                                                    'marketing' => 'Marketing',
                                                    'finance' => 'Finance & Accounting',
                                                    'healthcare' => 'Healthcare',
                                                    'education' => 'Education & Training',
                                                    'engineering' => 'Engineering',
                                                    'other' => 'Other'
                                                ], $candidate->details?$candidate->details->job_category:null)->class('form-control')); ?>

                                            <small class="text-danger"><?php echo e($errors->first('job_category')); ?></small>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-md-3">
                                        <div class="form-group<?php echo e($errors->has('dob') ? ' has-error' : ''); ?>">
                                            <?php echo e(html()->label('Date of Birth', 'dob')); ?>

                                            <?php echo e(html()->date('dob', $candidate->details?$candidate->details->dob:null)->class('form-control')); ?>

                                            <small class="text-danger"><?php echo e($errors->first('dob')); ?></small>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-md-2">
                                        <div class="form-group<?php echo e($errors->has('experience') ? ' has-error' : ''); ?>">
                                            <?php echo e(html()->label('Years of Experience', 'experience')); ?>

                                            <?php echo e(html()->number('experience', $candidate->details?$candidate->details->experience:null)->class('form-control')->placeholder('Years of Experience')); ?>

                                            <small class="text-danger"><?php echo e($errors->first('experience')); ?></small>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-md-2">
                                        <div class="form-group<?php echo e($errors->has('current_salary') ? ' has-error' : ''); ?>">
                                            <?php echo e(html()->label('Current Salary', 'current_salary')); ?>

                                            <div class="input-group">
                                                <span class="input-group-text">$</span>
                                                <?php echo e(html()->number('current_salary', $candidate->details?$candidate->details->current_salary:null)->class('form-control')->placeholder('Current Salary')); ?>

                                            </div>
                                            <small class="text-danger"><?php echo e($errors->first('current_salary')); ?></small>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-md-2">
                                        <div class="form-group<?php echo e($errors->has('expected_salary') ? ' has-error' : ''); ?>">
                                            <?php echo e(html()->label('Expected Salary', 'expected_salary')); ?>

                                            <div class="input-group">
                                                <span class="input-group-text">$</span>
                                                <?php echo e(html()->number('expected_salary', $candidate->details?$candidate->details->expected_salary:null)->class('form-control')->placeholder('Expected Salary')); ?>

                                            </div>
                                            <small class="text-danger"><?php echo e($errors->first('expected_salary')); ?></small>
                                        </div>
                                    </div>


                                </div>



                                <?php echo e(html()->button('Save Data')->type('button')->class('btn btn-primary')->attribute('onclick = store(this)')); ?>

                                <?php echo e(html()->form()->close()); ?>


                            </div>
                        </div>
                    </div>
                </div>


                <div class="user-profile-wrapper">
                    <div class="user-profile-card">
                        <h4 class="user-profile-card-title">Skills</h4>
                        <div class="col-sm-12">
                            <div class="form-group<?php echo e($errors->has('skills') ? ' has-error' : ''); ?>">
                                <?php echo e(html()->label('Skills', 'skills')); ?>

                                <?php echo e(html()->text('skills', $candidate->details?$candidate->details->skills:null)->class('form-control')->placeholder('Enter skills, separated by commas')); ?>

                                <small class="text-danger"><?php echo e($errors->first('skills')); ?></small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="user-profile-wrapper">
                    <div class="user-profile-card">
                        <h4 class="user-profile-card-title">Bio</h4>
                        <div class="col-sm-12">
                            <div class="form-group<?php echo e($errors->has('bio') ? ' has-error' : ''); ?>">
                                <?php echo e(html()->label('Bio', 'bio')); ?>

                                <?php echo e(html()->textarea('bio', $candidate->details?$candidate->details->bio:null)->class('form-control')->id('bioEditor')); ?>

                                <small class="text-danger"><?php echo e($errors->first('bio')); ?></small>
                            </div>
                        </div>

                        <script>
                            CKEDITOR.replace('bioEditor', {
                                height: 200,
                                removePlugins: 'image,flash', // Remove unnecessary plugins if needed
                                toolbar: [
                                    { name: 'basicstyles', items: ['Bold', 'Italic', 'Underline', 'Strike'] },
                                    { name: 'paragraph', items: ['NumberedList', 'BulletedList'] },
                                    { name: 'links', items: ['Link', 'Unlink'] },
                                    { name: 'insert', items: ['Table'] },
                                    { name: 'styles', items: ['Format', 'Font', 'FontSize'] },
                                    { name: 'colors', items: ['TextColor', 'BGColor'] }
                                ]
                            });
                        </script>

                    </div>
                </div>




                <div class="user-profile-wrapper">
                    <div class="user-profile-card">
                        <h4 class="user-profile-card-title">Contact Info</h4>
                        <div class="col-lg-12">
                            <div class="profile-form">
                               <?php echo e(html()->form('POST', route('candidate.details.contact.store'))->attribute('enctype', 'multipart/form-data')->id('storeForm')->open()); ?>

                               <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group<?php echo e($errors->has('country') ? ' has-error' : ''); ?>">
                                            <?php echo e(html()->label('Country', 'country')); ?>

                                            <?php echo e(html()->select('country', App\Models\Country::where('id', $candidate->details->country_id)->pluck('name', 'id'), $candidate->details?$candidate->details->country_id:null)->class('form-control')->placeholder('Choose  Country')); ?>

                                            <small class="text-danger"><?php echo e($errors->first('country')); ?></small>
                                        </div>
                                    </div>


                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group<?php echo e($errors->has('state') ? ' has-error' : ''); ?>">
                                            <?php echo e(html()->label('State', 'state')); ?>

                                            <?php echo e(html()->select('state', App\Models\State::where('id', $candidate->details->state_id)->pluck('name', 'id'), $candidate->details?$candidate->details->state_id:null)->class('form-control')->placeholder('State')); ?>

                                            <small class="text-danger"><?php echo e($errors->first('state')); ?></small>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group<?php echo e($errors->has('district') ? ' has-error' : ''); ?>">
                                            <?php echo e(html()->label('District', 'district')); ?>

                                            <?php echo e(html()->select('district', App\Models\District::where('id', $candidate->details->district_id)->pluck('name', 'id'), $candidate->details?$candidate->details->district_id:null)->class('form-control')->placeholder('District')); ?>

                                            <small class="text-danger"><?php echo e($errors->first('district')); ?></small>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group<?php echo e($errors->has('city') ? ' has-error' : ''); ?>">
                                            <?php echo e(html()->label('City', 'city')); ?>

                                            <?php echo e(html()->select('city', App\Models\City::where('id', $candidate->details->city_id)->pluck('name', 'id'), $candidate->details?$candidate->details->city_id:null)->class('form-control')->placeholder('City')); ?>

                                            <small class="text-danger"><?php echo e($errors->first('city')); ?></small>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group<?php echo e($errors->has('pincode') ? ' has-error' : ''); ?>">
                                            <?php echo e(html()->label('Pincode', 'pincode')); ?>

                                            <?php echo e(html()->text('pincode', $candidate->details?$candidate->details->pincode:null)->class('form-control')->placeholder('Pincode')); ?>

                                            <small class="text-danger"><?php echo e($errors->first('pincode')); ?></small>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group<?php echo e($errors->has('address') ? ' has-error' : ''); ?>">
                                            <?php echo e(html()->label('Address', 'address')); ?>

                                            <?php echo e(html()->text('address',  $candidate->details?$candidate->details->address:null)->class('form-control')->placeholder('Address')); ?>

                                            <small class="text-danger"><?php echo e($errors->first('address')); ?></small>
                                        </div>
                                    </div>

                                </div>
                               
                               <?php echo e(html()->button('Save Data')->type('button')->class('btn btn-primary')->attribute('onclick = store(this)')); ?>

                               <?php echo e(html()->form()->close()); ?>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="user-profile-wrapper">
                    <div class="user-profile-card">
                        <h4 class="user-profile-card-title">Social Network</h4>
                        <div class="col-lg-6">
                            <div class="profile-social">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#"><i class="fab fa-pinterest"></i></a>
                                <a href="#"><i class="fab fa-whatsapp"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- employer-dashboard end -->   


<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>

<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript" src="<?php echo e(asset('assets/dropify-master/dist/js/dropify.min.js')); ?>"></script>
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


  
    $('#industry').select2({
        placeholder: 'Choose Industry',
        allowClear: true,
        ajax: {
            url: '<?php echo e(route('web.common.candidate.industries')); ?>',
            dataType: 'json',
            cache: true,
            delay: 200,
            data: function(params) {
                return {
                    term: params.term || '',
                    page: params.page || 1
                }
            },
        }
    });
  
    $('.dropify').dropify({
        messages: {
            'default': 'Drag and drop a logo here or click',
            'replace': 'Drag and drop or click to replace',
            'remove':  'Remove',
            //'error':   'Ooops, something wrong happended.'
        }
    });
</script>


<?php $__env->stopPush(); ?>
<?php echo $__env->make('common.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mamoonnasar/Documents/enabledtalent/resources/views/candidate/details.blade.php ENDPATH**/ ?>