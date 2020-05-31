<?php include 'AlmacenIncludesPHP/elementosPhp/HTMLSTRUCTURE/parteSuperior.php' ?>

<?php include 'AlmacenIncludesPHP/elementosPhp/navbarRetorno/navbarSuperior.php' ?>
operacionesReclutador.php
<?php include 'AlmacenIncludesPHP/elementosPhp/navbarRetorno/navbarInferior.php' ?>


<!--Cuerpo de las secciones-->
<div class="boxSubjects blue-grey lighten-5">
    <p class="titles">Gestion ofertas.</p>

    <a href="agregarOferta.php"><?php include 'AlmacenIncludesPHP/elementosPhp/cardGestion/cardSuperior.php'; ?>
        Agregar nueva oferta.
    <?php include 'AlmacenIncludesPHP/elementosPhp/cardGestion/cardInferior.php'; ?></a>

    <a href="eliminarOferta.php"><?php include 'AlmacenIncludesPHP/elementosPhp/cardGestion/cardSuperior.php'; ?>
        Borrar ofertas publicadas.
    <?php include 'AlmacenIncludesPHP/elementosPhp/cardGestion/cardInferior.php'; ?></a>
</div>

<?php include 'AlmacenIncludesPHP/elementosPhp/HTMLSTRUCTURE/parteInferior.php' ?>