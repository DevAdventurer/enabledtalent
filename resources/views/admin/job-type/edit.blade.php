{!! html()->form('PUT', route('admin.job-type.update', $job_type->id))->id('updateForm')->attribute('files', true)->open() !!}

<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        {{ html()->label('Name', 'name') }}
        {{ html()->text('name', $job_type->name)->class('form-control')->placeholder('Name') }}
        <small class="text-danger">{{ $errors->first('name') }}</small>
    </div>


    <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
        {{ html()->label('Status', 'status') }}
        {{ html()->select('status', App\Models\Status::whereIn('id', [14,15])->pluck('name', 'id'), $job_type->status_id)->class('form-control js-choice')->placeholder('Chosse Status') }}
        <small class="text-danger">{{ $errors->first('status') }}</small>
    </div>



{{ html()->button('Update Industry')->type('button')->class('update btn btn-success') }}


{{ html()->form()->close() }}