<?php

use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\NoteController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::get('',[HomeController::class,'index']);

Route::middleware('role:admin','auth','verified')->group(function (){
    Route::get('/permisos',[UserController::class,'index'])
    ->name('permisos');

    Route::put('/update{id}', [UserController::class,'update'])
    ->name('permisos.update');

    Route::get('/maestros',[TeacherController::class,'index'])
    ->name('maestros');

    Route::put('maestros/update{id}', [TeacherController::class,'update'])
    ->name('maestros.update');

    Route::get('/destroy{id}', [TeacherController::class,'destroy'])
    ->name('maestros.destroy');

    Route::put('/add', [TeacherController::class,'store'])
    ->name('maestros.store');

    Route::get('/alumnos',[StudentController::class,'index'])
    ->name('alumnos');

    Route::put('alumnos/update{id}', [StudentController::class,'update'])
    ->name('alumnos.update');

    Route::get('alumnos/destroy{id}', [StudentController::class,'destroy'])
    ->name('alumnos.destroy');

    Route::put('alumnos/add', [StudentController::class,'store'])
    ->name('alumnos.store');

    Route::get('/clases',[CourseController::class,'index'])
    ->name('clases');

    Route::put('clases/update{id}', [CourseController::class,'update'])
    ->name('clases.update');

    Route::get('clases/destroy{id}', [CourseController::class,'destroy'])
    ->name('clases.destroy');

    Route::put('clases/add', [CourseController::class,'store'])
    ->name('clases.store');
});

Route::middleware('role:maestro','auth','verified')->group(function (){
    Route::get('/notas',[NoteController::class,'index'])
    ->name('notas');
    Route::put('/update{id}', [NoteController::class,'update'])
    ->name('calificacion.update');
    Route::put('/store{id}', [NoteController::class,'store'])
    ->name('calificacion.store');
});