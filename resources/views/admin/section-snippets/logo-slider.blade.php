{{ html()->hidden('type', 'logo-slider') }}

<div class="card" style="position:relative;">
    <div class="card-header">
        <div class="d-flex align-items-center justify-content-between">
            <div class="">
                <h6 class="card-title mb-0">Logo Slider</h6>
            </div>

            <div class="">
                <div class="m-0 form-group{{ $errors->has('ordering') ? ' has-error' : '' }}">
                    {{ html()->text('ordering')->class('form-control form-control-sm')->placeholder('Ordering') }}
                    <small class="text-danger">{{ $errors->first('ordering') }}</small>
                </div>
            </div>

            <div class="">
                {{ html()->button('Save Data')->type('button')->class('btn btn-sm btn-soft-secondary')->attribute('onclick = store(this)') }}

                <a class="btn btn-sm btn-soft-danger" href="">Delete</a>
            </div>
        </div>
    </div>
    <div class="card-body">

        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="form-group{{ $errors->has('margin') ? ' has-error' : '' }}">
                    {{ html()->label('Margin', 'margin') }}
                    <div class="d-flex gap-2">
                        {{ html()->number('margin_top')->class('form-control')->placeholder('Top') }}
                        {{ html()->number('margin_right')->class('form-control')->placeholder('Right') }}
                        {{ html()->number('margin_bottom')->class('form-control')->placeholder('Bottom') }}
                        {{ html()->number('margin_left')->class('form-control')->placeholder('Left') }}
                    </div>
                    <small class="text-danger">{{ $errors->first('margin') }}</small>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">

                <div class="form-group{{ $errors->has('padding') ? ' has-error' : '' }}">
                    {{ html()->label('Padding', 'padding') }}
                    <div class="d-flex gap-2">
                        {{ html()->number('padding_top')->class('form-control')->placeholder('Top') }}
                        {{ html()->number('padding_right')->class('form-control')->placeholder('Right') }}
                        {{ html()->number('padding_bottom')->class('form-control')->placeholder('Bottom') }}
                        {{ html()->number('padding_left')->class('form-control')->placeholder('Left') }}
                    </div>
                    <small class="text-danger">{{ $errors->first('padding') }}</small>
                </div>
            </div>
        </div>

        <div class="report-repeater">
            <div id="kt_docs_repeater_advanced">
                <div data-repeater-list="kt_docs_repeater_advanced">
                    @foreach(old('kt_docs_repeater_advanced', [[]]) as $index => $item)
                    <div data-repeater-item class="repeater-row row-{{$index}}">
                        <div class="custom-row gap-3 stock-error d-flex justify-content-between flex-sm-wrape">
                            <div class="w-25 form-group{{ $errors->has("kt_docs_repeater_advanced.$index.logo") ? ' has-error' : '' }}">
                                {{ html()->label('Choose Logo', "kt_docs_repeater_advanced[$index][logo]") }}
                                <div class="media-area" file-name="kt_docs_repeater_advanced[{{ $index }}][logo]">
                                    <div class="media-file-value"></div>
                                    <div class="media-file"></div>
                                    <a class="form-control text-secondary select-mediatype" href="javascript:void(0);" mediatype="single" onclick="loadMediaFiles($(this))">
                                        Select logo
                                    </a>
                                </div>
                                <small class="text-danger">{{ $errors->first("kt_docs_repeater_advanced.$index.logo") }}</small>
                            </div>

                            <div class="w-100 form-group{{ $errors->has("kt_docs_repeater_advanced.$index.title") ? ' has-error' : '' }}">
                                {{ html()->label('Title', "kt_docs_repeater_advanced[$index][title]") }}
                                {{ html()->text("kt_docs_repeater_advanced[$index][title]")->class('form-control')->placeholder('Title') }}
                                <small class="text-danger">{{ $errors->first("kt_docs_repeater_advanced.$index.title") }}</small>
                            </div>

                            <div class="w-100 form-group{{ $errors->has("kt_docs_repeater_advanced.$index.link") ? ' has-error' : '' }}">
                                {{ html()->label('Link', "kt_docs_repeater_advanced[$index][link]") }}
                                {{ html()->text("kt_docs_repeater_advanced[$index][link]")->class('form-control')->placeholder('Link') }}
                                <small class="text-danger">{{ $errors->first("kt_docs_repeater_advanced.$index.link") }}</small>
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
                    @endforeach
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

<script type="text/javascript" src="{{asset('admin-assets/js/pages/form-repeater.js')}}"></script>
<script type="text/javascript">

    var rowCounter = $('#kt_docs_repeater_advanced [data-repeater-item]').length;

    $('#kt_docs_repeater_advanced').repeater({
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
