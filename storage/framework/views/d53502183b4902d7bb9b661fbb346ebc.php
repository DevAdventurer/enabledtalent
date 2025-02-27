<?php $__env->startPush('links'); ?>
<link rel="stylesheet" href="<?php echo e(asset('admin-assets/libs/select2/css/select2.min.css')); ?>"> 
<?php $__env->stopPush(); ?>


<?php $__env->startSection('main'); ?>

<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0 font-size-18">App Setting</h4>

            

                <?php echo e(Breadcrumbs::render('app-setting')); ?>

            </div>
        </div>
    </div>


    <div class="row my-1">
        <div class="col-lg-12 col-sm-12 col-12">

            <div class="card">
                <div class="card-header">
                    <ul class="rounded nav nav-tabs-custom card-header-tabs border-bottom-0" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#app_basic_info" role="tab">
                                <i class="bx bxs-user"></i> Basic Info
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#app_contact_details" role="tab">
                                <i class="bx bxs-key"></i> Contact Details
                            </a>
                        </li>

                    </ul>
                </div>

                <div class="p-4 card-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="app_basic_info" role="tabpanel">

                            <?php echo e(html()->form('POST', route('admin.app-setting.basic-info'))->class('form-horizontal')->attribute('id', 'appsetting')->attribute('files', true)->open()); ?>

                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <div class="mb-3 form-group<?php echo e($errors->has('app_name') ? ' has-error' : ''); ?>">
                                        <?php echo e(html()->label('App Name')->for('app_name')); ?>

                                        <?php echo e(html()->text('app_name', $app_setting->app_name)->class('form-control')->required()->placeholder('App Name')); ?>

                                        <small class="text-danger"><?php echo e($errors->first('app_name')); ?></small>
                                    </div>

                                     <div class="mb-3 form-group<?php echo e($errors->has('app_tag_line') ? ' has-error' : ''); ?>">
                                        <?php echo e(html()->label('App Tag Line')->for('app_tag_line')); ?>

                                        <?php echo e(html()->text('app_tag_line', $app_setting->app_tag_line)->class('form-control')->required()->placeholder('App Tag Line')); ?>

                                        <small class="text-danger"><?php echo e($errors->first('app_tag_line')); ?></small>
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12">
                                   <div class="mb-3 form-group<?php echo e($errors->has('app_description') ? ' has-error' : ''); ?>">
                                        <?php echo e(html()->label('App Description')->for('app_description')); ?>

                                        <?php echo e(html()->textarea('app_description', $app_setting->app_description)->class('form-control')->placeholder('App Description')->rows(4)); ?>

                                        <small class="text-danger"><?php echo e($errors->first('app_description')); ?></small>
                                    </div>
                                </div>


                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="d-flex justify-content-between">
                                            <div class="media-area" file-name="logo">
                                                <div class="media-file-value">
                                                    <?php if($app_setting->siteLogo): ?>
                                                    <input type="hidden" name="logo[]" value="<?php echo e($app_setting->logo); ?>" class="fileid<?php echo e($app_setting->logo); ?>">
                                                    <?php endif; ?>
                                                </div>
                                                <div class="media-file">
                                                    <?php if($app_setting->siteLogo): ?>
                                                    <div class="file-container d-inline-block fileid<?php echo e($app_setting->logo); ?>">
                                                        <span data-id="<?php echo e($app_setting->logo); ?>" class="remove-file">✕</span>
                                                        <img class="w-100 d-block img-thumbnail" src="<?php echo e(asset($app_setting->siteLogo->file)); ?>" alt="<?php echo e($app_setting->title); ?>">
                                                    </div>
                                                    <?php endif; ?>
                                                </div>
                                                <p><br></p>
                                                <a class="text-secondary form-control select-mediatype" href="javascript:void(0);" mediatype='single' onclick="loadMediaFiles($(this))">Select Logo</a>
                                            </div>

                                            <div class="media-area" file-name="favicon">
                                                <div class="media-file-value">
                                                    <?php if($app_setting->siteFavicon): ?>
                                                    <input type="hidden" name="favicon[]" value="<?php echo e($app_setting->favicon); ?>" class="fileid<?php echo e($app_setting->favicon); ?>">
                                                    <?php endif; ?>
                                                </div>
                                                <div class="media-file">
                                                    <?php if($app_setting->siteFavicon): ?>
                                                    <div class="file-container d-inline-block fileid<?php echo e($app_setting->favicon); ?>">
                                                        <span data-id="<?php echo e($app_setting->favicon); ?>" class="remove-file">✕</span>
                                                        <img class="w-100 d-block img-thumbnail" src="<?php echo e(asset($app_setting->siteFavicon->file)); ?>" alt="<?php echo e($app_setting->title); ?>">
                                                    </div>
                                                    <?php endif; ?>
                                                </div>
                                                <p><br></p>
                                                <a class="text-secondary select-mediatype form-control" href="javascript:void(0);" mediatype='single' onclick="loadMediaFiles($(this))">Select Favicon</a>
                                            </div>


                                            <div class="media-area" file-name="footer_logo">
                                                <div class="media-file-value">
                                                    <?php if($app_setting->footerLogo): ?>
                                                    <input type="hidden" name="footer_logo[]" value="<?php echo e($app_setting->footer_logo); ?>" class="fileid<?php echo e($app_setting->footer_logo); ?>">
                                                    <?php endif; ?>
                                                </div>
                                                <div class="media-file">
                                                    <?php if($app_setting->footerLogo): ?>
                                                    <div class="file-container d-inline-block fileid<?php echo e($app_setting->footer_logo); ?>">
                                                        <span data-id="<?php echo e($app_setting->footer_logo); ?>" class="remove-file">✕</span>
                                                        <img class="w-100 d-block img-thumbnail" src="<?php echo e(asset($app_setting->footerLogo->file)); ?>" alt="<?php echo e($app_setting->title); ?>">
                                                    </div>
                                                    <?php endif; ?>
                                                </div>
                                                <p><br></p>
                                                <a class="text-secondary form-control select-mediatype" href="javascript:void(0);" mediatype='single' onclick="loadMediaFiles($(this))">Select Footer Logo</a>
                                            </div>


                                        </div>
                                        </div>


                                        <div class="col-sm-6 text-end mt-3">
                                            <?php echo e(html()->button('Save Basic Info')->type('button')->attribute('onclick = store(this)')->class('btn btn-success store')); ?>

                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <?php echo e(html()->form()->close()); ?>


                        </div>
                        <!--end tab-pane-->


                        <div class="tab-pane" id="app_contact_details" role="tabpanel">
                           <?php echo e(html()->form('POST', route('admin.app-setting.contact-details'))->class('form-horizontal')->attribute('id', 'appsetting')->attribute('files', true)->open()); ?>


                           <div class="row">
                               <div class="col-md-6">
                                   <div class="mb-3 form-group<?php echo e($errors->has('owner_name') ? ' has-error' : ''); ?>">
                                        <?php echo e(html()->label('Owner Name')->for('owner_name')); ?>

                                        <?php echo e(html()->text('owner_name', $app_setting->owner_name)->class('form-control')->required()->placeholder('Owner Name')); ?>

                                        <small class="text-danger"><?php echo e($errors->first('owner_name')); ?></small>
                                    </div>
                               </div>

                               <div class="col-md-6">
                                   <div class="mb-3 form-group<?php echo e($errors->has('mobile_number') ? ' has-error' : ''); ?>">
                                        <?php echo e(html()->label('Mobile Number')->for('mobile_number')); ?>

                                        <?php echo e(html()->text('mobile_number', $app_setting->mobile_number)->class('form-control')->required()->placeholder('Mobile Number')); ?>

                                        <small class="text-danger"><?php echo e($errors->first('mobile_number')); ?></small>
                                    </div>
                               </div>

                               <div class="col-md-6">
                                   <div class="mb-3 form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                                        <?php echo e(html()->label('Email')->for('email')); ?>

                                        <?php echo e(html()->text('email', $app_setting->email)->class('form-control')->required()->placeholder('Email')); ?>

                                        <small class="text-danger"><?php echo e($errors->first('email')); ?></small>
                                    </div>
                               </div>

                               <div class="col-md-6">
                                   <div class="form-group<?php echo e($errors->has('country') ? ' has-error' : ''); ?>">
                                        <?php echo e(html()->label('Country', 'country')); ?>

                                        <?php echo e(html()->select('country', App\Models\Country::where('id', $app_setting->country_id)->pluck('name', 'id'), $app_setting->country_id)->class('form-control country')->placeholder('Choose Country')); ?>

                                        <small class="text-danger"><?php echo e($errors->first('country')); ?></small>
                                    </div>
                               </div>

                               <div class="col-md-6">
                                   <div class="form-group<?php echo e($errors->has('state') ? ' has-error' : ''); ?>">
                    <?php echo e(html()->label('State', 'state')); ?>

                    <?php echo e(html()->select('state', App\Models\State::where('country_id', $app_setting->country_id)->pluck('name', 'id'), $app_setting->state_id)->class('form-control state')->placeholder('Choose State')); ?>

                    <small class="text-danger"><?php echo e($errors->first('State')); ?></small>
                </div>
            </div>

                <div class="col-md-6">
                    <div class="form-group<?php echo e($errors->has('district') ? ' has-error' : ''); ?>">
                    <?php echo e(html()->label('District', 'district')); ?>

                    <?php echo e(html()->select('district', App\Models\District::where('state_id', $app_setting->state_id)->pluck('name', 'id'), $app_setting->district_id)->class('form-control district')->placeholder('Choose District')); ?>

                    <small class="text-danger"><?php echo e($errors->first('district')); ?></small>
                </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group<?php echo e($errors->has('city') ? ' has-error' : ''); ?>">
                        <?php echo e(html()->label('City', 'city')); ?>

                        <?php echo e(html()->select('city', App\Models\City::where('district_id', $app_setting->district_id)->selectRaw('id, CONCAT(name, " - ", pin_code) as name_with_pin')->pluck('name_with_pin', 'id'),$app_setting->city_id)->class('form-control city')->placeholder('Choose City')); ?>

                        <small class="text-danger"><?php echo e($errors->first('city')); ?></small>
                    </div>

                    <div class="mb-3 form-group<?php echo e($errors->has('pincode') ? ' has-error' : ''); ?>">
                        <?php echo e(html()->label('Pincode')->for('pincode')); ?>

                        <?php echo e(html()->text('pincode', $app_setting->pincode)->id('company_pincode')->class('form-control')->required()->placeholder('Pincode')); ?>

                        <small class="text-danger"><?php echo e($errors->first('pincode')); ?></small>
                    </div>

                </div>

                <div class="col-md-6">
                                   <div class="mb-3 form-group<?php echo e($errors->has('address') ? ' has-error' : ''); ?>">
                                        <?php echo e(html()->label('Address')->for('address')); ?>

                                        <?php echo e(html()->textarea('address', $app_setting->address)->id('company_address')->class('form-control')->required()->placeholder('Address')->rows(5)); ?>

                                        <small class="text-danger"><?php echo e($errors->first('address')); ?></small>
                                    </div>
                               </div>


                               <div class="col-sm-6 text-end mt-3">
                                    <?php echo e(html()->button('Save Contact Details')->attribute('onclick = store(this)')->type('button')->class('btn btn-success store')); ?>

                                </div>
                           </div>
                           <?php echo e(html()->form()->close()); ?>

                       </div>
                       <!--end tab-pane-->

                   </div>
               </div>
           </div>
       </div>
   </div>
   <?php $__env->stopSection(); ?>



   <?php $__env->startPush('scripts'); ?>
   <script src="<?php echo e(asset('admin-assets/libs/select2/js/select2.min.js')); ?>" type="text/javascript"></script>

   <script>
       $('#country').select2({
        placeholder: 'Choose Country',
        allowClear: true,
        ajax: {
            url: '<?php echo e(route('admin.common.country.list')); ?>',
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

    function getState(country){
        $('#state').select2({
            placeholder: 'Choose State',
            allowClear: true,
            ajax: {
                url: '<?php echo e(route('admin.common.state.list', '')); ?>/'+country,
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
    }
    $('body').on('change', '.country', function(){
        var country = $(this).val();
        getState(country);
    });


    function getDistrict(state){
        $('#district').select2({
            placeholder: 'Choose District',
            allowClear: true,
            ajax: {
                url: '<?php echo e(route('admin.common.district.list', '')); ?>/'+state,
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
    }


    $('body').on('change', '#state', function(){
        var state = $(this).val();
        getDistrict(state);
    });



    function getCity(district){
        $('#city').select2({
            placeholder: 'Choose City',
            allowClear: true,
            ajax: {
                url: '<?php echo e(route('admin.common.city.list', '')); ?>/'+district,
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
    }

    $('body').on('change', '#district', function(){
        var district = $(this).val();
        getCity(district);
    });

    <?php if($app_setting->country_id): ?>
        getState(<?php echo e($app_setting->country_id); ?>);
    <?php endif; ?>

    <?php if($app_setting->state_id): ?>
        getDistrict(<?php echo e($app_setting->state_id); ?>);
    <?php endif; ?>

    <?php if($app_setting->district_id): ?>
        getCity(<?php echo e($app_setting->district_id); ?>);
    <?php endif; ?>
   </script>
   <?php $__env->stopPush(); ?>


<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/asifjamal/Documents/enabledtalent/resources/views/admin/app-setting/index.blade.php ENDPATH**/ ?>