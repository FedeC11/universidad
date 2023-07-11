@extends('adminlte::page')

@section('title', 'Clases | Admin')

@section('content_header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Lista de las clases</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">clases</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal" >
        <i class="fas fa-user-plus"></i> Agregar
      </button>
    </div>
  </div>
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">Agregar Clases</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{route('clases.store')}}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Nombre de la materia</label>
              <input type="text" class="form-control" name="nombre" value=" ">
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Maestro disponible</label>
              <input type="number" class="form-control"  name="maestro" value=" ">
            </div>
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >Cerrar</button>
            <button type="submit" class="btn btn-success">Agregar Cambios</button>
          </div>
        </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-primary" data-dismiss="modal">Guardar cambios</button>
        </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Informacion de las clases</h5>
            <div class="card-text">
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Clase</th>
                            <th>Maestro</th>
                            <th>Alumnos Inscritos</th>
                            <th>acciones</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($courses as $course)
                        <tr>
                            <td>{{$course->id}}</td>
                            <td>{{$course->name_class}}</td>
                            <td>
                              @foreach ($teachers as $teacher)
                                    @if ($course->id_teacher_fk == $teacher->id)
                                    {{ $teacher->nombre .' '. $teacher->apellido }}
                                    @else
                                        sin asignacion
                                    @endif
                                @endforeach
                            </td>
                            <td>4</td>
                            <td><div class="btn-group">
                                <a href="{{route("clases")}}" class="btn btn-success">
                                    <i class="far fa-edit"></i> Editar
                                  </a><button class="btn btn-danger">
                                    <i class="fas fa-trash"></i> Borrar
                                  </button>
                            </div></td>
                        </tr>
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