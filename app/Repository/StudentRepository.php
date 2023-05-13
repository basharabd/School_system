<?php
namespace App\Repository;

use App\Models\Blood;
use App\Models\Classroom;
use App\Models\Gender;
use App\Models\Grade;
use App\Models\Image;
use App\Models\Myparent;
use App\Models\Nationalitie;
use App\Models\Section;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StudentRepository implements StudentRepositoryInterface
{

    public function Get_Student()
    {
        $students = Student::all();
        return view('dashboard.Students.index',compact('students'));

        
    }
    
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
        DB::beginTransaction();

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
          
          // insert img
          if($request->hasfile('photos'))
          {
              foreach($request->file('photos') as $file)
              {
                  $name = $file->getClientOriginalName();
                  $file->storeAs('attachments/students/'.$students->name, $file->getClientOriginalName(),'upload_attachments');

                  // insert in image_table
                  $images= new Image();
                  $images->filename=$name;
                  $images->imageable_id= $students->id;
                  $images->imageable_type = 'App\Models\Student';
                  $images->save();
              }
          }


          DB::commit(); // insert data
          toastr()->success(trans('message.success'));
          return redirect()->route('student.create');
      }

      catch (\Exception $e){
        DB::rollback();
         return redirect()->back()->withErrors(['error' => $e->getMessage()]);
      }

  }

  public function Edit_Student($id)
  {
      $data['Grades'] = Grade::all();
      $data['parents'] = Myparent::all();
      $data['Genders'] = Gender::all();
      $data['nationals'] = Nationalitie::all();
      $data['bloods'] = Blood::all();
      $Students =  Student::findOrFail($id);
      return view('dashboard.Students.edit',$data,compact('Students'));
  }

  public function Update_Student($request)
  {
      try {
          $Edit_Students = Student::findorfail($request->id);
          $Edit_Students->name = ['ar' => $request->name_ar, 'en' => $request->name_en];
          $Edit_Students->email = $request->email;
          $Edit_Students->password = Hash::make($request->password);
          $Edit_Students->gender_id = $request->gender_id;
          $Edit_Students->nationalitie_id = $request->nationalitie_id;
          $Edit_Students->blood_id = $request->blood_id;
          $Edit_Students->Date_Birth = $request->Date_Birth;
          $Edit_Students->Grade_id = $request->Grade_id;
          $Edit_Students->Classroom_id = $request->Classroom_id;
          $Edit_Students->section_id = $request->section_id;
          $Edit_Students->parent_id = $request->parent_id;
          $Edit_Students->academic_year = $request->academic_year;
          $Edit_Students->save();
          toastr()->success(trans('message.Update'));
          return redirect()->route('student.index');
      } catch (\Exception $e) {
          return redirect()->back()->withErrors(['error' => $e->getMessage()]);
      }
  }



  
  public function Delete_Student($request)
  {

      Student::destroy($request->id);
      toastr()->error(trans('message.Delete'));
      return redirect()->route('student.index');
  }

   
        
 
        
 

   
   
  }