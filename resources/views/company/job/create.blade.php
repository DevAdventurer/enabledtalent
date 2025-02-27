@extends('common.layouts.master')
@push('links')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush


@section('main')
<!-- employer-dashboard -->
<div class="user-profile py-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">

                @include('company.layouts.aside')


            </div>
            <div class="col-lg-9">
                <div class="user-profile-wrapper">
                   <div class="user-profile-card">
                    {{ html()->form('POST', route('company.jobs.store'))->attribute('enctype', 'multipart/form-data')->id('storeForm')->open() }}

                    

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                {{ html()->label('Job Title', 'title') }}
                                {{ html()->text('title')->class('form-control')->placeholder('Enter Job Title') }}
                                <small class="text-danger">{{ $errors->first('title') }}</small>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group {{ $errors->has('category') ? ' has-error' : '' }}">
                                {{ html()->label('Job Category', 'category') }}
                                {{ html()->select('category', App\Models\JobCategory::orderBy('name', 'asc')->pluck('name', 'id'))->class(' select')->placeholder('Choose Job Category') }}
                                <small class="text-danger">{{ $errors->first('category') }}</small>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group {{ $errors->has('job_type') ? ' has-error' : '' }}">
                                {{ html()->label('Job Type', 'job_type') }}
                                {{ html()->select('job_type', App\Models\JobType::orderBy('name', 'asc')->pluck('name', 'id'))->placeholder('Choose Job Type')->class('select') }}
                                <small class="text-danger">{{ $errors->first('job_type') }}</small>
                            </div>
                        </div>


                        <div class="col-md-6 col-sm-12">
                            <div class="form-group {{ $errors->has('experience') ? ' has-error' : '' }}">
                                {{ html()->label('Experience', 'experience') }}
                                {{ html()->select('experience', App\Models\Experience::orderBy('name', 'asc')->pluck('name', 'id'))->placeholder('Choose Experience')->class('select') }}
                                <small class="text-danger">{{ $errors->first('experience') }}</small>
                            </div>
                        </div>
                         <div class="col-md-6 col-sm-12">
                            <div class="form-group {{ $errors->has('qualification') ? ' has-error' : '' }}">
                                {{ html()->label('Qualification', 'qualification') }}
                                {{ html()->select('qualification[]', [])->id('qualification')->class('form-control') }}
                                <small class="text-danger">{{ $errors->first('qualification') }}</small>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-12">
                            <div class="form-group {{ $errors->has('offer_salary_min') ? ' has-error' : '' }}">
                                {{ html()->label('Offer Salary Min', 'offer_salary_min') }}
                                {{ html()->text('offer_salary_min')->class('form-control')->placeholder('Enter Offered Minimum Salary') }}
                                <small class="text-danger">{{ $errors->first('offer_salary_min') }}</small>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-12">
                            <div class="form-group {{ $errors->has('offer_salary_max') ? ' has-error' : '' }}">
                                {{ html()->label('Offer Salary Max', 'offer_salary_max') }}
                                {{ html()->text('offer_salary_max')->class('form-control')->placeholder('Enter Offered Maximum Salary') }}
                                <small class="text-danger">{{ $errors->first('offer_salary_max') }}</small>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-12">
                            <div class="form-group {{ $errors->has('salary_type') ? ' has-error' : '' }}">
                                {{ html()->label('Salary Type', 'salary_type') }}
                                {{ html()->select('salary_type', ['Per hour' => 'Per hour', 'Per month' => 'Per month', 'Per annum' => 'Per annum'])->class('form-control')->placeholder('Salary Type') }}
                                <small class="text-danger">{{ $errors->first('salary_type') }}</small>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group {{ $errors->has('skills') ? ' has-error' : '' }}">
                                {{ html()->label('Required Skills', 'skills') }}
                                {{ html()->select('skills[]', [])->id('skills')->class('form-control') }}
                                <small class="text-danger">{{ $errors->first('skills') }}</small>
                            </div>
                        </div>


                        <div class="col-sm-12 col-md-6">
                            <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
                                {{ html()->label('Country', 'country') }}
                                {{ html()->select('country', [])->class('form-control')->placeholder('Choose  Country') }}
                                <small class="text-danger">{{ $errors->first('country') }}</small>
                            </div>
                        </div>


                        <div class="col-sm-12 col-md-6">
                            <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
                                {{ html()->label('State', 'state') }}
                                {{ html()->select('state', [])->class('form-control')->placeholder('State') }}
                                <small class="text-danger">{{ $errors->first('state') }}</small>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-6">
                            <div class="form-group{{ $errors->has('district') ? ' has-error' : '' }}">
                                {{ html()->label('District', 'district') }}
                                {{ html()->select('district', [])->class('form-control')->placeholder('District') }}
                                <small class="text-danger">{{ $errors->first('district') }}</small>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-6">
                            <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                                {{ html()->label('City', 'city') }}
                                {{ html()->select('city', [])->class('form-control')->placeholder('City') }}
                                <small class="text-danger">{{ $errors->first('city') }}</small>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-6">
                            <div class="form-group{{ $errors->has('pincode') ? ' has-error' : '' }}">
                                {{ html()->label('Pincode', 'pincode') }}
                                {{ html()->text('pincode')->class('form-control')->placeholder('Pincode') }}
                                <small class="text-danger">{{ $errors->first('pincode') }}</small>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-6">
                            <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                {{ html()->label('Address', 'address') }}
                                {{ html()->text('address')->class('form-control')->placeholder('Address') }}
                                <small class="text-danger">{{ $errors->first('address') }}</small>
                            </div>
                        </div>


                       
                        <div class="col-md-6">
                            <div class="form-group {{ $errors->has('deadline') ? ' has-error' : '' }}">
                                {{ html()->label('Deadline', 'deadline') }}
                                {{ html()->date('deadline')->class('form-control') }}
                                <small class="text-danger">{{ $errors->first('deadline') }}</small>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                                {{ html()->label('Status', 'status') }}
                                {{ html()->select('status', App\Models\Status::whereIn('id', [14, 15])->pluck('name', 'id'))->class('form-control')->placeholder('Choose Status') }}
                                <small class="text-danger">{{ $errors->first('status') }}</small>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group{{ $errors->has('about_job') ? ' has-error' : '' }}">
                                {{ html()->label('About Job', 'about_job') }}
                                {{ html()->textarea('about_job')->class('form-control')->placeholder('About Job') }}
                                <small class="text-danger">{{ $errors->first('about_job') }}</small>
                            </div>
                        </div>

                    </div>
                    
                    {{ html()->button('<span class="far fa-check-circle"></span> Publish Your Job', 'button')->attribute('onclick = store(this)')->class('theme-btn') }}
                    {{ html()->form()->close() }}
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- employer-dashboard end -->   
@endsection


