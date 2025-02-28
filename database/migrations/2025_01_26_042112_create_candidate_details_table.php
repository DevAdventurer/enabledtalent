<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('candidate_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('candidate_id')->unique(); 
            $table->foreign('candidate_id')->references('id')->on('candidates')->onDelete('cascade');
            $table->string('mobile')->nullable();
            $table->text('bio')->nullable();
            $table->string('experience_level')->nullable();
            $table->string('profile_picture')->nullable();
            $table->string('address')->nullable();
            $table->string('country_id')->nullable();
            $table->string('state_id')->nullable();
            $table->string('district_id')->nullable();
            $table->string('city_id')->nullable();
            $table->string('pincode')->nullable();
            $table->integer('status_id')->default(15);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidate_details');
    }
};
