<?php include 'AlmacenIncludesPHP/elementosPhp/HTMLSTRUCTURE/parteSuperior.php' ?>

<?php include 'AlmacenIncludesPHP/elementosPhp/navbarRetorno/navbarSuperior.php' ?>
operacionesReclutador.php
<?php include 'AlmacenIncludesPHP/elementosPhp/navbarRetorno/navbarInferior.php' ?>


<!--Cuerpo de las secciones-->
<div class="boxSubjects blue-grey lighten-5">
    <p class="titles">Ofertas SWIPE.</p>
    
    <?php include("logicaOperacionesReclutador/mostrarOfertasPublicadas.php"); ?>

</div>

<?php include 'AlmacenIncludesPHP/elementosPhp/HTMLSTRUCTURE/parteInferior.php' ?>