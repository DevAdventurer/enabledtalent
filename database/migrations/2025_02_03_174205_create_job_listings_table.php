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
        Schema::create('job_listings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained()->onDelete('cascade'); 
            $table->foreignId('job_category_id')->nullable()->constrained()->onDelete('set null'); 
            $table->foreignId('job_type_id')->nullable()->constrained('job_types')->onDelete('set null');
            $table->foreignId('experience_id')->nullable()->constrained('experiences')->onDelete('set null');
            $table->string('title', 255);
            $table->text('description')->nullable();
            
            $table->foreignId('country_id')->nullable()->constrained()->onDelete('set null'); // Country
            $table->foreignId('state_id')->nullable()->constrained()->onDelete('set null'); // State
            $table->foreignId('district_id')->nullable()->constrained()->onDelete('set null'); // State
            $table->foreignId('city_id')->nullable()->constrained()->onDelete('set null'); // City
            $table->integer('pincode')->nullable(1);
            $table->text('address')->nullable(1);
            $table->decimal('offer_salary_min', 10, 2)->nullable();
            $table->decimal('offer_salary_max', 10, 2)->nullable();
            $table->string('salary_type')->nullable(); // Per hour, Per month, Per annum
            
            // Application Details
            $table->date('deadline')->nullable();
            $table->integer('vacancies')->default(1); 
            $table->boolean('is_remote')->default(false);
            
            // Status & Meta
            $table->integer('status_id')->default(14)->nullable();
            $table->boolean('is_featured')->default(false);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_listings');
    }
};
