<?php

use App\Http\Controllers\Classroom\ClassroomController;
use App\Http\Controllers\Grades\GradeController;
use App\Http\Controllers\Sections\SectionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


Route::group(['middleware' =>'guest'] , function(){
    Route::get('/', function () {
        return view('auth.login');
    });

});




Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ], function(){ 
   
        Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

        Route::resource('grads', GradeController::class);

        Route::resource('classrooms', ClassroomController::class);
        
        Route::post('all_delete' , [ClassroomController::class , 'delete_all'])->name('delete_all');

        Route::post('Filter_Classes' , [ClassroomController::class , 'Filter_Classes'])->name('Filter_Classes');

        Route::resource('sections', SectionController::class);

        Route::get('classes/{id}' , [SectionController::class , 'getclasses']);


        Route::view('add_parent' , 'livewire.show_form');
        
    });


Auth::routes();