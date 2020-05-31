<?php include 'AlmacenIncludesPHP/elementosPhp/HTMLSTRUCTURE/parteSuperior.php' ?>

<?php include 'AlmacenIncludesPHP/elementosPhp/navbars/navbarReclutador.php' ?>

<!--Cuerpo de las secciones-->
<div class="boxSubjects blue-grey lighten-5">
    <p class="titles">Operaciones reclutador.</p>

    <?php 
    $nombre = $_SESSION["nombreUsuario"];
    ?>

    <form action="ofertasPublicadasPrevioSwipe.php" method="GET">
        <?php
        echo "<a name='submit' href='./ofertasPublicadasPrevioSwipe.php?Nombre=$nombre'>";
        ?>
            <?php include 'AlmacenIncludesPHP/elementosPhp/cardOperaciones/cardOperacionesSuperior.php'; ?>
            Gestionar solicitudes con SWIPE.
            <?php include 'AlmacenIncludesPHP/elementosPhp/cardOperaciones/cardOperacionesInferior.php'; ?>
        </a>
    </form>


    <a href="gestionOfertas.php">
        <?php include 'AlmacenIncludesPHP/elementosPhp/cardOperaciones/cardOperacionesSuperior.php'; ?>
        Gestionar ofertas de sede.
        <?php include 'AlmacenIncludesPHP/elementosPhp/cardOperaciones/cardOperacionesInferior.php'; ?>
    </a>
</div>

<?php include 'AlmacenIncludesPHP/elementosPhp/floatingButtons/botonSWIPE.php' ?>


<?php include 'AlmacenIncludesPHP/elementosPhp/HTMLSTRUCTURE/parteInferior.php' ?>