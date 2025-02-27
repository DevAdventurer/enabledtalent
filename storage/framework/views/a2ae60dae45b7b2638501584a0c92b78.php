<?php $__env->startPush('links'); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('main'); ?>

<div class="login-area py-120">
            <div class="container">
                <div class="col-md-8 col-lg-7 col-xl-5 mx-auto">
                    <div class="login-form">
                        <div class="login-header">
                            
                            <p>Create Employer Account</p>
                        </div>

                       <?php echo e(html()->form('POST', route('company.registration.post'))->attribute('enctype', 'multipart/form-data')->id('storeForm')->open()); ?>


<div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
    <?php echo e(html()->label('Name', 'name')); ?>

    <?php echo e(html()->text('name')->class('form-control')->placeholder('Name')->attribute('autocomplete', 'name')); ?>

    <small class="text-danger"><?php echo e($errors->first('name')); ?></small>
</div>

<div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
    <?php echo e(html()->label('Email', 'email')); ?>

    <?php echo e(html()->email('email')->class('form-control')->placeholder('Email')->attribute('autocomplete', 'email')); ?>

    <small class="text-danger"><?php echo e($errors->first('email')); ?></small>
</div>

<div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
    <?php echo e(html()->label('Password', 'password')); ?>

    <?php echo e(html()->password('password')->class('form-control')->placeholder('Password')->attribute('autocomplete', 'new-password')); ?>

    <small class="text-danger"><?php echo e($errors->first('password')); ?></small>
</div>

<div class="form-group<?php echo e($errors->has('password_confirmation') ? ' has-error' : ''); ?>">
    <?php echo e(html()->label('Confirm Password', 'password_confirmation')); ?>

    <?php echo e(html()->password('password_confirmation')->class('form-control')->placeholder('Password Confirm')->attribute('autocomplete', 'new-password')); ?>

    <small class="text-danger"><?php echo e($errors->first('password_confirmation')); ?></small>
</div>

<div class="form-check form-group">
    <input class="form-check-input" type="checkbox" name="terms_of_service" id="agree" />
    <label class="form-check-label" for="agree">
        I agree with the <a href="#">Terms Of Service.</a>
    </label>
    <small class="text-danger"><?php echo e($errors->first('terms_of_service')); ?></small>
</div>

<?php echo e(html()->button('Submit &amp; Register')->type('button')->class('theme-btn')->attribute('onclick', 'store(this)')); ?>


<?php echo e(html()->form()->close()); ?>




                   
                        <div class="login-footer">
                            <div class="login-divider"><span>Or</span></div>
                            <div class="social-login">
                                
                                <a href="<?php echo e(route('company.auth.google')); ?>" class="btn-gl"><i class="fab fa-google"></i> Login With Google</a>
                            </div>
                            <p>Already have an account? <a href="<?php echo e(route('company.login.form')); ?>">Sign In.</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>




<?php $__env->stopSection(); ?>
<?php echo $__env->make('common.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/asifjamal/Documents/enabledtalent/resources/views/company/auth/registration.blade.php ENDPATH**/ ?>