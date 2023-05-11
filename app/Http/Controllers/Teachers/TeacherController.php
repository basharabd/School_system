<?php

namespace App\Http\Controllers\Teachers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTeacher;
use App\Models\Gender;
use App\Models\Specialization;
use App\Repository\TeacherRepositoryInterface;
use Illuminate\Http\Request;

class TeacherController extends Controller
{

    protected $Teacher;

 

    public function __construct(TeacherRepositoryInterface $Teacher)
    {
        $this->Teacher = $Teacher; 
    }

 
    public function index()
    {
        $Teachers = $this->Teacher->getAllTeachers();
        return view('dashboard.Teachers.Teachers' ,compact('Teachers'));
    }

   
    public function create()
    {
        $specializations = $this->Teacher->getAllSpecializations();
        $genders = $this->Teacher->getAllGenders();
        return view('dashboard.Teachers.create' , compact('specializations' , 'genders'));
    }


    public function store(StoreTeacher $request)
    {

        return $this->Teacher->StoreTeachers($request);
        
    }

    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        $Teachers = $this->Teacher->editTeachers($id);
        $specializations = $this->Teacher->getAllSpecializations();
        $genders = $this->Teacher->getAllGenders();
        return view('dashboard.Teachers.Edit',compact('Teachers','specializations','genders'));    }

   
    public function update(Request $request)
    {
        return $this->Teacher->UpdateTeachers($request);

    }

   
    public function destroy(Request $request)
    {
        return $this->Teacher->DeleteTeachers($request);

    }
}