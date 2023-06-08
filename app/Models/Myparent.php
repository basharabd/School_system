<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Foundation\Auth\User as Authenticatable;



class Myparent extends Authenticatable
{
    use HasFactory ,  HasTranslations;
    public $translatable = ['Name_Father','Job_Father','Name_Mother','Job_Mother'];
    protected $table = 'myparents';
    protected $guarded=[];

    // علاقة بين الاباء والصور لجلب اسم الصور  في جدول الاباء

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}