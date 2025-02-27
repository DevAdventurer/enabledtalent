@extends('admin.layouts.master')
@push('links')

@endpush


@section('main')


    @foreach($page->pageItems as $section)
        @if(view()->exists("admin.page-items.{$section->type}"))
            @include("admin.page-items.{$section->type}", ['content' => $section->content, 'section' => $section])
        @endif
    @endforeach

<div id="newSection" style="display: none;">
     {{ html()->form('POST', route('admin.page.section.store', $page->id))->attribute('enctype', 'multipart/form-data')->id('storeForm')->open() }}
        <div id="pageSection">
            
        </div>
     {{ html()->button('Save Data')->type('button')->class('btn btn-success bg-gradient')->attribute('onclick = store(this)') }}
                {{ html()->form()->close() }}
</div>




<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <div class="form-group{{ $errors->has('section') ? ' has-error' : '' }}">
            {{ html()->select('section', App\Models\Section::orderBy('name', 'asc')->pluck('name', 'id'))->class('form-control')->placeholder('Add New Section') }}
            <small class="text-danger">{{ $errors->first('section') }}</small>
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
                {{ html()->form('POST', route('admin.page.section.store', $page->id))->attribute('enctype', 'multipart/form-data')->id('storeForm')->open() }}
{{-- 
                <div id="pageSection">
                    
                </div> --}}
                
                {{ html()->button('Save Data')->type('button')->class('btn btn-success bg-gradient')->attribute('onclick = store(this)') }}
                {{ html()->form()->close() }}
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
                    $('#pageSection').append(response);
                    $('#newSection').show();
                    setTimeout(function(){
                        $('#section').val('').trigger('change');
                    }, 500);
                }
            });
       });
   </script>
@endpush