<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidateDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'candidate_id',
        'full_name',
        'email',
        'mobile',
        'experience_level',
        'bio',
        'profile_picture',
        'address',
        'country_id',
        'state_id',
        'district_id',
        'city_id',
        'pincode',
        'status_id',
    ];

    public function enabledProfile()
    {
        $requiredFields = [
            'candidate_id',
            'full_name',
            'email',
            'mobile',
            'experience_level',
            'bio',
            'address',
            'country_id',
            'state_id',
            'district_id',
            'city_id',
            'pincode',
            'profile_picture',
        ];

        $allFieldsFilled = true;

        foreach ($requiredFields as $field) {
            if (empty($this->$field)) {
                $allFieldsFilled = false;
                break;
            }
        }

        $this->status_id = $allFieldsFilled ? 14 : 15;
        $this->save();
    }

    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
