<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Spatie\Translatable\HasTranslations;


class Classroom extends Model
{
    use HasFactory, HasTranslations;
    
    
    public $translatable = ['class_name'];

    protected $fillable=[
        
        'class_name' ,'grade_id','description' 
    ];


    protected $table="classrooms";
    public $timestamps = true;


   
    public function grades()
    {
        return $this->belongsTo(Grade::class, 'grade_id');
    }
}