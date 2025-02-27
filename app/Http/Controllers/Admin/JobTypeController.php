<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\JobType\JobTypeCollection;
use App\Models\JobType;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class JobTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            $datas = JobType::orderBy('name', 'asc');
            
            $name = request()->input('name');
            if ($name) {
                $datas->where('name', 'like', '%'.$name.'%');
            }

            $status = $request->input('status');
            if ($status) {
                $datas->where('status_id', 'like', '%'.$status.'%');
            }


            $request->merge(['recordsTotal' => $datas->count(), 'length' => $request->length]);
            $datas = $datas->limit($request->length)->offset($request->start)->get();
            return response()->json(new JobTypeCollection($datas));
           
        }

        return view('admin.job-type.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request )
    {
        return view('admin.job-type.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Employee $employee )
    {   
       
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
        public function store(Request $request) {
            $request->validate([
                'name'=>'required|max:255|unique:job_types',      
                'status'=>'required',    
            ]);

            $job_type = new JobType;
            $job_type->name = $request->name;
            $job_type->status_id = $request->status;
            if($job_type->save()){ 
                return response()->json(['class'=>'bg-success','message'=>'JobType Created Successfuly.']);
            }

            return redirect()->back()->with(['class'=>'error','message'=>'Whoops, looks like something went wrong ! Try again ...']);
        }
        
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $job_type = JobType::find($id);
        return view('admin.job-type.edit', compact('job_type')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => [
                'required',
                'max:255',
                Rule::unique('job_types')->ignore($id) // Ignore the email uniqueness if it's an update
            ],     
            'status'=>'required',    
        ]);

        $job_type = JobType::find($id);
        $job_type->name = $request->name;
        $job_type->status_id = $request->status;
        if($job_type->save()){ 
            return response()->json(['class'=>'bg-success','message'=>'JobType Updated Successfuly.']);
        }

            return redirect()->back()->with(['class'=>'error','message'=>'Whoops, looks like something went wrong ! Try again ...']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $job_type = JobType::find($id);
        if($job_type->delete()){
            return response()->json(['message'=>'JobType deleted Successfully ...', 'class'=>'success']);  
        }
        return response()->json(['message'=>'Whoops, looks like something went wrong ! Try again ...', 'class'=>'error']);
    }
}
