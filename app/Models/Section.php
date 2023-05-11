<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class Section extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = ['section_name'];
    protected $fillable=['section_name','grade_id','class_id'];

    protected $table = 'sections';
    public $timestamps = true;


    // علاقة بين الاقسام والصفوف لجلب اسم الصف في جدول الاقسام

    public function classes()
    {
        return $this->belongsTo(Classroom::class, 'class_id');
    }


      // علاقة الاقسام مع المعلمين
      public function teachers()
      {
          return $this->belongsToMany(Teacher::class,'teacher_section');
      }
}