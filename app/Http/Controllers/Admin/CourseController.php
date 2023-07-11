<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\StudentCourse;
use App\Models\Teacher;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $studentcourses =StudentCourse::all();
        $teachers =Teacher::all();
        $courses=Course::all();
        $suma=0;
        return view('admin/clases',compact('teachers','courses','studentcourses','suma'));
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
    public function store(Request $request)
    {
        
        $nuevaclase = new Course();
        $nuevaclase->name_class = $request->input('nombre').' '.$request->input('apellido');
        $nuevaclase->id_teacher_fk = $request->input('asignacion');
        
        // Agrega otros campos y sus valores
        $nuevaclase->save();
        return redirect()->route('clases')->with('success', 'Registro actualizado correctamente'); 
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
        
        $curso= Course::findOrFail($id);
        $curso->name_class = $request->input('nombre').' '.$request->input('apellido');
        $curso->id_teacher_fk = $request->input('asignacion');
        $curso->save();
        return redirect()->route('clases')->with('success', 'Registro actualizado correctamente'); 
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $registro = Course::findOrFail($id);
        $registro->delete();
        return redirect()->route('clases')->with('success', 'Registro borrado correctamente');
    }
}
