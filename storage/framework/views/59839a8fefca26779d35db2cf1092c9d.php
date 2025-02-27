<?php echo e(html()->form('POST', route('admin.page.section.update', $section->id))->attribute('enctype', 'multipart/form-data')->id('storeForm')->open()); ?>


<?php
    $styles = json_decode($section->styles, true);
?>

<div class="card">
    
    <div class="card-header">
        <div class="d-flex align-items-center justify-content-between">
            <div class="">
                <h6 class="card-title mb-0">Image With Text</h6>
            </div>

            <div class="">
                <div class="m-0 form-group<?php echo e($errors->has('ordering') ? ' has-error' : ''); ?>">
                    <?php echo e(html()->text('ordering', $section->ordering)->class('form-control form-control-sm')->placeholder('Ordering')); ?>

                    <small class="text-danger"><?php echo e($errors->first('ordering')); ?></small>
                </div>
            </div>

            <div class="">
                <?php echo e(html()->button('Save Data')->type('button')->class('btn btn-sm btn-soft-secondary')->attribute('onclick = store(this)')); ?>


                <a class="btn btn-sm btn-soft-danger" onclick="deleteModel('<?php echo e(route('admin.page.section.destroy', $section->id)); ?>')" href="javascript:void(0)">Delete</a>
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-6">
                <?php echo e(html()->hidden('type', 'image-with-text')); ?>

                <div class="form-group<?php echo e($errors->has('title') ? ' has-error' : ''); ?>">
                    <?php echo e(html()->label('Title', 'title')); ?>

                    <?php echo e(html()->text('title', $content['title']??'')->class('form-control')->placeholder('Title')); ?>

                    <small class="text-danger"><?php echo e($errors->first('title')); ?></small>
                </div>


                <div class="form-group<?php echo e($errors->has('button_label') ? ' has-error' : ''); ?>">
                    <?php echo e(html()->label('Button Label', 'button_label')); ?>

                    <?php echo e(html()->text('button_label', $section->button_label??'')->class('form-control')->placeholder('Button Label')); ?>

                    <small class="text-danger"><?php echo e($errors->first('button_label')); ?></small>
                </div>
            
                <div class="form-group<?php echo e($errors->has('button_link') ? ' has-error' : ''); ?>">
                    <?php echo e(html()->label('Button Link', 'button_link')); ?>

                    <?php echo e(html()->text('button_link', $section->button_link??'')->class('form-control')->placeholder('Button Link')); ?>

                    <small class="text-danger"><?php echo e($errors->first('button_link')); ?></small>
                </div>

                <div class="form-group<?php echo e($errors->has('image_position') ? ' has-error' : ''); ?>">
                    <?php echo e(html()->label('Image Position', 'image_position')); ?>

                    <?php echo e(html()->select('image_position', ['left' => 'Left', 'right' => 'Right'], $content['image_position']??'')->class('form-control')->placeholder('Image Position')); ?>

                    <small class="text-danger"><?php echo e($errors->first('image_position')); ?></small>
                </div>

                 <div class="col-md-12 col-sm-12">
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

                
            </div>

            <div class="col-6">

                <div class="form-group<?php echo e($errors->has('description') ? ' has-error' : ''); ?>">
                    <?php echo e(html()->label('Description', 'description')); ?>

                    <?php echo e(html()->textarea('description', $content['description'])->class('form-control')->placeholder('Description')->attribute('rows', 3)); ?>

                    <small class="text-danger"><?php echo e($errors->first('description')); ?></small>
                </div>

                <div class="form-group media-area" file-name="image">
                    <?php echo e(html()->label('Image', 'image')); ?>

                    <div class="media-file-value">
                         <?php if(isset($content['image'])): ?>
                        <input type="hidden" name="image" value="<?php echo e(App\Models\Media::where('file', $content['image'])->value('id')); ?>" class="fileid<?php echo e($section->id); ?>">
                        <?php endif; ?>
                    </div>
                    <div class="media-file">
                        <?php if($content['image']): ?>
                        <div class="file-container d-inline-block fileid<?php echo e($section->id); ?>">
                            <span data-id="<?php echo e($section->id); ?>" class="remove-file">✕</span>
                            <img class="w-100 d-block img-thumbnail" src="<?php echo e(asset($content['image'])); ?>" alt="img">
                        </div>
                        <?php endif; ?>
                    </div>
                    <a class="text-secondary form-control select-mediatype form-control" href="javascript:void(0);" mediatype='single' onclick="loadMediaFiles($(this))">Select Image</a>
                </div>


                  <div class="col-md-12 col-sm-12">
                        <div class="form-group<?php echo e($errors->has('padding') ? ' has-error' : ''); ?>">
                            <?php echo e(html()->label('Padding', 'padding')); ?>

                            <div class="d-flex gap-2">
                                <?php echo e(html()->number('padding_top', @$styles['padding']['left'])->class('form-control')->placeholder('Top')); ?>

                                <?php echo e(html()->number('padding_right', @$styles['padding']['left'])->class('form-control')->placeholder('Right')); ?>

                                <?php echo e(html()->number('padding_bottom', @$styles['padding']['left'])->class('form-control')->placeholder('Bottom')); ?>

                                <?php echo e(html()->number('padding_left', @$styles['padding']['left'])->class('form-control')->placeholder('Left')); ?>

                            </div>
                            <small class="text-danger"><?php echo e($errors->first('padding')); ?></small>
                        </div>
                    </div>

            </div>

        </div>
    </div>
</div>
<?php echo e(html()->form()->close()); ?>


<?php /**PATH /Users/asifjamal/Documents/enabledtalent/resources/views/admin/page-items/image-with-text.blade.php ENDPATH**/ ?>