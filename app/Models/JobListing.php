<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobListing extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_title', 'job_category', 'job_type', 'qualification',
        'minimum_salary', 'maximum_salary', 'country', 'state', 'district',
        'city', 'pincode', 'address', 'start_date', 'deadline', 'description'
    ];

    public function skills(){
        return $this->belongsToMany(Skill::class, 'job_listing_skill');
    }

    public function qualifications() {
        return $this->belongsToMany(Qualification::class, 'job_listing_qualification');
    }
}
