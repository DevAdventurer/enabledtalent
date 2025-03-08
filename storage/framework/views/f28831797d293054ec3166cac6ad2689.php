<?php echo e(html()->hidden('type', 'recent-job')); ?>


<div class="card" style="position:relative;">
    <div class="card-header">
        <div class="d-flex align-items-center justify-content-between">
            <div class="">
                <h6 class="card-title mb-0">Recent Job</h6>
            </div>

            <div class="">
                <div class="m-0 form-group<?php echo e($errors->has('ordering') ? ' has-error' : ''); ?>">
                    <?php echo e(html()->text('ordering')->class('form-control form-control-sm')->placeholder('Ordering')); ?>

                    <small class="text-danger"><?php echo e($errors->first('ordering')); ?></small>
                </div>
            </div>

            <div class="">
                <?php echo e(html()->button('Save Data')->type('button')->class('btn btn-sm btn-soft-secondary')->attribute('onclick = store(this)')); ?>


                <a class="btn btn-sm btn-soft-danger" href="">Delete</a>
            </div>
        </div>
    </div>
    <div class="card-body">

        <div class="row">
            <div class="col-md-3 col-sm-12">
                <div class="form-group<?php echo e($errors->has('heading') ? ' has-error' : ''); ?>">
                    <?php echo e(html()->label('Heading', 'heading')); ?>

                    <?php echo e(html()->text('heading')->class('form-control')->placeholder('Heading')); ?>

                    <small class="text-danger"><?php echo e($errors->first('heading')); ?></small>
                </div>
            </div>

            <div class="col-md-3 col-sm-12">
                <div class="form-group<?php echo e($errors->has('subheading') ? ' has-error' : ''); ?>">
                    <?php echo e(html()->label('Subheading', 'subheading')); ?>

                    <?php echo e(html()->text('subheading')->class('form-control')->placeholder('Subheading')); ?>

                    <small class="text-danger"><?php echo e($errors->first('subheading')); ?></small>
                </div>
            </div>

            <div class="col-md-3 col-sm-12">
                <div class="form-group<?php echo e($errors->has('button_label') ? ' has-error' : ''); ?>">
                    <?php echo e(html()->label('Button Label', 'button_label')); ?>

                    <?php echo e(html()->text('button_label')->class('form-control')->placeholder('Button Label')); ?>

                    <small class="text-danger"><?php echo e($errors->first('button_label')); ?></small>
                </div>
            </div>

            <div class="col-md-3 col-sm-12">
                <div class="form-group<?php echo e($errors->has('button_link') ? ' has-error' : ''); ?>">
                    <?php echo e(html()->label('Button Link', 'button_link')); ?>

                    <?php echo e(html()->text('button_link')->class('form-control')->placeholder('Button Link')); ?>

                    <small class="text-danger"><?php echo e($errors->first('button_link')); ?></small>
                </div>
            </div>


            <div class="col-md-6 col-sm-12">
                <div class="form-group<?php echo e($errors->has('margin') ? ' has-error' : ''); ?>">
                    <?php echo e(html()->label('Margin', 'margin')); ?>

                    <div class="d-flex gap-2">
                        <?php echo e(html()->number('margin_top')->class('form-control')->placeholder('Top')); ?>

                        <?php echo e(html()->number('margin_right')->class('form-control')->placeholder('Right')); ?>

                        <?php echo e(html()->number('margin_bottom')->class('form-control')->placeholder('Bottom')); ?>

                        <?php echo e(html()->number('margin_left')->class('form-control')->placeholder('Left')); ?>

                    </div>
                    <small class="text-danger"><?php echo e($errors->first('margin')); ?></small>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">

                <div class="form-group<?php echo e($errors->has('padding') ? ' has-error' : ''); ?>">
                    <?php echo e(html()->label('Padding', 'padding')); ?>

                    <div class="d-flex gap-2">
                        <?php echo e(html()->number('padding_top')->class('form-control')->placeholder('Top')); ?>

                        <?php echo e(html()->number('padding_right')->class('form-control')->placeholder('Right')); ?>

                        <?php echo e(html()->number('padding_bottom')->class('form-control')->placeholder('Bottom')); ?>

                        <?php echo e(html()->number('padding_left')->class('form-control')->placeholder('Left')); ?>

                    </div>
                    <small class="text-danger"><?php echo e($errors->first('padding')); ?></small>
                </div>
            </div>

            <hr class="border-primary">

            <div class="col-md-6 col-sm-12">
                <div class="form-group<?php echo e($errors->has('no_of_job') ? ' has-error' : ''); ?>">
                    <?php echo e(html()->label('No Of Job', 'no_of_job')); ?>

                    <?php echo e(html()->text('no_of_job')->class('form-control')->placeholder('No Of Job')); ?>

                    <small class="text-danger"><?php echo e($errors->first('no_of_job')); ?></small>
                </div>
            </div>

        </div>





</div>
</div>

<?php /**PATH /Users/asifjamal/Documents/enabledtalent/resources/views/admin/section-snippets/recent-job.blade.php ENDPATH**/ ?>