@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function(){
        getCountry('country')
    });

    $('body').on('change', '#country', function(){
        var country = $(this).val();
        $('#state, #district, #city').val(null).trigger('change');
        getState('state', country)
    });


    $('body').on('change', '#state', function(){
        var state = $(this).val();
        $('#district, #city').val(null).trigger('change');
        getDistrict('district', state)
    });

    $('body').on('change', '#district', function(){
        var district = $(this).val();
        $('#city').val(null).trigger('change');
        getCity('city', district)
    });

    $(document).ready(function() {
        $('#skills').select2({
            placeholder: "Select Skills",
            allowClear: true,
            multiple: true,
            ajax: {
                url: "{{ route('web.common.skills.list') }}",
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        term: params.term, // Search term
                        page: params.page || 1
                    };
                },
                processResults: function (data, params) {
                    params.page = params.page || 1;

                    return {
                        results: data.results,
                        pagination: {
                            more: data.pagination.more
                        }
                    };
                },
                cache: true
            },
            //minimumInputLength: 1 // Start searching after 1 character
        });
    });


    $(document).ready(function() {
        $('#qualification').select2({
            placeholder: "Select Qualification",
            allowClear: true,
            multiple: true,
            ajax: {
                url: "{{ route('web.common.qualification.list') }}",
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        term: params.term, // Search term
                        page: params.page || 1
                    };
                },
                processResults: function (data, params) {
                    params.page = params.page || 1;

                    return {
                        results: data.results,
                        pagination: {
                            more: data.pagination.more
                        }
                    };
                },
                cache: true
            },
            //minimumInputLength: 1 // Start searching after 1 character
        });
    });
</script>
@endpush
