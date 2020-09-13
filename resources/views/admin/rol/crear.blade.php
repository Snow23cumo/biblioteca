@extends("theme.$theme.layout")
@section('titulo')
Roles
@endsection
<!--Scripts Mensajes jQuery-Validation -->
@section('scripts')
<script src="{{asset("assets/pages/scripts/admin/crear.js")}}" type="text/javascript"></script>  
@endsection
@section('contenido')
    <div class="row">
            <div class="col-lg-12">
              @include('includes.form-error')
            <div class="card card-danger">
                <div class="card-header with-border">
                <h3 class="card-title">Crear Roles</h3>
                <div class="card-tools pull-right">
                  <a href="{{ route('rol') }}" class="btn btn-block btn-info btn-sm">
                  <i class="fa fa-fw fa-reply-all"></i>Volver al listado
                  </a>
                </div>
                </div>
                <form action="{{ route('guardar_rol') }}" class="horizontal-form" id="form-general" method="POST" autocomplete="off">
                  @csrf
                    <div class="card-body">
                      @include('admin.rol.form')
                    </div>
                    <div class="card-footer">
                         <div class="col-lg-3"></div>
                         <div class="col-lg-6">
                          @include('includes.boton-form-crear')
                         </div>
                      </div>
                </form>
            </div>
            </div>
        </div>
@endsection