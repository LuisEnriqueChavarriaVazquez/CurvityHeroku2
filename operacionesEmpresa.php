<?php
include_once 'includes/empresa.php';
include_once 'includes/emp_session.php';
?>
<?php include 'AlmacenIncludesPHP/elementosPhp/HTMLSTRUCTURE/parteSuperior.php' ?>

<?php include 'AlmacenIncludesPHP/elementosPhp/navbars/navbarEmpresa.php' ?>

<!--Cuerpo de las secciones-->
<div class="boxSubjects blue-grey lighten-5">
    <p class="titles">Operaciones empresa <?php echo $emp->getEmp(); ?></p>

    <a href="gestionSedes.php">
        <?php include 'AlmacenIncludesPHP/elementosPhp/cardOperaciones/cardOperacionesSuperior.php'; ?>
        Gestionar sedes.
        <?php include 'AlmacenIncludesPHP/elementosPhp/cardOperaciones/cardOperacionesInferior.php'; ?>
    </a>

    <a href="editarPerfilEmpresa.php">
        <?php include 'AlmacenIncludesPHP/elementosPhp/cardOperaciones/cardOperacionesSuperior.php'; ?>
        Modificar datos del perfil.
        <?php include 'AlmacenIncludesPHP/elementosPhp/cardOperaciones/cardOperacionesInferior.php'; ?>
    </a>
</div>

<?php include 'AlmacenIncludesPHP/elementosPhp/HTMLSTRUCTURE/parteInferior.php' ?>