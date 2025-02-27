<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\JobListing;
use Illuminate\Http\Request;
class JobController extends Controller
{
    function index(Request $request){

        if ($request->ajax()) {
            $datas =  JobListing::orderBy('created_at', 'desc');
            $totaldata = $datas->count();
            $result["length"]= $request->length;
            $result["recordsTotal"]= $totaldata;
            $result["recordsFiltered"]= $datas->count();
            $records = $datas->limit($request->length)->offset($request->start)->get();

            $result['data'] = [];
            foreach ($records as $data) {
                $result['data'][] = [
                    'sn' => ++$request->start,
                    'id' => $data->id,
                    'title' => 'ok',
                    'industry' => 'ok1',
                    'date' => 'ok2',
                    'status' => 'ok2',
                    'action' => 'ok2',
                ];
            }
            return $result;
        }

        return view('company.job.index');
    }

    public function create(){
        return view('company.job.create');
    }

    public function store(Request $request){
        //return $request->all();
        $company = auth('company')->user();
        $request->validate([
            'title'            => 'required|string|max:255',
            'salary_type'      => 'required|string|max:255',
            'category'     => 'required',
            'job_type'         => 'required',
            'experience'       => 'required',
            'qualification'    => 'required',
            'offer_salary_min' => 'required|numeric|min:0',
            'offer_salary_max' => 'required|numeric|min:0|gte:offer_salary_min',
            'skills'           => 'required|array|min:1',
            'country'          => 'required',
            'state'            => 'required',
            'district'         => 'required',
            'city'             => 'required',
            'pincode'          => 'required|digits:6',
            'address'          => 'required|string|max:500',
            'about_job'        => 'required|string|max:2000',
            'status'           => 'required',
            'deadline'         => 'required|date|after_or_equal:today',
        ]);
        
        $job = new JobListing;
        $job->title = $request->title;
        $job->salary_type = $request->salary_type;
        $job->company_id = $company->id;
        $job->job_category_id = $request->category;
        $job->job_type_id = $request->job_type;
        $job->experience_id = $request->experience;
        $job->offer_salary_min = $request->offer_salary_min;
        $job->offer_salary_max = $request->offer_salary_max;
        $job->country_id = $request->country;
        $job->state_id = $request->state;
        $job->district_id = $request->district;
        $job->city_id = $request->city;
        $job->pincode = $request->pincode;
        $job->address = $request->address;
        $job->status_id = $request->status;
        $job->description = $request->about_job;
        $job->deadline = databaseDate($request->deadline);
        if($job->save()){

            $job->skills()->sync($request->skills);
            $job->qualifications()->sync($request->qualifications);

            return response()->json([
                'class' => 'bg-success', 
                'error' => false, 
                'message' => 'New Job Post Saved Successfully', 
                'call_back' => route('company.jobs.index')
            ]);
        }
    }
}
