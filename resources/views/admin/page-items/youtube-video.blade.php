{{ html()->form('POST', route('admin.page.section.update', $section->id))->attribute('enctype', 'multipart/form-data')->id('storeForm')->open() }}




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
                    {{ html()->text('title', $content['title']??'')->class('form-control')->placeholder('Title') }}
                    <small class="text-danger">{{ $errors->first('title') }}</small>
                </div>
                <div class="form-group{{ $errors->has('youtube_id') ? ' has-error' : '' }}">
                    {{ html()->label('Youtube ID', 'youtube_id') }}
                    {{ html()->text('youtube_id', $content['youtube_id']??'')->class('form-control')->placeholder('Youtube ID') }}
                    <small class="text-danger">{{ $errors->first('youtube_id') }}</small>
                </div>

                @php
                    $styles = json_decode($section->styles, true);
                @endphp
                <div class="form-group{{ $errors->has('margin') ? ' has-error' : '' }}">
                    {{ html()->label('Margin', 'margin') }}
                    <div class="d-flex gap-2">
                        {{ html()->number('margin_top', $styles['margin']['top'])->class('form-control')->placeholder('Top') }}
                        {{ html()->number('margin_right', $styles['margin']['right'])->class('form-control')->placeholder('Right') }}
                        {{ html()->number('margin_bottom', @$styles['margin']['bottom'])->class('form-control')->placeholder('Bottom') }}
                        {{ html()->number('margin_left', @$styles['margin']['left'])->class('form-control')->placeholder('Left') }}
                    </div>
                    <small class="text-danger">{{ $errors->first('margin') }}</small>
                </div>

                <div class="form-group{{ $errors->has('padding') ? ' has-error' : '' }}">
                    {{ html()->label('Padding', 'padding') }}
                    <div class="d-flex gap-2">
                        {{ html()->number('padding_top', @$styles['padding']['left'])->class('form-control')->placeholder('Top') }}
                        {{ html()->number('padding_right', @$styles['padding']['left'])->class('form-control')->placeholder('Right') }}
                        {{ html()->number('padding_bottom', @$styles['padding']['left'])->class('form-control')->placeholder('Bottom') }}
                        {{ html()->number('padding_left', @$styles['padding']['left'])->class('form-control')->placeholder('Left') }}
                    </div>
                    <small class="text-danger">{{ $errors->first('padding') }}</small>
                </div>


            </div>

            <div class="col-md-6 col-sm-12">
                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                    {{ html()->label('Description', 'description') }}
                    {{ html()->textarea('description', $content['description']??'')->class('form-control')->placeholder('Description') }}
                    <small class="text-danger">{{ $errors->first('description') }}</small>
                </div>




                <div class="form-group media-area" file-name="image">
                    <div class="media-file-value">
                        @if(isset($content['thumbnail_image']))
                        <input type="hidden" name="image" value="{{App\Models\Media::where('file', $content['thumbnail_image'])->value('id')}}" class="fileid{{$section->id}}">
                        @endif
                    </div>
                    <div class="media-file">
                         @if(isset($content['thumbnail_image']))
                        <div class="file-container d-inline-block fileid{{$section->id}}">
                            <span data-id="{{$section->id}}" class="remove-file">✕</span>
                            <img class="w-100 d-block img-thumbnail" src="{{asset($content['thumbnail_image'])}}" alt="img">
                        </div>
                        @endif
                    </div>
                    <a class="text-secondary form-control select-mediatype" href="javascript:void(0);" mediatype='single' onclick="loadMediaFiles($(this))">Select Image</a>
                </div>

                <div class="form-group{{ $errors->has('ordering') ? ' has-error' : '' }}">
                    {{ html()->label('Ordering', 'ordering') }}
                    {{ html()->text('ordering', $section->ordering)->class('form-control')->placeholder('Ordering') }}
                    <small class="text-danger">{{ $errors->first('ordering') }}</small>
                </div>

            </div>
        </div>
    </div>
</div>

{{ html()->form()->close() }}

