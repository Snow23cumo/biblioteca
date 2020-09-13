<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('titulo','Biblioteca')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset("assets/$theme/plugins/font-awesome-free/css/font-awesome.min.css") }}">
 
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset("assets/$theme/dist/css/Adminlte.min.css") }}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
       <link rel="stylesheet" href="{{asset("assets/$theme/dist/css/adminlte.min.css")}}">

       <link rel="stylesheet" href="{{asset("assets/$theme/plugins/fontawesome-free/css/all.min.css")}}">
       <!-- Ionicons -->
       <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    
       <!-- Theme style -->
       <link rel="stylesheet" href="{{asset("assets/$theme/dist/css/adminlte.min.css")}}">
  

  <!-- toastr -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <!--Agregar css en específico-->
  @yield("styles")
    <!--Styles personales-->
    <link rel="stylesheet" href="{{asset("assets/css/custom.css")}}">
</head>

<body class="hold-transition sidebar-mini">

  <div class="wrapper">
 <!-- Inicio header -->
 @include("theme/$theme/header")
  <!-- Fin header -->
   <!-- Inicio Aside -->
   
   @include("theme/$theme/aside")
    <!-- Fin Aside -->
   
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  
  <section class="content">
  @yield('contenido')  
  
  
  </section>
  </div>
<!--Inicio Footer-->
@include("theme/$theme/footer")
<!--Fin Footer-->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
 <!--Inicio de ventana modal para login con más de un rol -->
 @if(session()->get("roles") && count(session()->get("roles")) > 1)
 @csrf
 <div class="modal fade" id="modal-seleccionar-rol" data-rol-set="{{empty(session()->get("rol_id")) ? 'NO' : 'SI'}}" tabindex="-1" data-backdrop="static" data-keyboard="false">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h4 class="modal-title">Roles de Usuario</h4>
             </div>
             <div class="modal-body">
                 <p>Cuentas con mas de un Rol en la plataforma, a continuación seleccione con cual de ellos desea trabajar</p>
                 @foreach(session()->get("roles") as $key => $rol)
                     <li>
                         <a href="#" class="asignar-rol" data-rolid="{{$rol['id']}}" data-rolnombre="{{$rol["nombre"]}}">
                             {{$rol["nombre"]}}
                         </a>
                     </li>
                 @endforeach
                 
             </div>
         </div>
     </div>
 </div>
@endif
  </div>
  <!-- jQuery 3 -->

<script src="{{ asset("assets/$theme/plugins/jquery/jquery.min.js") }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<!-- Bootstrap 3.3.7 -->
<script src="{{asset("assets/$theme/plugins/bootstrap/js/bootstrap.bundle.min.js")}}"></script>

<!-- AdminLTE App -->
<script src="{{ asset("assets/$theme/dist/js/adminlte.min.js") }}"></script>

<!--JQuery Validation 1,19,1-->
@yield("scriptsPlugins")
<script src="{{asset("assets/js/jquery-validation/jquery.validate.min.js")}}"></script>
<script src="{{asset("assets/js/jquery-validation/localization/messages_es.min.js")}}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="{{asset("assets/js/funciones.js")}}"></script>
<script src="{{ asset("assets/js/scripts.js") }}"></script>
@yield("scripts")
</body>
</html>  