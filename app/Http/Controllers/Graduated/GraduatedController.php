<?php

namespace App\Http\Controllers\Graduated;

use App\Http\Controllers\Controller;
use App\Repository\StudentGraduatedRepositoryInterface;
use Illuminate\Http\Request;

class GraduatedController extends Controller
{


    protected $Graduated;
    
    public function __construct(StudentGraduatedRepositoryInterface $Graduated)
    {
        $this->Graduated = $Graduated;
    }
   
    public function index()
    {

        return $this->Graduated->index();

    }

  
    public function create()
    {
        return $this->Graduated->create();

    }

   
    public function store(Request $request)
    {
        //SoftDelete
        return $this->Graduated->SoftDelete($request);

    }

    public function show(string $id)
    {
        //
    }

  
    public function edit(string $id)
    {
        //
    }

    
    public function update(Request $request)
    {
        //ReturnData

        return $this->Graduated->ReturnData($request);

    }

   
    public function destroy(Request $request)
    {
        //destroy
        return $this->Graduated->destroy($request);

    }
}