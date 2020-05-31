<?php include 'AlmacenIncludesPHP/elementosPhp/HTMLSTRUCTURE/parteSuperior.php' ?>

<?php include 'AlmacenIncludesPHP/elementosPhp/navbarRetorno/navbarInicialRetornoSuperior.php' ?>
index_asp.php
<?php include 'AlmacenIncludesPHP/elementosPhp/navbarRetorno/navbarInicialRetornoInferior.php' ?>

<?php
$Nombre = "knkan";
if (
    isset($_GET["Nombre"])
    && isset($_GET["PagoOfertado"])
    && isset($_GET["ModalidadPago"])
    && isset($_GET["ResumenRequisitos"])
    && isset($_GET["ResumenPrestaciones"])
    && isset($_GET["IDPuesto"])
) {
    $Nombre = $_GET["Nombre"];
    $PagoOfertado = $_GET["PagoOfertado"];
    $ModalidadPago = $_GET["ModalidadPago"];
    $ResumenRequisitos = $_GET["ResumenRequisitos"];
    $ResumenPrestaciones = $_GET["ResumenPrestaciones"];
    $IDPuesto = $_GET["IDPuesto"];
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


<div class="boxSubjectsInicioExtended light-blue darken-4 centerElements">

    <div class="cardTitleOfertaFinal">
        <p class="titleOfertaFinal truncate"><?php echo $Nombre; ?></p>
    </div>
    <div class="sizeCardForm backgroundCardOferta borderCardInicio z-depth-3">
        <div>
            <p class="titleOfertaFinal truncate">Requisitos de la vacante.</p>
            <p class="descripcionOfertaFinal"><?php echo $ResumenRequisitos; ?></p>
        </div>

        <div>
            <p class="titleOfertaFinal truncate">Pago ofertado.</p>
            <p class="descripcionOfertaFinal"><?php echo $PagoOfertado; ?></p>
        </div>

        <div>
            <p class="titleOfertaFinal truncate">Modalidad de pago.</p>
            <p class="descripcionOfertaFinal"><?php echo $ModalidadPago; ?></p>
        </div>

        <div>
            <p class="titleOfertaFinal truncate">Prestaciones.</p>
            <p class="descripcionOfertaFinal"><?php echo $ResumenPrestaciones; ?></p>
        </div>

        <div>
            <p class="titleOfertaFinal Nota">El envio de la solicitud no podra ser desecho.</p>
        </div>
    </div>

    <br>
    <div class="cardTitleOfertaFinal">
        <p class="titleOfertaFinal truncate">Confirmación de seguridad.</p>
    </div>
    <form method="POST" action="">
        <div class="sizeCardForm backgroundCardForm borderCardInicio z-depth-3">
            <!--llamado al archivo validador-->
            <div class="row">
                <div class="input-field col s12">
                    <input placeholder="Confirme email su email." id="email_aspirante_envio_solicitud" name="email_aspirante_envio_solicitud" type="email" class="validate white-text">
                    <label for="email_aspirante_envio_solicitud">Confirme su email.</label>
                </div>
                <div class="input-field col s12">
                    <input placeholder="Confirme su contraseña." id="pass_aspirante_envio_solicitud" name="pass_aspirante_envio_solicitud" type="password" class="validate white-text">
                    <label for="pass_aspirante_envio_solicitud">Confirme su contraseña.</label>
                </div>
            </div>
            <button type="submit" name="submit" class="waves-effect btn-large borderButton sizeButton textButton grey lighten-5 blue-text text-darken-4">Enviar solicitud.</button>
        </div>
    </form>

    <?php
    include("logicaOperacionesAspirante/envioSolicitudPuesto.php");
    ?>
</div>


<?php include 'AlmacenIncludesPHP/elementosPhp/HTMLSTRUCTURE/parteInferior.php' ?>