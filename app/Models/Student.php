<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class Student extends Model
{
    use HasFactory , HasTranslations;
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
}