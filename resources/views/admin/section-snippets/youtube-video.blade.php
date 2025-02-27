<div class="card">

    <div class="card-header">
        <div class="d-flex align-items-center">
            <div class="flex-grow-1">
                <h6 class="card-title mb-0">Youtube Video</h6>
            </div>
            <div class="flex-shrink-0">
                {{ html()->button('Save Data')->type('button')->class('btn btn-sm btn-soft-secondary')->attribute('onclick = store(this)') }}

                <a class="btn btn-sm btn-soft-danger" href="">Delete</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        {{ html()->hidden('type', 'youtube-video') }}
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                    {{ html()->label('Title', 'title') }}
                    {{ html()->text('title')->class('form-control')->placeholder('Title') }}
                    <small class="text-danger">{{ $errors->first('title') }}</small>
                </div>
                <div class="form-group{{ $errors->has('youtube_id') ? ' has-error' : '' }}">
                    {{ html()->label('Youtube ID', 'youtube_id') }}
                    {{ html()->text('youtube_id')->class('form-control')->placeholder('Youtube ID') }}
                    <small class="text-danger">{{ $errors->first('youtube_id') }}</small>
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

            <div class="col-md-6 col-sm-12">
                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                    {{ html()->label('Description', 'description') }}
                    {{ html()->textarea('description')->class('form-control')->placeholder('Description') }}
                    <small class="text-danger">{{ $errors->first('description') }}</small>
                </div>




                <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                    <div class="media-area" file-name="image">
                        <div class="media-file-value"></div>
                        <div class="media-file"></div>
                        <a class="text-secondary select-mediatype form-control " href="javascript:void(0);" mediatype='single' onclick="loadMediaFiles($(this))">Select Thumbnail Image</a>
                    </div>
                    <small class="text-danger">{{ $errors->first('image') }}</small>
                </div>

                <div class="form-group{{ $errors->has('ordering') ? ' has-error' : '' }}">
                    {{ html()->label('Ordering', 'ordering') }}
                    {{ html()->text('ordering')->class('form-control')->placeholder('Ordering') }}
                    <small class="text-danger">{{ $errors->first('ordering') }}</small>
                </div>
            </div>
        </div>
    </div>
</div>