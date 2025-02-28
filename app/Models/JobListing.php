<?php

namespace App\Models;


use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobListing extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'title', 'job_category', 'job_type', 'qualification',
        'minimum_salary', 'maximum_salary', 'country', 'state', 'district',
        'city', 'pincode', 'address', 'start_date', 'deadline', 'description'
    ];

    protected $casts = [
        'deadline'=>'datetime'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function company(){
        return $this->belongsTo(Company::class);
    }

    public function jobType(){
        return $this->belongsTo(JobType::class, 'job_type_id');
    }

    public function jobCategory(){
        return $this->belongsTo(JobCategory::class, 'job_category_id');
    }

    public function skills(){
        return $this->belongsToMany(Skill::class, 'job_listing_skill');
    }

    public function qualifications() {
        return $this->belongsToMany(Qualification::class, 'job_listing_qualification');
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

    public function getRouteKeyName(){
        return 'slug';
    }
}
