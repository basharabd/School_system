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
        Schema::create('sections', function (Blueprint $table) {
            $table->id();
            $table->string('section_name');
            $table->integer('status');

            $table->bigInteger('grade_id')->unsigned();
            $table->bigInteger('class_id')->unsigned();

            $table->foreign('grade_id')
                  ->references('id')
                  ->on('grades')
                  ->onDelete('cascade');

                  $table->foreign('class_id')
                  ->references('id')
                  ->on('classrooms')
                  ->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sections');
    }
};