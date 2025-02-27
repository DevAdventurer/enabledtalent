<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('skills', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); // Skill name (e.g., "PHP", "SEO", etc.)
            $table->integer('status_id')->default(14)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('skills');
    }
};