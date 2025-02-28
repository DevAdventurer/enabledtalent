@php
    $jobs = App\Models\JobListing::where('status_id', 14)
    ->with(['state', 'city', 'jobType'])
    ->where('deadline', '>=', today())->paginate(12);
@endphp
<div class="job-area bg py-120">
            <div class="container">

              <div class="row">
                    <div class="col-lg-6 mx-auto">
                        <div class="site-heading text-center">
                            <span class="site-title-tagline">Recent Jobs</span>
                            <h2 class="site-title">Find Your Dream Job</h2>
                        </div>
                    </div>
                </div>




        

<div class="row">
@foreach($jobs as $job)
    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
        <div class="card-grid-2 hover-up">
            <div class="card-grid-2-image-left"><span class="flash"></span>
                <div class="image-box job-company-logo"><img src="{{asset($job->company->details->logo)}}"></div>
                <div class="right-info"><a class="name-job" href="company-details.html">{{$job->company->details->company_name}}</a><span class="location-small">{{$job->city->name}}, {{$job->state->country->name}}</span></div>
            </div>
            <div class="card-block-info">
                <h6><a href="{{route('web.job.single', $job->slug)}}">{{$job->title}}</a></h6>
                <a href="{{route('web.job.category', $job->jobCategory->slug)}}">{{ $job->jobCategory->name }}</a>
                <div class="mt-1"><span class="card-briefcase">{{$job->jobType->name}}</span><span class="card-time">{{ $job->created_at->diffForHumans() }}</span>
                </div>
                <p class="font-sm color-text-paragraph mt-15">
                    {{ Str::words(strip_tags($job->description), 30, '...') }}
                </p>
                <div class="mt-30">
                    @foreach($job->skills as $skill)
                        <a class="btn btn-grey-small mr-5" href="jobs-grid.html">{{$skill->name}}</a>
                    @endforeach
                </div>
                <div class="card-2-bottom mt-30">
                    <div class="row">
                        
                        <div class="col-lg-12 col-12 text-center">
                            <div class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalApplyJobForm">Apply now</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
</div>
</div>
</div>
