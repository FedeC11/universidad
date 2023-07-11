@extends('adminlte::page')

@section('title', 'calificar')

@section('content_header')
    <h1>Alumnos</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Calificaciones de los alumnos</h5>
            <div class="card-text">
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre alumno</th>
                            <th>Calificacion</th>
                            <th>Mensajes</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($notes as $note)
                        <tr>
                            <td>{{$note->id}}</td>
                            <td>juanito</td>
                            <td>
                                {{$note->calificacion}}
                            </td>
                            <td>
                                {{$note->text}}
                            </td>
                            <td class="text-center" style="">
                                <button class="btn btn-success" data-toggle="modal" data-target="#myModal{{$note->id}}">
                                    <i class="far fa-edit"></i> Calificar
                                  </button>
                                  
                            </td>
                        </tr>
                        <div class="modal fade" id="myModal{{$note->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel">Editar Calificacion</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                
                                <div class="modal-body">
                                  <form action="{{route('calificacion.update',$note->id)}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Agrega la calificacion deseada</label>
                                            <input type="number" class="form-control" name="calificacion" value="{{$note->calificacion}}">
            
                                        
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >Cerrar</button>
                                        <button type="submit" class="btn btn-success">Guardar Cambios
                                            
                                        </button>
                                    </div>
                                    </form>
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
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop