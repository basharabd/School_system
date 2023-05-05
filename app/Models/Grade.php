<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Spatie\Translatable\HasTranslations;


class Grade extends Model
{
    use HasFactory , HasTranslations ; 
    
    
    public $translatable = ['name'];

    protected $fillable=[
        
        'name' ,'notes', 
    ];

    protected $table="Grades";
    public $timestamps = true;


    // علاقة المراحل الدراسية لجلب الاقسام المتعلقة بكل مرحلة

    public function sections()
    {
        return $this->hasMany(Section::class, 'grade_id');
    }
}