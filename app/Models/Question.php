<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class Question extends Model
{
    use HasFactory, HasTranslations;

   
    public $translatable = ['name'];

    public function quizze()
    {
        return $this->belongsTo(Quizze::class);
    }
}