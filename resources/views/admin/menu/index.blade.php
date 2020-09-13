@extends("theme.$theme.layout")
@section("titulo")
Menú
@endsection

@section("styles")
    <link href="{{ asset("assets/js/jquery-nestable/jquery.nestable.css") }}" rel="stylesheet" type="text/css" />
@endsection
@section("scriptsPlugins")
    <script src="{{ asset("assets/js/jquery-nestable/jquery.nestable.js") }}" type="text/javascript"></script>
@endsection

<!--Scripts Mensajes jQuery-Validation -->
@section('scripts')
<script src="{{asset("assets/pages/scripts/admin/menu/index.js")}}" type="text/javascript"></script>  
@endsection

@section('contenido')
    <div class="row">
        <div class="col-lg-12">
            @include('includes.mensaje')

            <div class="card card-success">
                <div class="card-header with-border">
                    <h3 class="card-title">Menús</h3>
                </div>
                <div class="card-body">
                    @csrf
                    <div class="dd" id="nestable">
                        <ol class="dd-list">
                            @foreach ($menus as $key => $item)
                            @if ($item["menu_id"] != 0)
                                @break
                            @endif
                            @include("admin.menu.menu-item",["item" => $item])
                        @endforeach
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection