<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\JobListing;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home(){
        $page = Page::where('slug', 'home')
            ->with(['pageItems' => function ($query) {
                $query->orderBy('ordering', 'asc');
            }])
            ->first();
        return view('web.home', compact('page'));
    }

    public function signin(){
        return view('web.signin');
    }

    public function page(Request $request, Page $page){
        return view('web.page.single', compact('page'));
    }

    public function jobs(Request $request){
        
        $query = JobListing::where('status_id', 14)
            ->with(['state', 'city', 'jobType'])
            ->where('deadline', '>=', today());

        // Filter by Job Type (Multiple Selection)
        if ($request->has('job_types') && !empty($request->job_types)) {
            $query->whereIn('job_type_id', $request->job_types);
        }

        // Filter by Experience Level (Multiple Selection)
        if ($request->has('experiences') && !empty($request->experiences)) {
            $query->whereIn('experience_id', $request->experiences);
        }

        $jobs = $query->paginate(20);

        // Return JSON response for AJAX requests
        if ($request->ajax()) {
            return response()->json([
                'jobList' => view('web.partials.job_list', compact('jobs'))->render(),
            ]);
        }

        return view('web.job', compact('jobs'));
    }
}
