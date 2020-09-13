$(document).ready(function(){
    Biblioteca.validacionGeneral('form-general');
    // Evento para el icono
    $('#icono').on('blur',function(){
        $('#mostrar-icono').removeClass().addClass('fa fa-fw'+ $(this).val());
    });
});