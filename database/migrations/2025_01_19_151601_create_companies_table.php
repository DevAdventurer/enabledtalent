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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255)->nullable();
            $table->string('email', 91)->unique();
            $table->string('mobile', 255)->nullable();
            $table->string('password', 255)->nullable();
            $table->rememberToken();
            $table->integer('status_id')->default(14);
            $table->boolean('featured')->default(0);
            $table->string('google_id')->nullable();
            $table->string('avatar')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
