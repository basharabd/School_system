<?php

namespace App\Http\Controllers\Grades;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGrade;
use App\Models\Classroom;
use App\Models\Grade;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $Grades = Grade::all();


        return view('dashboard.Grades.index' ,compact('Grades') );
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
    public function store(StoreGrade $request)
    {
            // 
        // if(Grade::where('name->ar' , $request->name)->orWhere('name->en' , $request->name_en)->exists())
        // {
        //    // return redirect()->back()->withErrors(trans());
        //     toastr()->success(trans('grade.exists'));
        // }

            try {
                $validated = $request->validated();

                $grades = new Grade();
               $grades
               ->setTranslation('name', 'en', $request->name_en)
               ->setTranslation('name', 'ar', $request->name);

               $grades->notes = $request->notes;
               $grades->save();

               toastr()->success(trans('message.success'));

               

               return redirect()->route('grads.index');
                
            } catch (\Exception $e) {



               return redirect()->back()->withErrors(['error' => $e->getMessage()]);

                
            }
       



    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
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
    public function update(StoreGrade $request, string $id)
    {


        
        try {
            $validated = $request->validated();

            $grades = Grade::findOrFail($request->id);
            
           $grades
           ->setTranslation('name', 'en', $request->name_en)
           ->setTranslation('name', 'ar', $request->name);

           $grades->notes = $request->notes;
           $grades->update();

           toastr()->success(trans('message.Update'));

           

           return redirect()->route('grads.index');
            
        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

            
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request , $id)
    {
        
          $grades = Grade::findOrFail($id)->delete();
          toastr()->error(trans('message.Delete'));
          return redirect()->route('grads.index');
       

       

    }
}