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
        Schema::create('page_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('page_id');
            $table->string('heading')->nullable();
            $table->text('subheading')->nullable();
            $table->string('button_label')->nullable();
            $table->string('button_link')->nullable();
            $table->string('type');
            $table->json('content')->nullable();
            $table->integer('ordering')->default(0);
            $table->json('styles')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_items');
    }
};
