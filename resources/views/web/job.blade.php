@extends('common.layouts.master')
@push('links')
@endpush


@section('main')
       




        <!-- job grid -->
        <div class="job-grid ">
            <div class="container">

                <div class="search-form mt-5 mb-5">
                    <div class="col-lg-9 mx-auto">
                        <div class="search-form-wrapper">
                            <form action="#">
                                <div class="row">
                                    <div class="col-md-4 px-0">
                                        <div class="form-group">
                                            <div class="form-group-icon">
                                                <input type="text" class="form-control"
                                                    placeholder="Type Keyword...">
                                                <i class="fe-search"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 px-0">
                                        <div class="form-group">
                                            <div class="form-group-icon">
                                                <select class="select">
                                                    <option value="">Location</option>
                                                    <option value="1">Brazil</option>
                                                    <option value="2">Canada</option>
                                                    <option value="3">Germany</option>
                                                    <option value="4">Italy</option>
                                                    <option value="5">Japan</option>
                                                    <option value="6">USA</option>
                                                    <option value="7">UK</option>
                                                </select>
                                                <i class="fe-map-pin"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 px-0">
                                        <div class="form-group">
                                            <div class="form-group-icon">
                                                <select class="select">
                                                    <option value="">Category</option>
                                                    <option value="1">Web Designer</option>
                                                    <option value="2">Developer</option>
                                                    <option value="3">Software</option>
                                                    <option value="4">Finance</option>
                                                    <option value="5">Management</option>
                                                    <option value="6">Advertising</option>
                                                    <option value="7">Accountant</option>
                                                </select>
                                                <i class="fe-briefcase"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 px-1">
                                        <div class="form-group">
                                            <button type="submit" class="theme-btn w-100"><span
                                                    class="fe-search"></span>Search</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4 col-xl-3 mb-4">
                        <div class="job-sidebar">
                            
                 

                         <div class="job-sidebar-item">
    <h4 class="job-sidebar-title">Job Type</h4>
    <div class="job-type">
        @foreach(App\Models\JobType::orderBy('name', 'asc')->get() as $job_type)
            <div class="form-check">
                <input class="form-check-input filter" name="job_types[]" type="checkbox" value="{{$job_type->id}}">
                <label class="form-check-label">
                    {{$job_type->name}} <span>({{$job_type->jobListings()->count()}})</span>
                </label>
            </div>
        @endforeach
    </div>
</div>

<div class="job-sidebar-item">
    <h4 class="job-sidebar-title">Experience Level</h4>
    <div class="job-experience">
        @foreach(App\Models\Experience::orderBy('name', 'asc')->get() as $experience)
            <div class="form-check">
                <input class="form-check-input filter" name="experiences[]" type="checkbox" value="{{$experience->id}}">
                <label class="form-check-label">
                    {{$experience->name}} <span>({{$experience->jobListings->count()}})</span>
                </label>
            </div>
        @endforeach
    </div>
</div>
                           
                        </div>
                    </div>
                    <div class="col-lg-8 col-xl-9">
                        
    <div class="row" id="jobListContainer">
        @include('web.partials.job_list', ['jobs' => $jobs])
    </div>



                            

                            
                        </div>

                        <!-- pagination -->
                        <div class="pagination-area">
    <div aria-label="Page navigation example">
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($jobs->onFirstPage())
                <li class="page-item disabled">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true"><i class="far fa-angle-double-left"></i></span>
                    </a>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $jobs->previousPageUrl() }}" aria-label="Previous">
                        <span aria-hidden="true"><i class="far fa-angle-double-left"></i></span>
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($jobs->links()->elements[0] as $page => $url)
                <li class="page-item {{ $page == $jobs->currentPage() ? 'active' : '' }}">
                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                </li>
            @endforeach

            {{-- Next Page Link --}}
            @if ($jobs->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $jobs->nextPageUrl() }}" aria-label="Next">
                        <span aria-hidden="true"><i class="far fa-angle-double-right"></i></span>
                    </a>
                </li>
            @else
                <li class="page-item disabled">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true"><i class="far fa-angle-double-right"></i></span>
                    </a>
                </li>
            @endif
        </ul>
    </div>

    {{-- Pagination Showing Information --}}
    <div class="pagination-showing">
        <p>Showing {{ $jobs->firstItem() }} - {{ $jobs->lastItem() }} of {{ $jobs->total() }} Jobs</p>
    </div>
</div>

                    </div>
                </div>
            </div>
        </div>

        
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    $('.filter').on('change', function() {
        let jobTypes = [];
        let experiences = [];

        $('input[name="job_types[]"]:checked').each(function() {
            jobTypes.push($(this).val());
        });

        $('input[name="experiences[]"]:checked').each(function() {
            experiences.push($(this).val());
        });

        $.ajax({
            url: "{{ route('web.jobs') }}",
            type: "GET",
            data: {
                job_types: jobTypes,
                experiences: experiences
            },
            beforeSend: function() {
                $('#jobListContainer').html('<div class="text-center">Loading...</div>');
            },
            success: function(response) {
                $('#jobListContainer').html(response.jobList);
            }
        });
    });
});
</script>
        @endpush