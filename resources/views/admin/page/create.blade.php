@extends('admin.layouts.master')
@push('links')

@endpush




@section('main')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">{{ Str::title(str_replace('-', ' ', request()->segment(2))) }}</h4>
            @can('browse_client')
                <div class="page-title-right">
                    <a href="{{ route('admin.' . request()->segment(2) . '.index') }}"
                        class="btn-sm btn btn-secondary btn-label">
                        <i class="align-middle bx bx-list-ul label-icon fs-16 me-2"></i>
                        All {{ Str::title(str_replace('-', ' ', request()->segment(2))) }}s List
                    </a>
                </div>
            @endcan

        </div>
    </div>
</div>




<div class="row">
    <div class="col-md-12">
        <div class="form-group{{ $errors->has('section') ? ' has-error' : '' }}">
            {{ html()->label('Section', 'section') }}
            {{ html()->select('section', App\Models\Section::orderBy('name', 'asc')->pluck('name', 'id'))->class('form-control')->placeholder('Add New Section') }}
            <small class="text-danger">{{ $errors->first('section') }}</small>
        </div>
    </div>
</div>


<div class="modal fade zoomIn" id="pageItem" tabindex="-1" aria-labelledby="pageItemLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0">
            <div class="modal-header p-3 bg-success-subtle">
                <h5 class="modal-title" id="pageItemLabel">Create Folder</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" id="addFolderBtn-close" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form autocomplete="off" class="needs-validation createfolder-form" id="createfolder-form" novalidate="">
                   <div id="pageSection">
                       hghjgj
                   </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection




@push('scripts')
    <script>
        $('body').on('change', '#section', function(){
            var id = $(this).val();
            $.ajax({
                type: "GET",
                enctype: 'multipart/form-data',
                url: '{{ route('admin.common.page.item.add', '') }}/'+id,
                success: function(response) {
                    $('#pageSection').html(response);
                    $('#pageItem').modal('show');
                }
            });
        });
    </script>
@endpush
