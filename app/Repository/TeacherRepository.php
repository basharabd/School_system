<?php
namespace App\Repository;

use App\Models\Gender;
use App\Models\Specialization;
use App\Models\Teacher;
use Exception;
use Illuminate\Support\Facades\Hash;

class TeacherRepository implements TeacherRepositoryInterface{

    public function getAllTeachers()
    {
        return  Teacher::all();
    }

    public function getAllSpecializations()
    {
        return Specialization::all(); 
    }

    public function getAllGenders()
    {
        return Gender::all();
    }

    public function StoreTeachers($request)
    {

        
    try {
        $Teachers = new Teacher();
        $Teachers->Email = $request->Email;
        $Teachers->Password =  Hash::make($request->Password);
        $Teachers->Name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
        $Teachers->Specialization_id = $request->Specialization_id;
        $Teachers->Gender_id = $request->Gender_id;
        $Teachers->Joining_Date = $request->Joining_Date;
        $Teachers->Address = $request->Address;
        $Teachers->save();
        toastr()->success(trans('message.success'));
        return redirect()->route('teacher.create');
    }
    catch (Exception $e) {
        return redirect()->back()->with(['error' => $e->getMessage()]);
    }
        
    } 

    public function editTeachers($id)
    {
        return Teacher::findOrFail($id);
    }


    public function UpdateTeachers($request)
    {
        try {
            $Teachers = Teacher::findOrFail($request->id);
            $Teachers->Email = $request->Email;
            $Teachers->Password =  Hash::make($request->Password);
            $Teachers->Name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
            $Teachers->Specialization_id = $request->Specialization_id;
            $Teachers->Gender_id = $request->Gender_id;
            $Teachers->Joining_Date = $request->Joining_Date;
            $Teachers->Address = $request->Address;
            $Teachers->save();
            toastr()->success(trans('message.Update'));
            return redirect()->route('teacher.index');
        }
        catch (Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }


    public function DeleteTeachers($request)
    {
        Teacher::findOrFail($request->id)->delete();
        toastr()->error(trans('message.Delete'));
        return redirect()->route('teacher.index');
    }
  
  }