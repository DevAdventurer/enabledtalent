<?php $__env->startPush('links'); ?>

<?php $__env->stopPush(); ?>


<?php $__env->startSection('main'); ?>


    <?php $__currentLoopData = $page->pageItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if(view()->exists("admin.page-items.{$section->type}")): ?>
            <?php echo $__env->make("admin.page-items.{$section->type}", ['content' => $section->content, 'section' => $section], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<div id="newSection" style="display: none;">
     <?php echo e(html()->form('POST', route('admin.page.section.store', $page->id))->attribute('enctype', 'multipart/form-data')->id('storeForm')->open()); ?>

        <div id="pageSection">
            
        </div>
     <?php echo e(html()->button('Save Data')->type('button')->class('btn btn-success bg-gradient')->attribute('onclick = store(this)')); ?>

                <?php echo e(html()->form()->close()); ?>

</div>




<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <div class="form-group<?php echo e($errors->has('section') ? ' has-error' : ''); ?>">
            <?php echo e(html()->select('section', App\Models\Section::orderBy('name', 'asc')->pluck('name', 'id'))->class('form-control')->placeholder('Add New Section')); ?>

            <small class="text-danger"><?php echo e($errors->first('section')); ?></small>
        </div>
    </div>
    <div class="col-md-4"></div>
</div>

<div class="modal fade zoomIn" id="pageItem" tabindex="-1" aria-labelledby="pageItemLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0">
            <div class="modal-header p-3 bg-success-subtle">
                <h5 class="modal-title" id="pageItemLabel">Create Folder</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" id="addFolderBtn-close" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php echo e(html()->form('POST', route('admin.page.section.store', $page->id))->attribute('enctype', 'multipart/form-data')->id('storeForm')->open()); ?>


                
                <?php echo e(html()->button('Save Data')->type('button')->class('btn btn-success bg-gradient')->attribute('onclick = store(this)')); ?>

                <?php echo e(html()->form()->close()); ?>

            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
   <script>
       $('body').on('change', '#section', function(){
            var id = $(this).val();
            $.ajax({
                type: "GET",
                enctype: 'multipart/form-data',
                url: '<?php echo e(route('admin.common.page.item.add', '')); ?>/'+id,
                success: function(response) {
                    $('#pageSection').append(response);
                    $('#newSection').show();
                    setTimeout(function(){
                        $('#section').val('').trigger('change');
                    }, 500);
                }
            });
       });
   </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/asifjamal/Documents/enabledtalent/resources/views/admin/page/add-section.blade.php ENDPATH**/ ?>