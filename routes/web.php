<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DasboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ClassSubjectController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\PresentController;
use App\Http\Controllers\GradeControllerTeacher;
use App\Http\Controllers\GradeControllerParent;
use App\Http\Controllers\GradeControllerStudent;
use App\Http\Controllers\UserController;
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



Route::get('/',[AuthController::class,'login']);
Route::post('login',[AuthController::class,'AuthLogin']);
Route::get('logout',[AuthController::class,'logout']);
Route::get('forgot-password',[AuthController::class, 'forgotpassword']);
Route::post('forgot-password',[AuthController::class, 'postforgotpassword']);
Route::get('reset/{token}',[AuthController::class, 'reset']);
Route::post('reset/{token}',[AuthController::class, 'postreset']);


Route::group(['middleware'=>'admin'], function (){

    Route::get('admin/dashboard',[DasboardController::class,'dashboard']);

    //administratori urls
    Route::get('admin/admin/list',[AdminController::class,'list']);
    Route::get('admin/admin/add',[AdminController::class,'add']);
    Route::post('admin/admin/add',[AdminController::class,'insert']);
    Route::get('admin/admin/edit/{id}',[AdminController::class,'edit']);
    Route::post('admin/admin/edit/{id}',[AdminController::class,'update']);
    Route::get('admin/admin/delete/{id}',[AdminController::class,'delete']);


    //elev urls
    Route::get('admin/student/list',[StudentController::class,'list']);
    Route::get('admin/student/add',[StudentController::class,'add']);
    Route::post('admin/student/add',[StudentController::class,'insert']);
    Route::get('admin/student/edit/{id}',[StudentController::class,'edit']);
    Route::post('admin/student/edit/{id}',[StudentController::class,'update']);
    Route::get('admin/student/delete/{id}',[StudentController::class,'delete']);

    //parinte urls
    Route::get('admin/parent/list',[ParentController::class,'list']);
    Route::get('admin/parent/add',[ParentController::class,'add']);
    Route::post('admin/parent/add',[ParentController::class,'insert']);
    Route::get('admin/parent/edit/{id}',[ParentController::class,'edit']);
    Route::post('admin/parent/edit/{id}',[ParentController::class,'update']);
    Route::get('admin/parent/delete/{id}',[ParentController::class,'delete']);
    Route::get('admin/parent/my_student/{id}',[ParentController::class,'myStudent']);
    Route::get('admin/parent/assign_student_parent/{student_id}/{parent_id}',[ParentController::class,'AssignStudentParent']);
    Route::get('admin/parent/assign_student_parent_delete/{student_id}',[ParentController::class,'AssignStudentParentDelete']);


    //Note urls
    Route::get('admin/grade/list',[GradeController::class,'list']);
    Route::get('admin/grade/add',[GradeController::class,'add']);
    Route::post('admin/grade/add',[GradeController::class,'insert']);
    Route::get('admin/grade/edit/{id}',[GradeController::class,'edit']);
    Route::post('admin/grade/edit/{id}',[GradeController::class,'update']);
    Route::get('admin/grade/delete/{id}',[GradeController::class,'delete']);

    //profesor urls
    Route::get('admin/teacher/list',[TeacherController::class,'list']);
    Route::get('admin/teacher/add',[TeacherController::class,'add']);
    Route::post('admin/teacher/add',[TeacherController::class,'insert']);
    Route::get('admin/teacher/edit/{id}',[TeacherController::class,'edit']);
    Route::post('admin/teacher/edit/{id}',[TeacherController::class,'update']);
    Route::get('admin/teacher/delete/{id}',[TeacherController::class,'delete']);

    //clase
    Route::get('admin/class/list',[ClassController::class,'list']);
    Route::get('admin/class/add',[ClassController::class,'add']);
    Route::post('admin/class/add',[ClassController::class,'insert']);
    Route::get('admin/class/edit/{id}',[ClassController::class,'edit']);
    Route::post('admin/class/edit/{id}',[ClassController::class,'update']);
    Route::get('admin/class/delete/{id}',[ClassController::class,'delete']);

    //materii
    Route::get('admin/subject/list',[SubjectController::class,'list']);
    Route::get('admin/subject/add',[SubjectController::class,'add']);
    Route::post('admin/subject/add',[SubjectController::class,'insert']);
    Route::get('admin/subject/edit/{id}',[SubjectController::class,'edit']);
    Route::post('admin/subject/edit/{id}',[SubjectController::class,'update']);
    Route::get('admin/subject/delete/{id}',[SubjectController::class,'delete']);


    //materii si clase
    Route::get('admin/assign_subject/list',[ClassSubjectController::class,'list']);
    Route::get('admin/assign_subject/add',[ClassSubjectController::class,'add']);
    Route::post('admin/assign_subject/add',[ClassSubjectController::class,'insert']);
    Route::get('admin/assign_subject/edit/{id}',[ClassSubjectController::class,'edit']);
    Route::post('admin/assign_subject/edit/{id}',[ClassSubjectController::class,'update']);
    Route::get('admin/assign_subject/delete/{id}',[ClassSubjectController::class,'delete']);



    Route::get('admin/present/list',[PresentController::class,'AttendanceStudent']);
    Route::post('admin/present/list/save',[PresentController::class,'AttendanceStudentSubmit']);
    //Route::get('admin/present/add',[PresentController::class,'add']);
    //Route::post('admin/present/add',[PresentController::class,'insert']);
    //Route::get('admin/present/edit/{id}',[PresentController::class,'edit']);
    //Route::post('admin/present/edit/{id}',[PresentController::class,'update']);
    //Route::get('admin/present/delete/{id}',[PresentController::class,'delete']);


    //Schimba parola
    Route::get('admin/change_password',[UserController::class,'change_password']);
    Route::post('admin/change_password',[UserController::class,'update_change_password']);
});

