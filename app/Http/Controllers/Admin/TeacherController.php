<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers =Teacher::all();
        $courses=Course::all();
        return view('admin/maestros',compact('teachers','courses'));
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
        $nuevoUsuario = new User();
        $nuevoUsuario->name = $request->input('nombre').' '.$request->input('apellido');
        $nuevoUsuario->email = $request->input('email');
        $password = $request->input('password');
        $nuevoUsuario->password= bcrypt($password);
        $nuevoUsuario->save();
        $nuevoUsuario->assignRole('maestro');
        $userId = $nuevoUsuario->id;
        $nuevoRegistro = new Teacher();
        $nuevoRegistro->id=null;
        $nuevoRegistro->id_user_fk=$userId;
        $nuevoRegistro->nombre = $request->input('nombre');
        $nuevoRegistro->apellido = $request->input('apellido');
        $nuevoRegistro->direccion = $request->input('direccion');
        $nuevoRegistro->fecha_cumpleaños = $request->input('fecha_cumple');
        
        $nuevoUsuario->assignRole('maestro');
        // Agrega otros campos y sus valores
        $nuevoRegistro->save();
        return redirect()->route('maestros')->with('success', 'Registro actualizado correctamente'); 
    
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
        $registro = Teacher::findOrFail($id);
    
        // Validar los datos del formulario, si es necesario
        
        $registro->nombre = $request->input('nombre');
        $registro->apellido = $request->input('apellido');
        $registro->direccion = $request->input('direccion');
        $registro->fecha_cumpleaños = $request->input('fecha_cumple');
        
        // Agregar otros campos que desees actualizar
        
        $registro->save();
    
        // Redirigir a la página de destino después de la actualización
        return redirect()->route('maestros')->with('success', 'Registro actualizado correctamente'); 
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
        $registro = Teacher::findOrFail($id);
        $id_usuario = $registro->id_user_fk;
        $registroUsuario=User::findOrFail($id_usuario);
        $registro->delete();
        $registroUsuario->delete();
        
        return redirect()->route('maestros')->with('success', 'Registro borrado correctamente');
    }
}
