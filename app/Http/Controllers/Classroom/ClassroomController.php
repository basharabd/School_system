<?php

namespace App\Http\Controllers\Classroom;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClassroom;
use App\Models\Classroom;
use App\Models\Grade;
use Exception;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $classes  = Classroom::all();
        $Grades = Grade::all();
        return view('dashboard.Classroom.index' , compact('classes' , 'Grades'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


    
        $classes = $request->List_Classes;
        
     try {
        
        // $validated = $request->validated();

                foreach($classes as $class)
                {

                    $Myclass = new Classroom();

                    $Myclass->class_name = ['en'=>$class['name_class_en']  , 'ar'=>$class['class_name']];

                    $Myclass->grade_id = $class['grade_id'];

                    $Myclass->save();
                    
                    
                }

        toastr()->success(trans('message.success'));
        return redirect()->route('classrooms.index');
        
     }
            catch (\Exception $e)
            {
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
    public function update(Request $request, string $id)
    {
        try {

            $classes = Classroom::findOrFail($request->id);

            $classes->update([

                $classes->class_name = ['ar' => $request->class_name, 'en' => $request->name_en],
                $classes->grade_id = $request->grade_id,
            ]);
            toastr()->success(trans('message.Update'));
            return redirect()->route('classrooms.index');
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
        $classes = Classroom::findOrFail($request->id)->delete();
        toastr()->error(trans('message.Delete'));
        return redirect()->route('classrooms.index');
    }


    public function delete_all(Request $request)
    {


    $delete_all_id = explode(",", $request->delete_all_id);

    // Filter out non-integer values
    $delete_ids = array_filter($delete_all_id, 'is_numeric');

    // whereIn // multiple id and need request array
    Classroom::whereIn('id', $delete_ids)->delete();

    toastr()->error(trans('message.Delete'));

    return redirect()->route('classrooms.index');
        
    }


    public function Filter_Classes(Request $request)
    {

        $Grades = Grade::all();
        $Search = Classroom::select('*')->where('grade_id','=',$request->grade_id)->get();
        return view('dashboard.Classroom.index',compact('Grades'))->withDetails($Search);

    }
}