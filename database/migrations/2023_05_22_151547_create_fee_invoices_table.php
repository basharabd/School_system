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
        Schema::create('fee_invoices', function (Blueprint $table) {
            $table->id();
            $table->date('invoice_date');
            $table->foreignId('student_id')->constrained('students' , 'id')->cascadeOnDelete();
            $table->foreignId('Grade_id')->constrained('Grades' , 'id')->cascadeOnDelete();
            $table->foreignId('Classroom_id')->constrained('Classrooms' , 'id')->cascadeOnDelete();
            $table->foreignId('fee_id')->constrained('fees' , 'id')->cascadeOnDelete();

            $table->decimal('amount',8,2);
            $table->string('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fee_invoices');
    }
};