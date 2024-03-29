<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Classroom\ClassroomController;
use App\Http\Controllers\Exams\ExamController;
use App\Http\Controllers\Grades\GradeController;
use App\Http\Controllers\Graduated\GraduatedController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Librarys\LibraryController;
use App\Http\Controllers\Questions\QuestionController;
use App\Http\Controllers\Quizzes\QuizzController;
use App\Http\Controllers\Sections\SectionController;
use App\Http\Controllers\Setting\SettingController;
use App\Http\Controllers\Students\AttendanceController;
use App\Http\Controllers\Students\FeeController;
use App\Http\Controllers\Students\FeesInvoicesController;
use App\Http\Controllers\Students\PaymentController;
use App\Http\Controllers\Students\ProcessingFeeController;
use App\Http\Controllers\Students\PromotionController;
use App\Http\Controllers\Students\ReceiptStudentsController;
use App\Http\Controllers\Students\StudentController;
use App\Http\Controllers\Subjects\SubjectController;
use App\Http\Controllers\Teachers\TeacherController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();



Route::group(['middleware' =>'guest'] , function(){
    Route::get('/', function () {
        return view('auth.login');
    });

});




Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath','auth']
    ], function(){ 
   
        Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard');

        Route::resource('grads', GradeController::class);

        Route::resource('classrooms', ClassroomController::class);
        
        Route::post('all_delete' , [ClassroomController::class , 'delete_all'])->name('delete_all');

        Route::post('Filter_Classes' , [ClassroomController::class , 'Filter_Classes'])->name('Filter_Classes');

        Route::resource('sections', SectionController::class);

        Route::get('classes/{id}' , [SectionController::class , 'getclasses']);


        Route::view('add_parent' , 'livewire.show_form');
        Route::resource('teacher', TeacherController::class);
        Route::resource('student', StudentController::class);
        Route::resource('promotion', PromotionController::class);
        Route::resource('graduated', GraduatedController::class);
        Route::resource('fee', FeeController::class);
        Route::resource('Fees_Invoices', FeesInvoicesController::class);
        Route::resource('receipt_students', ReceiptStudentsController::class);
        Route::resource('ProcessingFee', ProcessingFeeController::class);
        Route::resource('Payment_students', PaymentController::class);
        Route::resource('Attendance', AttendanceController::class);

        Route::resource('subjects', SubjectController::class);

        Route::resource('questions', QuestionController::class);



        Route::get('/Get_classrooms/{id}' , [StudentController::class , 'Get_classrooms']);

        Route::get('/Get_Sections/{id}' , [StudentController::class , 'Get_Sections']);

        Route::post('Upload_attachment', [StudentController::class , 'Upload_attachment'])->name('Upload_attachment');

        Route::get('Download_attachment/{studentsname}/{filename}', [StudentController::class , 'Download_attachment'])->name('Download_attachment');
        
        Route::post('Delete_attachment', [StudentController::class , 'Delete_attachment'])->name('Delete_attachment');

        Route::resource('Quizzes', QuizzController::class);

        Route::resource('library', LibraryController::class);


        Route::get('Download_attachment/{filename}', [LibraryController::class , 'downloadAttachment'])->name('downloadAttachment');

        Route::resource('settings', SettingController::class);



       
    
    });