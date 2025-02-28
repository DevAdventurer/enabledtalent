<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\JobCategory;
use App\Models\JobListing;
use Illuminate\Http\Request;

class JobListingController extends Controller{

    public function single(JobListing $job){
        return $job->load(['jobCategory', 'jobType']);
    }

    public function category(JobCategory $category){
        return $category->load('jobListings');
    }
}
