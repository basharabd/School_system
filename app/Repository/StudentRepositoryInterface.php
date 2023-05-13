<?php

namespace App\Repository;

interface StudentRepositoryInterface
{


     // Edit_Student
    public function Edit_Student($id);
     
    //Get Students
    public function Get_Student();
    
    // Create Student
    public function create_student();
    
     // Get Classrooms
    public function Get_classrooms($id);
    
     // Get Section
    public function Get_Sections($id);

    // Store Student
    public function Store_Student($request);
    
    // Update Student
    public function Update_Student($request);

     //Delete_Student
     public function Delete_Student($request);

   


}