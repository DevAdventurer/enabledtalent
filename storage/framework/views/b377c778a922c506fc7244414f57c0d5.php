<?php echo e(html()->form('POST', route('admin.page.section.update', $section->id))->attribute('enctype', 'multipart/form-data')->id('storeForm')->open()); ?>

<?php echo e(html()->hidden('type', 'how-it-work')); ?>


<div class="card">

    <div class="card-header">
        <div class="d-flex align-items-center justify-content-between">
            <div class="">
                <h6 class="card-title mb-0">How It Work</h6>
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

            <?php
            $styles = json_decode($section->styles, true);
            ?>
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


        <div class="report-repeater">
            <div id="kt_docs_repeater_advanced_<?php echo e($section->id); ?>">
                <div data-repeater-list="kt_docs_repeater_advanced">
                    <?php $__currentLoopData = $content; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div data-repeater-item class="repeater-row row-<?php echo e($index); ?>">
                        <div class="custom-row gap-3 stock-error d-flex justify-content-between flex-sm-wrape">


                            <div class="w-50 form-group<?php echo e($errors->has("kt_docs_repeater_advanced.$index.title") ? ' has-error' : ''); ?>">
                                <?php echo e(html()->label('Title', "kt_docs_repeater_advanced[$index][title]")); ?>

                                <?php echo e(html()->text("kt_docs_repeater_advanced[$index][title]", $item['title'])->class('form-control')->placeholder('Title')); ?>

                                <small class="text-danger"><?php echo e($errors->first("kt_docs_repeater_advanced.$index.title")); ?></small>
                            </div>

                            <div class="w-100 form-group<?php echo e($errors->has("kt_docs_repeater_advanced.$index.description") ? ' has-error' : ''); ?>">
                                <?php echo e(html()->label('Description', "kt_docs_repeater_advanced[$index][description]")); ?>

                                <?php echo e(html()->text("kt_docs_repeater_advanced[$index][description]", $item['description'])->class('form-control')->placeholder('Description')); ?>

                                <small class="text-danger"><?php echo e($errors->first("kt_docs_repeater_advanced.$index.description")); ?></small>
                            </div>

                            <div class="w-50 form-group<?php echo e($errors->has("kt_docs_repeater_advanced.$index.icon") ? ' has-error' : ''); ?>">
                                <?php echo e(html()->label('Icon', "kt_docs_repeater_advanced[$index][icon]")); ?>

                                <?php echo e(html()->text("kt_docs_repeater_advanced[$index][icon]", $item['icon'])->class('form-control')->placeholder('Icon')); ?>

                                <small class="text-danger"><?php echo e($errors->first("kt_docs_repeater_advanced.$index.icon")); ?></small>
                            </div>

                            <div class="m-0 form-group remove-item" style="width:44px;">
                                <div class="text-end">
                                    <button data-repeater-delete type="button" class="btn-labels btn btn-danger" style="margin-top: 23px;">
                                        <i class="label-icon ri-delete-bin-fill"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="form-group m-0">
                        <button data-repeater-create type="button" class="btn-label btn btn-warning text-end btn-sm">
                            <i class="label-icon align-middle fs-16 me-2 bx bx-plus-circle"></i> Add New Row
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<?php echo e(html()->form()->close()); ?>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script type="text/javascript" src="<?php echo e(asset('admin-assets/js/pages/form-repeater.js')); ?>"></script>
<script type="text/javascript">

    var rowCounter = $('#kt_docs_repeater_advanced_<?php echo e($section->id); ?> [data-repeater-item]').length;

    $('#kt_docs_repeater_advanced_<?php echo e($section->id); ?>').repeater({
        show: function () {
            var $row = $(this);

        // Update names dynamically
            $row.find('.media-area').each(function () {
                var name = $(this).attr('file-name');
                if (name) {
                    name = name.replace(/\[\d+\]/, '[' + rowCounter + ']');
                    $(this).attr('file-name', name);
                }
            });

        // Assign a unique class to each row
            $row.addClass('row-' + rowCounter);
        rowCounter++; // Increment for the next row

        $(this).slideDown();
    },

    hide: function (deleteElement) {
        $(this).slideUp(deleteElement);
    }
});


</script>


<?php /**PATH /Users/asifjamal/Documents/enabledtalent/resources/views/admin/page-items/how-it-work.blade.php ENDPATH**/ ?>