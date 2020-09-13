@extends("theme.$theme.layout")
@section('titulo')
Libros
@endsection

@section('scripts')
<script src="{{asset("assets/pages/scripts/libro/index.js")}}" type="text/javascript"></script>  
@endsection

@section('contenido')
<div class="row">
    <div class="col-lg-12">
      @csrf
      @include('includes.mensaje')
    <div class="card card-primary">
        <div class="card-header with-border">
          <h3 class="card-title"> Listado De Libros</h3>
          <div class="card-tools pull-right">
            <a href="{{ route('crear_libro') }}" class="btn btn-block btn-success btn-sm">
            <i class="fa fa-fw fa-plus-circle"></i>Agregar Nuevo Libro
            </a>
          </div>
        </div>
        <div class="card-body table-responsive no-padding">
        <table class="table table-bordered table-hover table-striped" id="tabla-data">
        <thead>
        <tr>
        <th>Título</th>
        <th>ISBN</th>
        <th>Autor</th>
        <th>Cantidad</th>
        <th>Editorial</th>
        <th>Foto</th>
        <th class="width70">Opciones</th>
        </tr>
        </thead>
        <tbody>
            @foreach($datas as $data )
            <tr>            
              <td>{{ $data->titulo }}</td>
              <td>{{ $data->isbn }}</td>
              <td>{{ $data->autor }}</td>
              <td>{{ $data->cantidad }}</td>
              <td>{{ $data->editorial }}</td>
              <td><img src="{{ asset('storage').'/imagenes/caratulas/'.$data->foto }}" alt="Caratula del libro" width="100px" height="100px"></td>
              <td>
                <a href="{{ route('editar_libro',['id' =>$data->id]) }}" class="btn-accion-tabla tooltipsC" title="Editar este registro" >
                <i class="fas fa-edit"></i>
              </a>
              <form action="{{ route('eliminar_libro',['id' =>$data->id]) }} " class="d-inline form-eliminar" method="POST">
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
<div class="modal fade" id="modal-ver-libro" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button"  class="close" data-dismiss="modal" aria-label="close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Libro</h4>
      </div>
      <div class="modal-body"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endsection