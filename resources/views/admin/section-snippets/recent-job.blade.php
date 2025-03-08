{{ html()->hidden('type', 'recent-job') }}

<div class="card" style="position:relative;">
    <div class="card-header">
        <div class="d-flex align-items-center justify-content-between">
            <div class="">
                <h6 class="card-title mb-0">Recent Job</h6>
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
            <div class="col-md-3 col-sm-12">
                <div class="form-group{{ $errors->has('heading') ? ' has-error' : '' }}">
                    {{ html()->label('Heading', 'heading') }}
                    {{ html()->text('heading')->class('form-control')->placeholder('Heading') }}
                    <small class="text-danger">{{ $errors->first('heading') }}</small>
                </div>
            </div>

            <div class="col-md-3 col-sm-12">
                <div class="form-group{{ $errors->has('subheading') ? ' has-error' : '' }}">
                    {{ html()->label('Subheading', 'subheading') }}
                    {{ html()->text('subheading')->class('form-control')->placeholder('Subheading') }}
                    <small class="text-danger">{{ $errors->first('subheading') }}</small>
                </div>
            </div>

            <div class="col-md-3 col-sm-12">
                <div class="form-group{{ $errors->has('button_label') ? ' has-error' : '' }}">
                    {{ html()->label('Button Label', 'button_label') }}
                    {{ html()->text('button_label')->class('form-control')->placeholder('Button Label') }}
                    <small class="text-danger">{{ $errors->first('button_label') }}</small>
                </div>
            </div>

            <div class="col-md-3 col-sm-12">
                <div class="form-group{{ $errors->has('button_link') ? ' has-error' : '' }}">
                    {{ html()->label('Button Link', 'button_link') }}
                    {{ html()->text('button_link')->class('form-control')->placeholder('Button Link') }}
                    <small class="text-danger">{{ $errors->first('button_link') }}</small>
                </div>
            </div>


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





</div>
</div>

