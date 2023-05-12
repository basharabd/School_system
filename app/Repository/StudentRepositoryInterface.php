<?php

namespace App\Repository;

interface StudentRepositoryInterface
{

    // Create Student
    public function create_student();
    
     // Get Classrooms
    public function Get_classrooms($id);
    
     // Get Section
    public function Get_Sections($id);

    // Store Student
    public function Store_Student($request);

   


}