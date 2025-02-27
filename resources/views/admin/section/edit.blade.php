{!! html()->form('PUT', route('admin.section.update', $section->id))->id('updateForm')->attribute('files', true)->open() !!}

<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    {{ html()->label('Name', 'name') }}
                    {{ html()->text('name', $section->name)->class('form-control')->placeholder('Name') }}
                    <small class="text-danger">{{ $errors->first('name') }}</small>
                </div>

                <div class="form-group{{ $errors->has('snippet_name') ? ' has-error' : '' }}">
                    {{ html()->label('Snippet Name', 'snippet_name') }}
                    {{ html()->text('snippet_name', $section->name)->class('form-control')->placeholder('Snippet Name') }}
                    <small class="text-danger">{{ $errors->first('snippet_name') }}</small>
                </div>



{{ html()->button('Update Section')->type('button')->class('update btn btn-success') }}


{{ html()->form()->close() }}