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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained('projects');
            $table->foreignId('student_id')->constrained('users');
            $table->foreignId('group_id')->constrained('groups');
            $table->foreignId('supervisor_id')->constrained('users');
            $table->string('title');
            $table->longText('description');
            $table->date('due_date');
            $table->string('status')->default('pending');
            $table->string('priority')->default('medium');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
