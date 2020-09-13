@extends("theme.$theme.layout")
@section('titulo')
Permisos
@endsection
<!--Scripts Mensajes jQuery-Validation -->
@section('scripts')
<script src="{{asset("assets/pages/scripts/admin/permiso/crear.js")}}" type="text/javascript"></script>  
@endsection
@section('contenido')

    <div class="row">
            <div class="col-lg-12">
                @include('includes.form-error')
            <div class="card card-danger">
                <div class="card-header with-border">
                <h3 class="card-title">Editar permiso {{ $data->nombre }}</h3>
                <div class="card-tools pull-right">
                    <a href="{{ route('permiso') }}" class="btn btn-block btn-info btn-sm">
                    <i class="fa fa-fw fa-reply-all"></i>Volver al listado
                    </a>
                  </div>
                </div>
                <div class="card-body table-responsive no-padding">
                    <form action="{{ route('actualizar_permiso',['id'=>$data->id]) }}" class="horizontal-form" id="form-general" method="POST" autocomplete="off">
                        @csrf @method("put")
                          <div class="card-body">
                            @include('admin.permiso.form')
                          </div>
                          <div class="card-footer">
                               <div class="col-lg-3"></div>
                               <div class="col-lg-6">
                                @include('includes.boton-form-editar')
                               </div>
                            </div>
                      </form>
                </div>
            </div>
            </div>
        </div>
@endsection