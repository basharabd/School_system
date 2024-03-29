<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Foundation\Auth\User as Authenticatable;



class Teacher extends Authenticatable
{
    use HasFactory , HasTranslations;
    public $translatable = ['Name'];
    protected $guarded=[];

       // علاقة بين المعلمين والتخصصات لجلب اسم التخصص
       public function specializations()
       {
           return $this->belongsTo(Specialization::class, 'Specialization_id');
       }
   
       // علاقة بين المعلمين والانواع لجلب جنس المعلم
       public function genders()
       {
           return $this->belongsTo(Gender::class, 'Gender_id');
       }

       // علاقة المعلمين مع الاقسام
    public function Sections()
    {
        return $this->belongsToMany(Section::class,'teacher_section');
    }

    // علاقة بين المعلمين والصور لجلب اسم الصور  في جدول المعلمين

   public function images()
   {
       return $this->morphMany(Image::class, 'imageable');
   }
}