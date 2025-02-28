@extends('common.layouts.master')
@push('links')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/dropify-master/dist/css/dropify.min.css') }}">
@endpush


@section('main')
<!-- employer-profile -->
<div class="user-profile py-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">

                @include('candidate.layouts.aside')


            </div>
            <div class="col-lg-9">

                <div class="user-profile-wrapper">
                    <div class="user-profile-card">
                        <h4 class="user-profile-card-title">Profile Details</h4>
                        <div class="col-lg-12">
                            <div class="profile-form">
                                {{ html()->form('POST', route('candidate.details.detail.store'))->attribute('enctype', 'multipart/form-data')->id('storeForm')->open() }}

                                <div class="row">
                                    <div class="col-sm-12 col-md-4">
                                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                            {{ html()->label('Name', 'name') }}
                                            {{ html()->text('name', $candidate->name)->class('form-control')->placeholder('Full Name') }}
                                            <small class="text-danger">{{ $errors->first('name') }}</small>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-md-4">
                                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                            {{ html()->label('Email', 'email') }}
                                            {{ html()->email('email', $candidate->email)->class('form-control')->placeholder('Email')->attribute('readonly') }}
                                            <small class="text-danger">{{ $errors->first('email') }}</small>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-md-4">
                                        <div class="form-group{{ $errors->has('mobile_no') ? ' has-error' : '' }}">
                                            {{ html()->label('Mobile No.', 'mobile_no') }}
                                            {{ html()->text('mobile_no', $candidate->details?$candidate->details->mobile:null)->class('form-control')->placeholder('Mobile No.')->attribute('maxlength', 12)->attribute('oninput', "this.value=this.value.replace(/[^0-9]/g,'')")
                                            }}
                                            <small class="text-danger">{{ $errors->first('mobile_no') }}</small>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group{{ $errors->has('website') ? ' has-error' : '' }}">
                                            {{ html()->label('Website', 'website') }}
                                            {{ html()->text('website', $candidate->details?$candidate->details->website_url:null)->class('form-control')->placeholder('Website') }}
                                            <small class="text-danger">{{ $errors->first('website') }}</small>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-md-3">
                                        <div class="form-group{{ $errors->has('age') ? ' has-error' : '' }}">
                                            {{ html()->label('Age', 'age') }}
                                            {{ html()->number('age', $candidate->details?$candidate->details->age:'')->class('form-control')->placeholder('Age') }}
                                            <small class="text-danger">{{ $errors->first('age') }}</small>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-md-3">
                                        <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                                            {{ html()->label('Gender', 'gender') }}
                                            {{ html()->select('gender', ['male' => 'Male', 'female' => 'Female', 'other' => 'Other'], $candidate->details?$candidate->details->gender:null)
                                                ->class('form-control') }}
                                            <small class="text-danger">{{ $errors->first('gender') }}</small>
                                        </div>
                                    </div>

                                    
                                </div>


                                <div class="row">
                                    
                                    <div class="col-sm-12 col-md-4">
                                        <div class="form-group{{ $errors->has('join_date') ? ' has-error' : '' }}">
                                            {{ html()->label('Join Date', 'join_date') }}
                                            {{ html()->date('join_date', $candidate->details?$candidate->details->join_date:null)->class('form-control') }}
                                            <small class="text-danger">{{ $errors->first('join_date') }}</small>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-md-4">
                                        <div class="form-group{{ $errors->has('qualification_type') ? ' has-error' : '' }}">
                                            {{ html()->label('Qualification Type', 'qualification_type') }}
                                            {{ html()->select('qualification_type', [
                                                    'high_school' => 'High School',
                                                    'bachelor' => 'Bachelor’s Degree',
                                                    'master' => 'Master’s Degree',
                                                    'phd' => 'PhD',
                                                    'other' => 'Other'
                                                ], $candidate->details?$candidate->details->qualification_type:null)->class('form-control') }}
                                            <small class="text-danger">{{ $errors->first('qualification_type') }}</small>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-md-4">
                                        <div class="form-group{{ $errors->has('language') ? ' has-error' : '' }}">
                                            {{ html()->label('Preferred Language', 'language') }}
                                            {{ html()->select('language', [
                                                    'english' => 'English',
                                                    'spanish' => 'Spanish',
                                                    'french' => 'French',
                                                    'german' => 'German',
                                                    'chinese' => 'Chinese',
                                                    'other' => 'Other'
                                                ], $candidate->details?$candidate->details->language:null)->class('form-control') }}
                                            <small class="text-danger">{{ $errors->first('language') }}</small>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-sm-12 col-md-3">
                                        <div class="form-group{{ $errors->has('job_category') ? ' has-error' : '' }}">
                                            {{ html()->label('Job Category', 'job_category') }}
                                            {{ html()->select('job_category', [
                                                    'it' => 'IT & Software',
                                                    'marketing' => 'Marketing',
                                                    'finance' => 'Finance & Accounting',
                                                    'healthcare' => 'Healthcare',
                                                    'education' => 'Education & Training',
                                                    'engineering' => 'Engineering',
                                                    'other' => 'Other'
                                                ], $candidate->details?$candidate->details->job_category:null)->class('form-control') }}
                                            <small class="text-danger">{{ $errors->first('job_category') }}</small>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-md-3">
                                        <div class="form-group{{ $errors->has('dob') ? ' has-error' : '' }}">
                                            {{ html()->label('Date of Birth', 'dob') }}
                                            {{ html()->date('dob', $candidate->details?$candidate->details->dob:null)->class('form-control') }}
                                            <small class="text-danger">{{ $errors->first('dob') }}</small>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-md-2">
                                        <div class="form-group{{ $errors->has('experience') ? ' has-error' : '' }}">
                                            {{ html()->label('Years of Experience', 'experience') }}
                                            {{ html()->number('experience', $candidate->details?$candidate->details->experience:null)->class('form-control')->placeholder('Years of Experience') }}
                                            <small class="text-danger">{{ $errors->first('experience') }}</small>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-md-2">
                                        <div class="form-group{{ $errors->has('current_salary') ? ' has-error' : '' }}">
                                            {{ html()->label('Current Salary', 'current_salary') }}
                                            <div class="input-group">
                                                <span class="input-group-text">$</span>
                                                {{ html()->number('current_salary', $candidate->details?$candidate->details->current_salary:null)->class('form-control')->placeholder('Current Salary') }}
                                            </div>
                                            <small class="text-danger">{{ $errors->first('current_salary') }}</small>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-md-2">
                                        <div class="form-group{{ $errors->has('expected_salary') ? ' has-error' : '' }}">
                                            {{ html()->label('Expected Salary', 'expected_salary') }}
                                            <div class="input-group">
                                                <span class="input-group-text">$</span>
                                                {{ html()->number('expected_salary', $candidate->details?$candidate->details->expected_salary:null)->class('form-control')->placeholder('Expected Salary') }}
                                            </div>
                                            <small class="text-danger">{{ $errors->first('expected_salary') }}</small>
                                        </div>
                                    </div>


                                </div>



                                {{ html()->button('Save Data')->type('button')->class('btn btn-primary')->attribute('onclick = store(this)') }}
                                {{ html()->form()->close() }}

                            </div>
                        </div>
                    </div>
                </div>


                <div class="user-profile-wrapper">
                    <div class="user-profile-card">
                        <h4 class="user-profile-card-title">Skills</h4>
                        <div class="col-sm-12">
                            <div class="form-group{{ $errors->has('skills') ? ' has-error' : '' }}">
                                {{ html()->label('Skills', 'skills') }}
                                {{ html()->text('skills', $candidate->details?$candidate->details->skills:null)->class('form-control')->placeholder('Enter skills, separated by commas') }}
                                <small class="text-danger">{{ $errors->first('skills') }}</small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="user-profile-wrapper">
                    <div class="user-profile-card">
                        <h4 class="user-profile-card-title">Bio</h4>
                        <div class="col-sm-12">
                            <div class="form-group{{ $errors->has('bio') ? ' has-error' : '' }}">
                                {{ html()->label('Bio', 'bio') }}
                                {{ html()->textarea('bio', $candidate->details?$candidate->details->bio:null)->class('form-control')->id('bioEditor') }}
                                <small class="text-danger">{{ $errors->first('bio') }}</small>
                            </div>
                        </div>

                        <script>
                            CKEDITOR.replace('bioEditor', {
                                height: 200,
                                removePlugins: 'image,flash', // Remove unnecessary plugins if needed
                                toolbar: [
                                    { name: 'basicstyles', items: ['Bold', 'Italic', 'Underline', 'Strike'] },
                                    { name: 'paragraph', items: ['NumberedList', 'BulletedList'] },
                                    { name: 'links', items: ['Link', 'Unlink'] },
                                    { name: 'insert', items: ['Table'] },
                                    { name: 'styles', items: ['Format', 'Font', 'FontSize'] },
                                    { name: 'colors', items: ['TextColor', 'BGColor'] }
                                ]
                            });
                        </script>

                    </div>
                </div>




                <div class="user-profile-wrapper">
                    <div class="user-profile-card">
                        <h4 class="user-profile-card-title">Contact Info</h4>
                        <div class="col-lg-12">
                            <div class="profile-form">
                               {{ html()->form('POST', route('candidate.details.contact.store'))->attribute('enctype', 'multipart/form-data')->id('storeForm')->open() }}
                               <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
                                            {{ html()->label('Country', 'country') }}
                                            {{ html()->select('country', App\Models\Country::where('id', $candidate->details->country_id)->pluck('name', 'id'), $candidate->details?$candidate->details->country_id:null)->class('form-control')->placeholder('Choose  Country') }}
                                            <small class="text-danger">{{ $errors->first('country') }}</small>
                                        </div>
                                    </div>


                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
                                            {{ html()->label('State', 'state') }}
                                            {{ html()->select('state', App\Models\State::where('id', $candidate->details->state_id)->pluck('name', 'id'), $candidate->details?$candidate->details->state_id:null)->class('form-control')->placeholder('State') }}
                                            <small class="text-danger">{{ $errors->first('state') }}</small>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group{{ $errors->has('district') ? ' has-error' : '' }}">
                                            {{ html()->label('District', 'district') }}
                                            {{ html()->select('district', App\Models\District::where('id', $candidate->details->district_id)->pluck('name', 'id'), $candidate->details?$candidate->details->district_id:null)->class('form-control')->placeholder('District') }}
                                            <small class="text-danger">{{ $errors->first('district') }}</small>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                                            {{ html()->label('City', 'city') }}
                                            {{ html()->select('city', App\Models\City::where('id', $candidate->details->city_id)->pluck('name', 'id'), $candidate->details?$candidate->details->city_id:null)->class('form-control')->placeholder('City') }}
                                            <small class="text-danger">{{ $errors->first('city') }}</small>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group{{ $errors->has('pincode') ? ' has-error' : '' }}">
                                            {{ html()->label('Pincode', 'pincode') }}
                                            {{ html()->text('pincode', $candidate->details?$candidate->details->pincode:null)->class('form-control')->placeholder('Pincode') }}
                                            <small class="text-danger">{{ $errors->first('pincode') }}</small>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                            {{ html()->label('Address', 'address') }}
                                            {{ html()->text('address',  $candidate->details?$candidate->details->address:null)->class('form-control')->placeholder('Address') }}
                                            <small class="text-danger">{{ $errors->first('address') }}</small>
                                        </div>
                                    </div>

                                </div>
                               
                               {{ html()->button('Save Data')->type('button')->class('btn btn-primary')->attribute('onclick = store(this)') }}
                               {{ html()->form()->close() }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="user-profile-wrapper">
                    <div class="user-profile-card">
                        <h4 class="user-profile-card-title">Social Network</h4>
                        <div class="col-lg-6">
                            <div class="profile-social">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#"><i class="fab fa-pinterest"></i></a>
                                <a href="#"><i class="fab fa-whatsapp"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- employer-dashboard end -->   


@endsection

@push('scripts')

<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript" src="{{ asset('assets/dropify-master/dist/js/dropify.min.js') }}"></script>
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


  
    $('#industry').select2({
        placeholder: 'Choose Industry',
        allowClear: true,
        ajax: {
            url: '{{ route('web.common.candidate.industries') }}',
            dataType: 'json',
            cache: true,
            delay: 200,
            data: function(params) {
                return {
                    term: params.term || '',
                    page: params.page || 1
                }
            },
        }
    });
  
    $('.dropify').dropify({
        messages: {
            'default': 'Drag and drop a logo here or click',
            'replace': 'Drag and drop or click to replace',
            'remove':  'Remove',
            //'error':   'Ooops, something wrong happended.'
        }
    });
</script>


@endpush