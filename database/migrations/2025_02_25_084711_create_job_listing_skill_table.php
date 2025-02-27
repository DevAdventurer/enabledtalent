<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('job_listing_skill', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_listing_id')->constrained()->onDelete('cascade'); // Links to job_listings
            $table->foreignId('skill_id')->constrained()->onDelete('cascade'); // Links to skills
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('job_listing_skill');
    }
};