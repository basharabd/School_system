<?php
namespace App\Repository;

use App\Models\Blood;
use App\Models\Classroom;
use App\Models\Gender;
use App\Models\Grade;
use App\Models\Myparent;
use App\Models\Nationalitie;
use App\Models\Section;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;

class StudentRepository implements StudentRepositoryInterface{


    public function create_student()
    {
      
        $data['my_classes'] = Grade::all();
        $data['parents'] = Myparent::all();
        $data['Genders'] = Gender::all();
        $data['bloods'] = Blood::all();
        $data['nationals'] = Nationalitie::all();
       

       return view('dashboard.Students.add',$data );
    }

      public function Get_classrooms($id)
      {

        $list_classes = Classroom::where("grade_id", $id)->pluck("class_name", "id");
        return $list_classes;

    }

    //Get Sections
    public function Get_Sections($id){

        $list_sections = Section::where("class_id", $id)->pluck("section_name", "id");
        return $list_sections;
    }

    public function Store_Student($request){

      try {
          $students = new Student();
          $students->name = ['en' => $request->name_en, 'ar' => $request->name_ar];
          $students->email = $request->email;
          $students->password = Hash::make($request->password);
          $students->gender_id = $request->gender_id;
          $students->nationalitie_id = $request->nationalitie_id;
          $students->blood_id = $request->blood_id;
          $students->Date_Birth = $request->Date_Birth;
          $students->Grade_id = $request->Grade_id;
          $students->Classroom_id = $request->Classroom_id;
          $students->section_id = $request->section_id;
          $students->parent_id = $request->parent_id;
          $students->academic_year = $request->academic_year;
          $students->save();
          toastr()->success(trans('message.success'));
          return redirect()->route('student.create');
      }

      catch (\Exception $e){
          return redirect()->back()->withErrors(['error' => $e->getMessage()]);
      }

  }

   
        
 
        
 

   
   
  }