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
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('students','id')->cascadeOnDelete();
            $table->foreignId('grade_id')->constrained('Grades','id')->cascadeOnDelete();
            $table->foreignId('classroom_id')->constrained('Classrooms','id')->cascadeOnDelete();
            $table->foreignId('section_id')->constrained('sections','id')->cascadeOnDelete();
            $table->foreignId('teacher_id')->constrained('teachers','id')->cascadeOnDelete();
            $table->date('attendence_date');
            $table->boolean('attendence_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};