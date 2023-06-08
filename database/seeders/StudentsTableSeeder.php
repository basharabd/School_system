<?php

namespace Database\Seeders;

use App\Models\Blood;
use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Myparent;
use App\Models\Nationalitie;
use App\Models\Section;
use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('students')->delete();
        $students = new Student();
        $students->name = ['ar' => 'احمد ابراهيم', 'en' => 'Ahmed Ibrahim'];
        $students->email = 'Ahmed_Ibrahim@yahoo.com';
        $students->password = Hash::make('password');
        $students->gender_id = 1;
        $students->nationalitie_id = Nationalitie::all()->unique()->random()->id;
        $students->blood_id =Blood::all()->unique()->random()->id;
        $students->Date_Birth = date('1995-01-01');
        $students->Grade_id = Grade::all()->unique()->random()->id;
        $students->Classroom_id =Classroom::all()->unique()->random()->id;
        $students->section_id = Section::all()->unique()->random()->id;
        $students->parent_id = Myparent::all()->unique()->random()->id;
        $students->academic_year ='2021';
        $students->save();
    }
}