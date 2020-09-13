@extends("theme.$theme.layout")
@section('titulo')
Roles
@endsection

@section('scripts')
<script src="{{asset("assets/pages/scripts/admin/index.js")}}" type="text/javascript"></script>  
@endsection

@section('contenido')
<div class="row">
    <div class="col-lg-12">
      @include('includes.mensaje')
    <div class="card card-primary">
        <div class="card-header with-border">
          <h3 class="card-title"> Listado De Roles</h3>
          <div class="card-tools pull-right">
            <a href="{{ route('crear_rol') }}" class="btn btn-block btn-success btn-sm">
            <i class="fa fa-fw fa-plus-circle"></i>Agregar Nuevo Rol
            </a>
          </div>
        </div>
        <div class="card-body table-responsive no-padding">
        <table class="table table-bordered table-hover table-striped" id="tabla-data">
        <thead>
        <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th class="width70">Opciones</th>
        </tr>
        </thead>
        <tbody>
            @foreach($datas as $data )
            <tr>
            <td>{{$data->id}}</td>
              <td>{{$data->nombre}}</td>
              <td>
                <a href="{{ route('editar_rol',['id' =>$data->id]) }}" class="btn-accion-tabla tooltipsC" title="Editar este registro" >
                <i class="fa fa-edit"></i>
              </a>
              <form action="{{ route('eliminar_rol',['id' =>$data->id]) }} " class="d-inline form-eliminar" method="POST">
                @csrf  @method("delete")
                <button type="submit" class="btn-accion-tabla eliminar tooltipsC" title="Eliminar este registro">
                  <i class="fa fa-fw fa-trash text-danger"></i>
                </button>
              </form>
              </td>
            </tr>
            
            @endforeach
        </tbody>
        </table>
        </div>
     </div>
    </div>
 </div>

@endsection