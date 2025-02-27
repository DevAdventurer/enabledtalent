<div class="card">
    
    <div class="card-header">
        <div class="d-flex align-items-center justify-content-between">
            <div class="">
                <h6 class="card-title mb-0">Image With Text</h6>
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


        {{ html()->hidden('type', 'image-with-text') }}
        <div class="row">
            <div class="col-md-6">
                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                    {{ html()->label('Title', 'title') }}
                    {{ html()->text('title')->class('form-control')->placeholder('Title') }}
                    <small class="text-danger">{{ $errors->first('title') }}</small>
                </div>

                

                <div class="form-group{{ $errors->has('button_label') ? ' has-error' : '' }}">
                    {{ html()->label('Button Label', 'button_label') }}
                    {{ html()->text('button_label')->class('form-control')->placeholder('Button Label') }}
                    <small class="text-danger">{{ $errors->first('button_label') }}</small>
                </div>
            
                <div class="form-group{{ $errors->has('button_link') ? ' has-error' : '' }}">
                    {{ html()->label('Button Link', 'button_link') }}
                    {{ html()->text('button_link')->class('form-control')->placeholder('Button Link') }}
                    <small class="text-danger">{{ $errors->first('button_link') }}</small>
                </div>

                <div class="form-group{{ $errors->has('image_position') ? ' has-error' : '' }}">
                    {{ html()->label('Image Position', 'image_position') }}
                    {{ html()->select('image_position', ['left' => 'Left', 'right' => 'Right'])->class('form-control')->placeholder('Image Position') }}
                    <small class="text-danger">{{ $errors->first('image_position') }}</small>
                </div>

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

            <div class="col-md-6">
                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                    {{ html()->label('Description', 'description') }}
                    {{ html()->textarea('description')->class('form-control')->placeholder('Description')->attribute('rows', 3) }}
                    <small class="text-danger">{{ $errors->first('description') }}</small>
                </div>
                
                <div class="form-group{{ $errors->has('decription') ? ' has-error' : '' }}">
                    {{ html()->label('Image', 'image') }}
                    <div class="media-area" file-name="image">
                        <div class="media-file-value"></div>
                        <div class="media-file border-1" style="width: 100px !important; margin: 5px; height: 100px;border: 1px solid #ddd;"></div>
                        <a class="text-secondary select-mediatype form-control" href="javascript:void(0);" mediatype='single' onclick="loadMediaFiles($(this))">Select Image</a>
                    </div>
                </div>


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


    </div>
</div>

