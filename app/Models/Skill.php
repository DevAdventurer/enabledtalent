<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function jobListings()
    {
        return $this->belongsToMany(JobListing::class, 'job_listing_skill');
    }
}