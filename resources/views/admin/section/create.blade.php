{{ html()->form('POST', route('admin.section.store'))->attribute('enctype', 'multipart/form-data')->id('storeForm')->open() }}

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    {{ html()->label('Name', 'name') }}
                    {{ html()->text('name')->class('form-control')->placeholder('Name') }}
                    <small class="text-danger">{{ $errors->first('name') }}</small>
                </div>

                <div class="form-group{{ $errors->has('snippet_name') ? ' has-error' : '' }}">
                    {{ html()->label('Snippet Name', 'snippet_name') }}
                    {{ html()->text('snippet_name')->class('form-control')->placeholder('Snippet Name') }}
                    <small class="text-danger">{{ $errors->first('snippet_name') }}</small>
                </div>


                {{ html()->button('Save Section')->type('button')->class('btn btn-success store') }}
            {{ html()->form()->close() }}