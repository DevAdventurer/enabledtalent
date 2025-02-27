
<?php $__env->startPush('links'); ?>
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
                    <div class="row">

                        <div class="col-md-12">
                            <div class="card">

                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="datatable" class="table align-middle datatable table-sm border-secondary table-bordered nowrap" style="width:100%">

                                            <thead>
                                                <tr>
                                                    <th>Si</th>
                                                    <th>Job Title</th>
                                                    <th>Industry</th>
                                                    <th>Date</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
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

<script type="text/javascript">

    $(document).ready(function(){
        var table2 = $('#datatable').DataTable({
            "processing": true,
            "serverSide": true,
            "ordering": false,
            "lengthMenu": [25, 50, 100, 250, 500],
            'ajax': {
                'url': '<?php echo e(route('company.'.request()->segment(2).'.index')); ?>',
                'data': function(d) {
                    d._token = '<?php echo e(csrf_token()); ?>';
                    d._method = 'PATCH';
                }

            },
            "columns": [
                { "data": "sn" },
                { "data": "title" },
                { "data": "industry" },
                { "data": "date" },
                { "data": "status" },
                { "data": "action" },
                ]

        });

        $('body').on('keyup', '.searchFilter', function(){
            table2.draw('page');
        });

        $('body').on('change', '.searchFilterChange', function(){
            table2.draw('page');
        });


    });

</script>



<?php $__env->stopPush(); ?>

<?php echo $__env->make('common.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/asifjamal/Documents/enabledtalent/resources/views/company/job/index.blade.php ENDPATH**/ ?>