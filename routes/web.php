<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Models\Student;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Route;
use App\Models\Teachers;


// Route::get('/', function () {
//     return view('welcome');
// });


    // Route::get('add-students', [StudentController::class, 'addData']);
    // Route::get('get-students', [StudentController::class, 'getData']);
    // Route::get('update-students', [StudentController::class, 'updateData']);
    // Route::get('delete-students', [StudentController::class, 'deleteData']);

    Route::prefix('student')->controller(StudentController::class)->group(function () {
        Route::get('/', 'index');
        Route::view('add','students.add');
        Route::post('create','createStudent');
    });

   // Route::get('/', function () { return ('welcome to ARU'); });
    //Route::get('students',[StudentController::class,'index']);
 //   Route::get('about-us/{id}/{name}',[StudentController::class,'aboutUS']);
   // Route::get('teachers', function (){ return Teachers::all(); });
    //เรียกใช้โมเดล Teachers เพื่อดึงข้อมูลทั้งหมดจากตาราง teachers






    //  Route::get('about', function () {
    //     return ('About Us');
    //  });
    // Route::get('details/students', function () {
    //     return ('This is a student');
    // });
    // Route::get('details/teacher', function () {
    //     return ('This is a teacher');
    // });
    // Route::prefix('details')->group(function () {
    //     Route::get('students', function () {
    //         return 'This is student';
    //     })->name('students-Details');
    
    //     Route::get('teachers', function () {
    //         return 'This is a teacher';
    //     })->name('teachers-Details');
    // });
    
    // Route::get('student/{id}/{name}/{email}', function ($id,$name,$email) {
    //     return 'Student number is ' . $id.' and name is '.$name.'  and email is '.$email;
    // });

    // Route::get('about-us', function (): View {
    //     return view('aboutus');
    // });
    Route::prefix('student')->controller(StudentController::class)->group(function () {
Route::get('/', 'index');
});

Route::prefix('subject')->controller(SubjectController::class)->group(function(){
Route::get('/','index');
});

