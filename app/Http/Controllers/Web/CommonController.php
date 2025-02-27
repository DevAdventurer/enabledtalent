<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\BusinessCategory;
use App\Models\City;
use App\Models\Country;
use App\Models\District;
use App\Models\Industry;
use App\Models\Qualification;
use App\Models\Skill;
use App\Models\State;
use Illuminate\Http\Request;

class CommonController extends Controller{   

    public function countryList(Request $request){
        if (!$request->ajax()) {
            return response()->json(['message' => 'Invalid request'], 400);
        }

        $page = max((int) $request->page, 1);
        $resultCount = 5;
        $term = $request->term ?? '';

        $query = Country::where('name', 'LIKE', '%' . $term . '%')
            ->orderBy('name', 'asc');

        $countries = $query->clone()
            ->selectRaw('id, name as text')
            ->skip(($page - 1) * $resultCount)
            ->take($resultCount)
            ->get();

        // Total count
        $totalCount = $query->count();
        $morePages = ($page * $resultCount) < $totalCount;

        return response()->json([
            "results" => $countries,
            "pagination" => [
                "more" => $morePages
            ]
        ]);
    }



    public function stateList(Request $request, $countryId){
        if (!$request->ajax()) {
            return response()->json(['message' => 'Invalid request'], 400);
        }

        $page = max((int) $request->page, 1);
        $resultCount = 5;
        $term = $request->term ?? '';

        $query = State::where('name', 'LIKE', '%' . $term . '%')
                ->where('country_id', $countryId)
                ->orderBy('name', 'asc');

        $states = $query->clone()
            ->selectRaw('id, name as text')
            ->skip(($page - 1) * $resultCount)
            ->take($resultCount)
            ->get();

        // Total count
        $totalCount = $query->count();
        $morePages = ($page * $resultCount) < $totalCount;

        return response()->json([
            "results" => $states,
            "pagination" => [
                "more" => $morePages
            ]
        ]);
    }



    public function districtList(Request $request, $stateID){
        if (!$request->ajax()) {
            return response()->json(['message' => 'Invalid request'], 400);
        }

        $page = max((int) $request->page, 1);
        $resultCount = 5;
        $term = $request->term ?? '';

        $query = District::where('name', 'LIKE', '%' . $term . '%')
                ->where('state_id', $stateID)
                ->orderBy('name', 'asc');

        $districts = $query->clone()
            ->selectRaw('id, name as text')
            ->skip(($page - 1) * $resultCount)
            ->take($resultCount)
            ->get();

        // Total count
        $totalCount = $query->count();
        $morePages = ($page * $resultCount) < $totalCount;

        return response()->json([
            "results" => $districts,
            "pagination" => [
                "more" => $morePages
            ]
        ]);
    }


    public function cityList(Request $request, $districtid){
        if (!$request->ajax()) {
            return response()->json(['message' => 'Invalid request'], 400);
        }

        $page = max((int) $request->page, 1);
        $resultCount = 5;
        $term = $request->term ?? '';

        $query = City::where('district_id', $districtid)
            ->where('name', 'LIKE', '%' . $term . '%')
            ->orderBy('name', 'asc')
            ->distinct('name'); // Ensuring unique city names

        $cities = $query->clone()
            ->selectRaw('MIN(id) as id, name as text') // Picking the first occurrence of each unique name
            ->groupBy('name')
            ->skip(($page - 1) * $resultCount)
            ->take($resultCount)
            ->get();

        // Total count
        $totalCount = $query->count();
        $morePages = ($page * $resultCount) < $totalCount;

        return response()->json([
            "results" => $cities,
            "pagination" => [
                "more" => $morePages
            ]
        ]);
    }

    public function pincodeList(Request $request){
        if (!$request->ajax()) {
            return response()->json(['message' => 'Invalid request'], 400);
        }

        $page = max((int) $request->page, 1);
        $resultCount = 5;
        $term = $request->term ?? '';

        $query = City::where('pin_code', 'LIKE', '%' . $term . '%')
                ->orWhere('name', 'LIKE', '%' . $term . '%')
                ->orderBy('pin_code', 'asc');

        $cities = $query->clone()
            ->selectRaw('id, CONCAT(pin_code, " - ", name) as text')
            ->skip(($page - 1) * $resultCount)
            ->take($resultCount)
            ->get();

        // Total count
        $totalCount = $query->count();
        $morePages = ($page * $resultCount) < $totalCount;

        return response()->json([
            "results" => $cities,
            "pagination" => [
                "more" => $morePages
            ]
        ]);
    }


    public function getLocationByPincode($id){
        $city = City::where('id', $id)->with('district.state')->first();

        if ($city) {
            return response()->json([
                'state' => $city->district->state->name ?? null,
                'district' => $city->district->name ?? null,
                'city' => $city->name
            ]);
        }

        return response()->json(['message' => 'Pincode not found'], 404);
    }


    public function industries(Request $request){
        if (!$request->ajax()) {
            return response()->json(['message' => 'Invalid request'], 400);
        }

        $page = max((int) $request->page, 1);
        $resultCount = 5;
        $term = $request->term ?? '';

        $query = Industry::where('name', 'LIKE', '%' . $term . '%')
                ->where('status_id', 14)
                ->orderBy('name', 'asc');

        $cities = $query->clone()
            ->selectRaw('id, name as text')
            ->skip(($page - 1) * $resultCount)
            ->take($resultCount)
            ->get();

        // Total count
        $totalCount = $query->count();
        $morePages = ($page * $resultCount) < $totalCount;

        return response()->json([
            "results" => $cities,
            "pagination" => [
                "more" => $morePages
            ]
        ]);
    }


    public function skillList(Request $request){
        if (!$request->ajax()) {
            return response()->json(['message' => 'Invalid request'], 400);
        }

        $page = max((int) $request->page, 1);
        $resultCount = 5;
        $term = $request->term ?? '';

        $query = Skill::where('name', 'LIKE', '%' . $term . '%')
            ->orderBy('name', 'asc');

        $skills = $query->clone()
            ->selectRaw('id, name as text')
            ->skip(($page - 1) * $resultCount)
            ->take($resultCount)
            ->get();

        // Total count
        $totalCount = $query->count();
        $morePages = ($page * $resultCount) < $totalCount;

        return response()->json([
            "results" => $skills,
            "pagination" => [
                "more" => $morePages
            ]
        ]);
    }


    public function qualificationList(Request $request){
        if (!$request->ajax()) {
            return response()->json(['message' => 'Invalid request'], 400);
        }

        $page = max((int) $request->page, 1);
        $resultCount = 5;
        $term = $request->term ?? '';

        $query = Qualification::where('name', 'LIKE', '%' . $term . '%')
            ->orderBy('name', 'asc');

        $skills = $query->clone()
            ->selectRaw('id, name as text')
            ->skip(($page - 1) * $resultCount)
            ->take($resultCount)
            ->get();

        // Total count
        $totalCount = $query->count();
        $morePages = ($page * $resultCount) < $totalCount;

        return response()->json([
            "results" => $skills,
            "pagination" => [
                "more" => $morePages
            ]
        ]);
    }


}
