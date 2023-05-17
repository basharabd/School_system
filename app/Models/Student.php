<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;


class Student extends Model
{
    use HasFactory , HasTranslations , SoftDeletes;
    public $translatable = ['name'];
    protected $guarded=[];

     // علاقة بين الطلاب والانواع لجلب اسم النوع في جدول الطلاب

     public function gender()
     {
         return $this->belongsTo(Gender::class, 'gender_id');
     }
 
     // علاقة بين الطلاب والمراحل الدراسية لجلب اسم المرحلة في جدول الطلاب
 
     public function grade()
     {
         return $this->belongsTo(Grade::class, 'Grade_id');
     }
 
 
     // علاقة بين الطلاب الصفوف الدراسية لجلب اسم الصف في جدول الطلاب
 
     public function classroom()
     {
         return $this->belongsTo(Classroom::class, 'Classroom_id');
     }
 
     // علاقة بين الطلاب الاقسام الدراسية لجلب اسم القسم  في جدول الطلاب
 
     public function section()
     {
         return $this->belongsTo(Section::class, 'section_id');
     }

    // علاقة بين الطلاب والصور لجلب اسم الصور  في جدول الطلاب

     public function images()
     {
         return $this->morphMany(Image::class, 'imageable');
     }


      // علاقة بين الطلاب والجنسيات  لجلب اسم الجنسية  في جدول الجنسيات

    public function Nationality()
    {
        return $this->belongsTo(Nationalitie::class, 'nationalitie_id');
    }


    // علاقة بين الطلاب والاباء لجلب اسم الاب في جدول الاباء

    public function myparent()
    {
        return $this->belongsTo(Myparent::class, 'parent_id');
    }
}