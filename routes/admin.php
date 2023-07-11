<?php

use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::get('',[HomeController::class,'index']);

Route::get('/permisos',[UserController::class,'index'])
->middleware(['auth','verified'])->name('permisos');

Route::put('/update{id}', [UserController::class,'update'])
->middleware(['auth','verified'])->name('permisos.update');

Route::get('/maestros',[TeacherController::class,'index'])
->middleware(['auth','verified'])->name('maestros');

Route::put('maestros/update{id}', [TeacherController::class,'update'])
->middleware(['auth','verified'])->name('maestros.update');

Route::get('/destroy{id}', [TeacherController::class,'destroy'])
->middleware(['auth','verified'])->name('maestros.destroy');

Route::put('/add', [TeacherController::class,'store'])
->middleware(['auth','verified'])->name('maestros.store');

Route::get('/alumnos',[StudentController::class,'index'])
->middleware(['auth','verified'])->name('alumnos');

Route::put('alumnos/update{id}', [StudentController::class,'update'])
->middleware(['auth','verified'])->name('alumnos.update');

Route::get('alumnos/destroy{id}', [StudentController::class,'destroy'])
->middleware(['auth','verified'])->name('alumnos.destroy');

Route::put('alumnos/add', [StudentController::class,'store'])
->middleware(['auth','verified'])->name('alumnos.store');

Route::get('/clases',[CourseController::class,'index'])
->middleware(['auth','verified'])->name('clases');

Route::put('clases/update{id}', [CourseController::class,'update'])
->middleware(['auth','verified'])->name('clases.update');

Route::get('clases/destroy{id}', [CourseController::class,'destroy'])
->middleware(['auth','verified'])->name('clases.destroy');

Route::put('clases/add', [CourseController::class,'store'])
->middleware(['auth','verified'])->name('clases.store');