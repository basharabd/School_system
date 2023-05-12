<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStudent;
use App\Repository\StudentRepositoryInterface;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    protected $Student;

 

    public function __construct(StudentRepositoryInterface $Student)
    {
        $this->Student = $Student; 
    }
  
    public function index()
    {
        //
    }

   
    public function create()
    {

        return $this->Student->create_student();
        // dd(true);
    }

   
    public function store(StoreStudent $request)
    {
        return $this->Student->Store_Student($request);

    }

  
    public function show(string $id)
    {
        //
    }

   
    public function edit(string $id)
    {
        //
    }

  
    public function update(Request $request, string $id)
    {
        //
    }

    
    public function destroy(string $id)
    {
        //
    }

    public function Get_classrooms($id)
    {
       return $this->Student->Get_classrooms($id);
    }

    public function Get_Sections($id)
    {
        return $this->Student->Get_Sections($id);
    }
}