Route::group(['middleware'=>'teacher'], function (){

    Route::get('teacher/dashboard',[DasboardController::class,'dashboard']);

   //Note urls
   Route::get('teacher/grade/list',[GradeControllerTeacher::class,'list']);
   Route::get('teacher/grade/add',[GradeControllerTeacher::class,'add']);
   Route::post('teacher/grade/add',[GradeControllerTeacher::class,'insert']);
   Route::get('teacher/grade/edit/{id}',[GradeControllerTeacher::class,'edit']);
   Route::post('teacher/grade/edit/{id}',[GradeControllerTeacher::class,'update']);
   Route::get('teacher/grade/delete/{id}',[GradeControllerTeacher::class,'delete']);

   //Schimba parola
   Route::get('teacher/change_password',[UserController::class,'change_password']);
   Route::post('teacher/change_password',[UserController::class,'update_change_password']);

});

Route::group(['middleware'=>'parent'], function (){

    Route::get('parent/dashboard',[DasboardController::class,'dashboard']);

    //Note urls
    Route::get('parent/grade/list',[GradeControllerParent::class,'list']);
    //Route::get('parent/grade/add',[GradeController::class,'add']);
    //Route::post('parent/grade/add',[GradeController::class,'insert']);
    //Route::get('parent/grade/edit/{id}',[GradeController::class,'edit']);
    //Route::post('parent/grade/edit/{id}',[GradeController::class,'update']);
    //Route::get('parent/grade/delete/{id}',[GradeController::class,'delete']);

    //Schimba parola
   Route::get('parent/change_password',[UserController::class,'change_password']);
   Route::post('parent/change_password',[UserController::class,'update_change_password']);

   Route::get('parent/my_student',[ParentController::class,'myStudentParent']);

    

});

Route::group(['middleware'=>'student'], function (){

    Route::get('student/dashboard',[DasboardController::class,'dashboard']);

    //Note urls
    Route::get('student/grade/list',[GradeControllerStudent::class,'list']);
    //Route::get('student/grade/add',[GradeController::class,'add']);
    //Route::post('student/grade/add',[GradeController::class,'insert']);
    //Route::get('student/grade/edit/{id}',[GradeController::class,'edit']);
    //Route::post('student/grade/edit/{id}',[GradeController::class,'update']);
    //Route::get('student/grade/delete/{id}',[GradeController::class,'delete']);


    //Schimba parola
   Route::get('student/change_password',[UserController::class,'change_password']);
   Route::post('student/change_password',[UserController::class,'update_change_password']);

    

});
