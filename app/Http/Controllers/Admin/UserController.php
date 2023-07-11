<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ModelHasRole;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users =User::all();
        $ModelHasRole=ModelHasRole::all();
        $roles=Role::all();
        return view('admin.permisos',compact('users','ModelHasRole','roles'));
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
        //
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
        //se actualiza el activo e inactivo
        $usuario = User::findOrFail($id);
        $retVal = ($request->input('active')=='on') ? 1 : 0 ;
        $usuario->active=$retVal;
        $usuario->save();

        $usuario->syncRoles($request->rol);
        
        

       
        return redirect()->route('permisos')->with('success', 'Registro borrado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
