<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\CandidateDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CandidateController extends Controller
{
    public function detail(){
        $candidate = Candidate::where('id',auth('candidate')->user()->id)->with(['details'])->first();
        return view('candidate.details', compact('candidate'));
    }

    public function detailStore(Request $request){
        $request->validate([
            'full_name' => ['required', 'string', 'max:255'], 
            'email' => ['required', 'string', 'email', 'max:255'], 
            'bio' => ['required', 'string', 'max:2000'], 
            'experience_level' => ['required'], 
            'mobile_no' => ['required'],
            'profile_picture' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],  
        ]);
        
        $candidate = Candidate::where('id',auth('candidate')->user()->id)->first();
        
        $candidate_details = CandidateDetail::where(['candidate_id' => auth('candidate')->user()->id])->first();
        $candidate_details->full_name = $request->full_name;
        $candidate_details->email = $request->email;
        $candidate_details->mobile = $request->mobile_no;
        $candidate_details->experience_level = $request->experience_level;
        $candidate_details->bio = $request->bio;
        
        $media_org = $request->file('profile_picture')->getClientOriginalName();
        $media_name = pathinfo($media_org, PATHINFO_FILENAME);
        $media_rename = Str::slug($media_name, '-') .".".$request->file('profile_picture')->getClientOriginalExtension();
        $image = $request->file('profile_picture')->storeAs('media/candidate', $media_rename);
        $candidate_details->profile_picture = 'storage/'.$image;

        $candidate_details->save();
        return response()->json([
            'class' => 'bg-success', 
            'error' => false, 
            'message' => 'Data Saved Successfully', 
            'call_back' => route('candidate.details.detail')
        ]);
    }

    public function contactStore(Request $request){
        $request->validate([
            'country' => ['required',],  
            'state' => ['required',],  
            'district' => ['required',],  
            'city' => ['required',],  
            'pincode' => ['required',],  
            'address' => ['required',],  
        ]);

        $candidate = Candidate::where('id',auth('candidate')->user()->id)->first();

        $candidate_details = CandidateDetail::where(['candidate_id' => auth('candidate')->user()->id])->first();
        $candidate_details->country_id = $request->country;
        $candidate_details->state_id = $request->state;
        $candidate_details->district_id = $request->district;
        $candidate_details->city_id = $request->city;
        $candidate_details->address = $request->address;
        $candidate_details->pincode = $request->pincode;
        $candidate_details->save();

        return response()->json([
            'class' => 'bg-success', 
            'error' => false, 
            'message' => 'Data Saved Successfully', 
            'call_back' => route('candidate.details.detail')
        ]);
    }
}
