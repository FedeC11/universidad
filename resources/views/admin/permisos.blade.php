@extends('adminlte::page')

@section('title', 'Permisos | Admin')

@section('content_header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Lista de Permisos</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Permisos</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Informacion de Permisos</h5>
            <div class="card-text">
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Email/Usuario</th>
                            <th>Permiso</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                @foreach ($ModelHasRole as $usuariorol)
                                    @if ($user->id == $usuariorol->model_id)
                                        @foreach ($roles as $role)
                                            @if ($usuariorol->role_id == $role->id)
                                                {{ $role->name }}
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach
                            </td>
                            <td>@if ($user->active==1)
                                activo
                            @endif @if ($user->active==0)
                                inactivo
                            @endif</td>
                            <td class="text-center" style="">
                                <button class="btn btn-success" data-toggle="modal" data-target="#myModal{{$user->id}}">
                                    <i class="far fa-edit"></i> Editar
                                  </button>
                            </td>
                        </tr>
                        <div class="modal fade" id="myModal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title" id="myModalLabel">Editar Estudiante</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <form action="{{route('permisos.update',$user->id)}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Email de usuario</label>
                                            <input type="text" class="form-control" name="email" value="{{$user->email}} ">
            
                                        </div>
                                        <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Rol de usuario</label>
                                        <select class="form-select" aria-label="Default select example" name="rol">
                                            <option selected value="admin">Admin</option>
                                            <option value="maestro">Maestro</option>
                                            <option value="alumno">Alumno</option>
                                        </select>
                                        </div>
                                        
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" name="active">
                                            <label class="form-check-label" for="flexSwitchCheckDefault">Usuario activo</label>
                                          </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >Cerrar</button>
                                        <button type="submit" class="btn btn-success">Guardar Cambios
                                            
                                        </button>
                                    </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                  <button type="button" class="btn btn-primary" data-dismiss="modal">Guardar cambios</button>
                                </div>
                              </div>
                            </div>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0-alpha3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css">
@stop

@section('js')
    <script src="https://cdn.datatables.net/buttons/2.4.0/js/dataTables.buttons.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script> 
    <script src="https://cdn.datatables.net/buttons/2.4.0/js/buttons.html5.min.js"></script> 
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>
    <script>new DataTable('#example');</script>
@stop
