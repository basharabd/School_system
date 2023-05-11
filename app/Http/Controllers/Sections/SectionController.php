<?php

namespace App\Http\Controllers\Sections;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSection;
use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Section;
use App\Models\Teacher;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // $teachers = Teacher::findOrFail(2);

        // return $teachers->Sections;
      //  $Grades = Grade::with('sections')->get();
      $Grades = Grade::with('sections')->get();
        $list_Grades = Grade::all();
       $teachers = Teacher::all();
        return view('dashboard.Sections.Sections',compact('Grades','list_Grades' , 'teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSection $request)
    {

        // dd($request->teacher_id);
        
        try {

            $validated = $request->validated();
            $Sections = new Section();
            $Sections->section_name = ['ar' => $request->section_name, 'en' => $request->section_name_en];
            $Sections->grade_id = $request->grade_id;
            $Sections->class_id = $request->class_id;
            $Sections->status = 1;
            $Sections->save();
           $Sections->teachers()->attach($request->teacher_id);
            toastr()->success(trans('message.success'));
      
            return redirect()->route('sections.index');
        }
      
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        try {
          //  $validated = $request->validated();
            $Sections = Section::findOrFail($request->id);
      
            $Sections->section_name = ['ar' => $request->section_name, 'en' => $request->section_name_en];
            $Sections->grade_id = $request->grade_id;
            $Sections->class_id = $request->class_id;
      
            if(isset($request->status)) {
              $Sections->status = 1;
            } else {
              $Sections->status = 2;
            }
      
            $Sections->save();
            toastr()->success(trans('message.Update'));
      
            return redirect()->route('sections.index');
        }
        catch
        (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }


      
      
       
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        
    Section::findOrFail($request->id)->delete();
    toastr()->error(trans('message.Delete'));
    return redirect()->route('sections.index');
    }


    public function getclasses($id)
    {
        $list_classes = Classroom::where("grade_id", $id)->pluck("class_name", "id");

        return $list_classes;
    }

}