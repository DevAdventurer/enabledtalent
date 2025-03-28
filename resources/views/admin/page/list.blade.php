    @extends('admin.layouts.master')
    @push('links')
    <!-- Select2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0/css/select2.min.css" rel="stylesheet" />
    <!-- Select2 JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0/js/select2.min.js"></script>
    <style>
        .choices {
            margin-bottom: 0 !important;
        }
    </style>
    @endpush




    @section('main')



    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">{{Str::title(str_replace('-', ' ', request()->segment(2)))}}</h4>

                {{ Breadcrumbs::render('companies') }}
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-lg-4">
            <a href="javascript:void(0);" class="btn btn-soft-success create"><i class="ri-add-line align-bottom me-1"></i> Add New</a>
        </div>

        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">

                    <form class="m-0">
                        <div class="d-flex gap-3 justify-content-between">

                            <div class="w-100">
                                <div class="m-0 form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    {{ html()->label('Name', 'name') }}
                                    <div class="search-box">
                                        {{ html()->search('name')->class('searchFilter form-control search')->placeholder('Name') }}
                                        <i class="ri-search-line search-icon"></i>
                                    </div>
                                    <small class="text-danger">{{ $errors->first('name') }}</small>
                                </div>
                            </div>
                            <!--end col-->
                           

                            <div class="w-50">
                                <div class="m-0 form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                                    {{ html()->label('Status', 'status') }}
                                        {{ html()->select('status', App\Models\Status::whereIn('id', [1,14,15])->pluck('name', 'id'))->class('form-control js-choice searchFilterChange') }}
                                    <small class="text-danger">{{ $errors->first('status') }}</small>
                                </div>
                            </div>


                            <!--end col-->
                        </div>
                        <!--end row-->
                    </form>
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable" class="table align-middle datatable table-sm border-secondary table-bordered nowrap" style="width:100%">

                            <thead>
                                <tr>
                                    <th>Si</th>
                                    <th>Title</th>
                                    <th>Slug</th>
                                    @can(['edit_page','delete_page', 'read_page'])
                                    <th>Action</th>
                                    @endcan
                                </tr>
                            </thead>
                            <tbody id="sortable-table">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div><!--end col-->
    </div><!--end row-->


<div class="modal fade zoomIn" id="page" tabindex="-1" aria-labelledby="pageLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0">
            <div class="modal-header p-3 bg-success-subtle">
                <h5 class="modal-title" id="pageLabel">Add New Page</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" id="addFolderBtn-close" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{ html()->form('POST', route('admin.page.store'))->attribute('enctype', 'multipart/form-data')->id('storeForm')->open() }}

                    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                        {{ html()->label('Title', 'title') }}
                        {{ html()->text('title')->class('form-control')->placeholder('Title') }}
                        <small class="text-danger">{{ $errors->first('title') }}</small>
                    </div>

                    <div class="form-group{{ $errors->has('slug') ? ' has-error' : '' }}">
                        {{ html()->label('Slug', 'slug') }}
                        <div class="input-group"> 
                            <span class="input-group-text">{{ url('page/'). '/' }}</span>
                            {{ html()->text('slug')->class('form-control')->placeholder('Slug') }}
                        </div>
                        <small class="text-danger">{{ $errors->first('slug') }}</small>
                    </div>

                    <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                        {{ html()->label('Status', 'status') }}
                        {{ html()->select('status', App\Models\Status::whereIn('id', [14,15])->pluck('name', 'id'))->class('form-control js-choice')->id('mystatus')->placeholder('Chosse Status') }}
                        <small class="text-danger">{{ $errors->first('status') }}</small>
                    </div>
                
                {{ html()->button('Save Data')->type('button')->class('btn btn-success bg-gradient')->attribute('onclick = store(this)') }}
                {{ html()->form()->close() }}
            </div>
        </div>
    </div>
</div>
@endsection


    @push('scripts')
<script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
<script>
    $(document).ready(function() {
        $(".js-choice").each(function() {
            new Choices($(this)[0], {
                allowHTML: true,
            }); 
        });
    });

    $('body').on('click', '.create', function(){
        $('#page').modal('show');
    });
</script>
    <script type="text/javascript">

        $(document).ready(function(){
            var table2 = $('#datatable').DataTable({
                "processing": true,
                "serverSide": true,
                "ordering": false,
                "searching": false,
                "lengthMenu": [25, 50, 100, 250, 500],
                'ajax': {
                    'url': '{{ route('admin.'.request()->segment(2).'.index') }}',
                    'data': function(d) {
                        d._token = '{{ csrf_token() }}';
                        d._method = 'PATCH';
                        d.name = $('#name').val();
                        d.email = $('#email').val();
                        d.mobile = $('#mobile').val();
                        d.status = $('#status').val();
                    }

                },
                "columns": [
                    { "data": "sn" },
                    { "data": "title" },
                    { "data": "slug" },
                    {
                        "data": "action",
                        render: function(data, type, row) {
                            if (type === 'display') {
                        var btn = '<div class="dropdown d-inline-block"><button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="align-middle ri-more-fill"></i></button><ul class="dropdown-menu dropdown-menu-end">';

                        @can(['edit_page','delete_page','read_page'])

                        @can('read_page')
                        btn += '<li><a class="dropdown-item" href="{{ request()->url() }}/' + row['id'] + '"><i class="align-bottom ri-eye-fill me-2 text-muted"></i> View</a></li>';
                        @endcan

                        @can('edit_page')
                        btn+='<li><a class="dropdown-item edit-item-btn" href="'+window.location.href+'/'+row['id']+'/edit"><i class="align-bottom ri-pencil-fill me-2 text-muted"></i> Edit</a></li>';
                        @endcan

                        @can('delete_page')
                        btn += '<li><button type="button" onclick="deleteModel(\''+window.location.href+'/'+row['id']+'/delete\')" class="dropdown-item remove-item-btn"><i class="align-bottom ri-delete-bin-fill me-2 text-muted"></i> Delete</button></li>';
                        @endcan

                        @endcan
                        btn += '</ul></div>';
                        return btn;
                    }
                    return ' ';
                },
            }]

        });

     $('body').on('keyup', '.searchFilter', function(){
        table2.draw('page');
    });

    $('body').on('change', '.searchFilterChange', function(){
        table2.draw('page');
    });


});
$('body').on('keyup', '#title', function(){
    var title = $(this).val();
    if (title.length > 0) {
        $.ajax({
            url: '{{ route('admin.common.page.generate.slug') }}',
            type: 'GET',
            data: { title: title },
            success: function (response) {
                $('#slug').val(response.slug);
            }
        });
    } else {
        $('#slug').val('');
    }
});



</script>



    @endpush
