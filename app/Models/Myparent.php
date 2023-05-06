<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class Myparent extends Model
{
    use HasFactory ,  HasTranslations;
    public $translatable = ['Name_Father','Job_Father','Name_Mother','Job_Mother'];
    protected $table = 'myparents';
    protected $guarded=[];
}