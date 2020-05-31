<?php
include_once 'includes/user.php';
include_once 'includes/user_session.php';
?>
<?php include 'AlmacenIncludesPHP/elementosPhp/HTMLSTRUCTURE/parteSuperior.php' ?>
<?php include 'AlmacenIncludesPHP/elementosPhp/navbars/navbarAspirante.php' ?>

<div class="nav-content">
  <div class="nav-wrapper">
    <div class="formularioB light-blue darken-4">
      <label for="caja_busqueda"></label>
      <input type="search" name="caja_busqueda" id="caja_busqueda"></input>
    </div>
  </div>
</div>
</nav>

<!--Cuerpo de las secciones-->
<br><br><br><br><br><br><br><br>

<div class="boxSubjectsBrowser full-height blue-grey lighten-5" id="fullEmpleosContainer">

  <div id="datos" class="row">

  </div>
</div>

<?php include("logicaOperacionesAspirante/buscador.php"); ?>

<?php include 'AlmacenIncludesPHP/elementosPhp/floatingButtons/botonHearing.php' ?>

<?php include 'AlmacenIncludesPHP/elementosPhp/HTMLSTRUCTURE/parteInferior.php' ?>