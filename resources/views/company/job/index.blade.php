@extends('common.layouts.master')
@push('links')
@endpush


@section('main')
<!-- employer-dashboard -->
<div class="user-profile py-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">

                @include('company.layouts.aside')


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
@endsection


@push('scripts')

<script type="text/javascript">

    $(document).ready(function(){
        var table2 = $('#datatable').DataTable({
            "processing": true,
            "serverSide": true,
            "ordering": false,
            "lengthMenu": [25, 50, 100, 250, 500],
            'ajax': {
                'url': '{{ route('company.'.request()->segment(2).'.index') }}',
                'data': function(d) {
                    d._token = '{{ csrf_token() }}';
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



@endpush
