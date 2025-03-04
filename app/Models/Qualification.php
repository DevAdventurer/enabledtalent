<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qualification extends Model {
    use HasFactory;

    protected $fillable = ['name', 'level'];

    public function jobs() {
        return $this->belongsToMany(Job::class, 'job_qualification');
    }
}