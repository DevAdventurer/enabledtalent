{!! html()->form('PUT', route('admin.skill.update', $skill->id))->id('updateForm')->attribute('files', true)->open() !!}

<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        {{ html()->label('Name', 'name') }}
        {{ html()->text('name', $skill->name)->class('form-control')->placeholder('Name') }}
        <small class="text-danger">{{ $errors->first('name') }}</small>
    </div>


    <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
        {{ html()->label('Status', 'status') }}
        {{ html()->select('status', App\Models\Status::whereIn('id', [14,15])->pluck('name', 'id'), $skill->status_id)->class('form-control js-choice')->placeholder('Chosse Status') }}
        <small class="text-danger">{{ $errors->first('status') }}</small>
    </div>



{{ html()->button('Update Industry')->type('button')->class('update btn btn-success') }}


{{ html()->form()->close() }}