<?php

namespace App\Repository;

interface TeacherRepositoryInterface
{

    // get all Teachers
    public function getAllTeachers();

     // get all Specializations
     public function getAllSpecializations();

      // get all Genders
      public function getAllGenders();


     //  StoreTeachers
      public function StoreTeachers($request);

    // Edit Teachers
    public function editTeachers($id);

    // UpdateTeachers
    public function UpdateTeachers($request);

    // DeleteTeachers
    public function DeleteTeachers($request);


}