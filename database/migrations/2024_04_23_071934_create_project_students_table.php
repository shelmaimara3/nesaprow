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
        Schema::create('project_students', function (Blueprint $table) {
            $table->id();
            $table->string('name_team');
            $table->string('title_project');
            $table->text('desc_project');
            $table->string('occupation');
            $table->string('proof_project');
            $table->date('project_start_date')->nullable();
            $table->date('deadline')->nullable();
            $table->boolean('is_done');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_students');
    }
};
