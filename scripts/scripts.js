$(document).ready(function () {

  //Para el menu lateral.
  $('.sidenav').sidenav();

  //Boton flotante
  $('.fixed-action-btn').floatingActionButton();

  //Tamaño al 100% de la ventana
  $('.full-height').fullHeight();

  //Contador de caracteres en los texts areas
  $('textarea#direccion_sede, textarea#descripcion_empresa, textarea#habilidades_aspirante, textarea#experiencia_laboral, textarea#requerimientos_basicos, textarea#prestaciones_oferta').characterCounter();

  //Inicializamos la parte de los scripts para el select
  $('select').formSelect();

  //Para la parte de la fecha de nac
  $('.datepicker').datepicker();

  //Para la parte de los DROPSDOWN del formulario
  $('.collapsible').collapsible();

  //Activa los pop ups propios
  $('.modal').modal();

});