<?php echo e(html()->hidden('type', 'recent-job')); ?>

<?php
    $styles = json_decode($section->styles, true);
?>
<div class="card" style="position:relative;">
    <div class="card-header">
        <div class="d-flex align-items-center justify-content-between">
            <div class="">
                <h6 class="card-title mb-0">Recent Job</h6>
            </div>

            <div class="">
                <div class="m-0 form-group<?php echo e($errors->has('ordering') ? ' has-error' : ''); ?>">
                    <?php echo e(html()->text('ordering', $section->ordering)->class('form-control form-control-sm')->placeholder('Ordering')); ?>

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

                    <?php echo e(html()->text('heading', $section->heading)->class('form-control')->placeholder('Heading')); ?>

                    <small class="text-danger"><?php echo e($errors->first('heading')); ?></small>
                </div>
            </div>

            <div class="col-md-3 col-sm-12">
                <div class="form-group<?php echo e($errors->has('subheading') ? ' has-error' : ''); ?>">
                    <?php echo e(html()->label('Subheading', 'subheading')); ?>

                    <?php echo e(html()->text('subheading', $section->subheading)->class('form-control')->placeholder('Subheading')); ?>

                    <small class="text-danger"><?php echo e($errors->first('subheading')); ?></small>
                </div>
            </div>

            <div class="col-md-3 col-sm-12">
                <div class="form-group<?php echo e($errors->has('button_label') ? ' has-error' : ''); ?>">
                    <?php echo e(html()->label('Button Label', 'button_label')); ?>

                    <?php echo e(html()->text('button_label', $section->button_label)->class('form-control')->placeholder('Button Label')); ?>

                    <small class="text-danger"><?php echo e($errors->first('button_label')); ?></small>
                </div>
            </div>

            <div class="col-md-3 col-sm-12">
                <div class="form-group<?php echo e($errors->has('button_link') ? ' has-error' : ''); ?>">
                    <?php echo e(html()->label('Button Link', 'button_link')); ?>

                    <?php echo e(html()->text('button_link', $section->button_link)->class('form-control')->placeholder('Button Link')); ?>

                    <small class="text-danger"><?php echo e($errors->first('button_link')); ?></small>
                </div>
            </div>


            <div class="col-md-6 col-sm-12">
                <div class="form-group<?php echo e($errors->has('margin') ? ' has-error' : ''); ?>">
                    <?php echo e(html()->label('Margin', 'margin')); ?>

                    <div class="d-flex gap-2">
                        <?php echo e(html()->number('margin_top', $styles['margin']['top'])->class('form-control')->placeholder('Top')); ?>

                        <?php echo e(html()->number('margin_right', $styles['margin']['right'])->class('form-control')->placeholder('Right')); ?>

                        <?php echo e(html()->number('margin_bottom', @$styles['margin']['bottom'])->class('form-control')->placeholder('Bottom')); ?>

                        <?php echo e(html()->number('margin_left', @$styles['margin']['left'])->class('form-control')->placeholder('Left')); ?>

                    </div>
                    <small class="text-danger"><?php echo e($errors->first('margin')); ?></small>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">

                <div class="form-group<?php echo e($errors->has('padding') ? ' has-error' : ''); ?>">
                    <?php echo e(html()->label('Padding', 'padding')); ?>

                    <div class="d-flex gap-2">
                        <?php echo e(html()->number('padding_top', @$styles['padding']['top'])->class('form-control')->placeholder('Top')); ?>

                        <?php echo e(html()->number('padding_right', @$styles['padding']['right'])->class('form-control')->placeholder('Right')); ?>

                        <?php echo e(html()->number('padding_bottom', @$styles['padding']['bottom'])->class('form-control')->placeholder('Bottom')); ?>

                        <?php echo e(html()->number('padding_left', @$styles['padding']['left'])->class('form-control')->placeholder('Left')); ?>

                    </div>
                    <small class="text-danger"><?php echo e($errors->first('padding')); ?></small>
                </div>
            </div>


        </div>





</div>
</div>

<?php /**PATH /Users/asifjamal/Documents/enabledtalent/resources/views/admin/page-items/recent-job.blade.php ENDPATH**/ ?>