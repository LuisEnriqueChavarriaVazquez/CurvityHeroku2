<?php include 'AlmacenIncludesPHP/elementosPhp/HTMLSTRUCTURE/parteSuperior.php' ?>

<?php include 'AlmacenIncludesPHP/elementosPhp/navbarRetorno/navbarSuperior.php' ?>
index_asp.php
<?php include 'AlmacenIncludesPHP/elementosPhp/navbarRetorno/navbarInferior.php' ?>

<?php
if (
    isset($_GET["Nombre"])
    && isset($_GET["RazonSocial"])
    && isset($_GET["Direccion"])
    && isset($_GET["Tipo"])
    && isset($_GET["Telefono"])
    && isset($_GET["DireccionWeb"])
    && isset($_GET["FacebookEmpresa"])
    && isset($_GET["TwitterEmpresa"])
    && isset($_GET["SkypeEmpresa"])
    && isset($_GET["IDEmpresa"])
) {
    $Nombre = $_GET["Nombre"];
    $RazonSocial = $_GET["RazonSocial"];
    $Direccion = $_GET["Direccion"];
    $Tipo = $_GET["Tipo"];
    $Telefono = $_GET["Telefono"];
    $DireccionWeb = $_GET["DireccionWeb"];
    $FacebookEmpresa = $_GET["FacebookEmpresa"];
    $TwitterEmpresa = $_GET["TwitterEmpresa"];
    $SkypeEmpresa = $_GET["SkypeEmpresa"];
    $IDEmpresa = $_GET["IDEmpresa"];
} else {
    print "FATAL ERROR";
}

$servername = "localhost";
$username = "u253306330_curvity";
$password = "curvity";
$dbname = "u253306330_curvity";


$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>


<!--Aqui tenemos el header con la imagen de la empresa (esa la tenemos que jalar de la base de datos)-->

<section class='containerPicture' id='logo-container'>
   <?php 
    $queryFoto = "SELECT FotoLogo FROM Empresa WHERE IDEmpresa = '$IDEmpresa'"; 
    $resultFoto = mysqli_query($conn,$queryFoto);
    while($folaFoto = $resultFoto->fetch_assoc()) {
        print "<img class='imgFormater' src='data:image/jpeg; base64," . base64_encode($folaFoto['FotoLogo']) . "'>";      
    }
   ?>
</section>

<div id="nav-container-top"></div>
<div class="stickyTitleContainer" id="nav-container">
    <div class="nombreEmpresaPerfil" id="containerPicture">
        <p><?php echo $Nombre; ?></p>
    </div>
</div>

<!--Cuerpo de las secciones-->
<div class="boxSubjects blue-grey lighten-5">
    <!--CADA CARD NOS DEBE LLEVAR AL ARCHIVO DE vistaEnvioSolicitud-->
    <!--Aqui estamos reciclando las cards que teniamos en la vista previa al SWIPE-->
    <p class="titles">Ofertas publicadas.</p>

    <?php include("logicaOperacionesAspirante/mostrarDatosDeLaEmpresa.php"); ?>


    <!--Aqui empiezan los datos de la empresa-->

    <p class="titles">Datos de empresa.</p>

    <div class="sizeCardForm backgroundCardOferta borderCardInicio z-depth-3 row">
        <div class="col s12">
            <p class="titleOfertaFinal truncate">Razón Social.</p>
            <p class="descripcionOfertaFinal"><?php echo $RazonSocial; ?></p>
        </div>

        <div class="col s12">
            <p class="titleOfertaFinal truncate">Direccion.</p>
            <p class="descripcionOfertaFinal"><?php echo $Direccion; ?></p>
        </div>

        <div class="col s12">
            <p class="titleOfertaFinal truncate">Tipo.</p>
            <p class="descripcionOfertaFinal"><?php echo $Tipo; ?></p>
        </div>


    </div>

    <div class="sizeCardForm backgroundCardOferta borderCardInicio z-depth-3 row">
        <div class="col s12">
            <p class="titleOfertaFinal truncate">Facebook.</p>
            <p class="descripcionOfertaFinal"><?php echo $FacebookEmpresa; ?></p>
        </div>

        <div class="col s12">
            <p class="titleOfertaFinal truncate">Twitter.</p>
            <p class="descripcionOfertaFinal"><?php echo $TwitterEmpresa; ?></p>
        </div>

        <div class="col s12">
            <p class="titleOfertaFinal truncate">Skype.</p>
            <p class="descripcionOfertaFinal"><?php echo $SkypeEmpresa; ?></p>
        </div>

        <div class="col s12">
            <p class="titleOfertaFinal truncate">Telefonos.</p>
            <p class="descripcionOfertaFinal"><?php echo $Telefono; ?></p>
        </div>

        <div class="col s12">
            <p class="titleOfertaFinal truncate">Email.</p>
            <p class="descripcionOfertaFinal"><?php echo $DireccionWeb; ?></p>
        </div>
    </div>


</div>

<script>
    var observer = new IntersectionObserver(function(entries) {
        // no intersection with screen
        if (entries[0].intersectionRatio === 0)
            document.querySelector("#nav-container").classList.add("nav-container-sticky");
        // fully intersects with screen
        else if (entries[0].intersectionRatio === 1)
            document.querySelector("#nav-container").classList.remove("nav-container-sticky");
    }, {
        threshold: [0, 1]
    });

    observer.observe(document.querySelector("#nav-container-top"));
</script>



<?php include 'AlmacenIncludesPHP/elementosPhp/HTMLSTRUCTURE/parteInferior.php' ?>