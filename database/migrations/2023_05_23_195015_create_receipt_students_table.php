<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    //جدول سندات القبض
    public function up(): void
    {
        Schema::create('receipt_students', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->foreignId('student_id')->constrained('students','id')->cascadeOnDelete();
            $table->decimal('Debit',8,2)->nullable();
            $table->string('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('receipt_students');
    }
};