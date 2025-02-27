<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\Skill\SkillCollection;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            $datas = Skill::orderBy('name', 'asc');
            
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
            return response()->json(new SkillCollection($datas));
           
        }

        return view('admin.skill.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request )
    {
        return view('admin.skill.create');
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
                'name'=>'required|max:255|unique:skills',      
                'status'=>'required',    
            ]);

            $skill = new Skill;
            $skill->name = $request->name;
            $skill->status_id = $request->status;
            if($skill->save()){ 
                return response()->json(['class'=>'bg-success','message'=>'Skill Created Successfuly.']);
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
        $skill = Skill::find($id);
        return view('admin.skill.edit', compact('skill')); 
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
                Rule::unique('skills')->ignore($id) // Ignore the email uniqueness if it's an update
            ],     
            'status'=>'required',    
        ]);

        $skill = Skill::find($id);
        $skill->name = $request->name;
        $skill->status_id = $request->status;
        if($skill->save()){ 
            return response()->json(['class'=>'bg-success','message'=>'Skill Updated Successfuly.']);
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
        $skill = Skill::find($id);
        if($skill->delete()){
            return response()->json(['message'=>'Skill deleted Successfully ...', 'class'=>'success']);  
        }
        return response()->json(['message'=>'Whoops, looks like something went wrong ! Try again ...', 'class'=>'error']);
    }
}
