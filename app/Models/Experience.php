<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model{

    use HasFactory;

    public function jobListings(){
        return $this->hasMany(JobListing::class, 'experience_id');
    }
}
