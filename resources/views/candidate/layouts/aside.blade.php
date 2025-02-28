<div class="user-profile-sidebar">
    <div class="user-profile-sidebar-top">
        <div class="user-profile-img">
            @if(empty(optional(auth('candidate')->user())->avatar))
                <img src="{{ asset('assets/img/candidate.png') }}" alt="Candidate Avatar">
            @else
                <img src="{{ auth('candidate')->user()->avatar }}" alt="Candidate Avatar">
            @endif
            <button type="button" class="profile-img-btn"><i class="far fa-camera"></i></button>
            <input type="file" class="profile-img-file">
        </div>

        <h4>{{ optional(auth('candidate')->user()->details)->candidate_name ?? 'N/A' }}</h4>

        @if(optional(auth('candidate')->user()->details)->industry)
            <p>{{ optional(auth('candidate')->user()->details->industry)->name ?? 'No Industry' }}</p>
        @endif
    </div>

    <ul class="user-profile-sidebar-list">
        <li>
          <a class="active" href="{{ route('candidate.dashboard.index') }}"><i class="far fa-gauge-high"></i> Dashboard</a>
        </li>

        <li>
          <a href="{{ route('candidate.details.detail') }}"><i class="far fa-user-tie"></i> Candidate Profile</a>
        </li>

        {{-- <li class="has-children">
          <a href="javascript:void(0);"><i class="far fa-user-tie"></i> Jobs</a>
          <div class="side-dropdown">
              <ul style="margin-left:10px;">
                   <li>
                      <a href="{{ route('candidate.jobs.index') }}"><i class="fa-solid fa-minus"></i> All Jobs</a>
                    </li>
                    <li>
                      <a href="{{ route('candidate.jobs.create') }}"><i class="fa-solid fa-minus"></i>Add New Job</a>
                    </li>
              </ul>
          </div>
        </li> --}}

        <li>
          <a href="{{ route('candidate.logout') }}"><i class="far fa-sign-out"></i> Logout</a>
        </li>
    </ul>
</div>
