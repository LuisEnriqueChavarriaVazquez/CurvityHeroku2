<?php
if (
    isset($_GET["IDSede"])
    & isset($_GET["IDEmpresa"])
    & isset($_GET["IDPuesto"])
) {
    $IDSede = $_GET["IDSede"];
    $IDEmpresa = $_GET["IDEmpresa"];
    $IDPuesto = $_GET["IDPuesto"];
}

$servername = "localhost";
$username = "u253306330_curvity";
$password = "curvity";
$dbname = "u253306330_curvity";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

//Recabar los datos de aspirantes
$queryDatosMatching = "SELECT IDAspirante FROM Matching WHERE IDSede = '$IDSede' AND IDEmpresa = '$IDEmpresa' AND IDPuesto = '$IDPuesto'";
$resultMatching = mysqli_query($conn, $queryDatosMatching);
if ($resultMatching = $conn->query($queryDatosMatching)) {
    $IDAspiranteSelecto;
    while ($rowAspirantesSelectos = $resultMatching->fetch_assoc()) {
        $IDAspiranteSelecto = $rowAspirantesSelectos['IDAspirante'];
    }
    imprimir($IDAspiranteSelecto,$conn);
}


function imprimir($IDAspiranteSelecto,$conn){
    $queryDatosAspirante = "SELECT * FROM Aspirante WHERE IDAspirante = '$IDAspiranteSelecto'";
    $resultAsp = mysqli_query($conn, $queryDatosAspirante);
    while ($rowAsp = $resultAsp->fetch_assoc()) {
        print "perro";
    print "
            <div class='margin-down-bigger elementoSwipePadre'>
            <div class='wrapper'>
            <div class='idDisplay z-depth-4'>".$rowAsp['IDAspirante']."</div>
            <div class='clash-card empleado'>
            <div class='clash-card__image clash-card__image--empleado'>
            <img class='card-image medidas' src='data:image/jpeg; base64," . base64_encode($rowAsp['FotoPerfil']). "'>
            </div>
            <div class='buttonContainerEvaluate z-depth-3'>
            <div onclick='M.toast({html: 'Aspirante aceptado'});'  class='aceptaButton green lighten-4 btn buttonEvaluate waves-effect waves-green'><img src='icons/check.svg'></div>
            <div onclick='M.toast({html: 'Aspirante rechazado'});' class='rechazaButton red lighten-4 btn buttonEvaluate waves-effect waves-red'><img src='icons/cross.svg'></div>
            <div onclick='M.toast({html: 'Cambios desechos'});' class='rehacerButton grey lighten-2 buttonHide btn buttonEvaluate waves-effect waves-light'><img src='icons/undo.svg'></div>
            </div>
            <section class='contentDescription'>
            <div class='clash-card__unit-description black-text left-align'>
            <div class='clash-card__unit-name truncate'>Nombre.</div>
            <p class='flow-text'>".$rowAsp['Nombre']."</p>
            </div>
            <div class='clash-card__unit-description black-text left-align'>
            <div class='clash-card__unit-name truncate'>Experiencia laboral.</div>
            <p class='small_text_summary'>".$rowAsp['ResumenExpPrevLab']."</p>
            </div>
            <div class='clash-card__unit-description black-text left-align'>
            <div class='clash-card__unit-name truncate'>Sueldo deseado.</div>
            <p class='flow-text'>".$rowAsp['SueldoDeseado']."</p>
            </div>
            <div class='clash-card__unit-description black-text left-align'>
            <div class='clash-card__unit-name truncate'>Dirección actual.</div>
            <p class='small_text_summary'>".$rowAsp['Direccion']."</p>
            </div>
            <div class='clash-card__unit-description black-text left-align'>
            <div class='clash-card__unit-name truncate'>Idiomas que domina.</div>
            <p class='small_text_summary'>(".$rowAsp['numeroIdiomas'].")".$rowAsp['detallesIdiomas']."</p>
            </div>
            <div class='clash-card__unit-description black-text left-align'>
            <div class='clash-card__unit-name truncate'>Nivel académico.</div>
            <p class='flow-text'>".$rowAsp['NivelAcademico']."</p>
            </div>
            <div class='clash-card__unit-description black-text left-align'>
            <div class='clash-card__unit-name truncate'>Habilidades adicionales.</div>
            <p class='small_text_summary'>".$rowAsp['ResumenHab']."</p>
            </div>
            <div class='clash-card__unit-description black-text left-align'>
            <div class='clash-card__unit-name truncate'>Correo electrónico.</div>
            <p class='flow-text'>".$rowAsp['CorreoElec']."</p>
            </div>
            <div class='clash-card__unit-description black-text left-align'>
            <div class='clash-card__unit-name truncate'>Redes sociales.</div>
            <p class='small_text_social_media'>Facebook:<span class='small_text_social_media_name'> ".$rowAsp['FacebookAspirante']."</span></p>
            <p class='small_text_social_media'>Twitter:<span class='small_text_social_media_name'> ".$rowAsp['TwitterAspirante']."</span></p>
            <p class='small_text_social_media last_social_media'>Skype:<span class='small_text_social_media_name'> ".$rowAsp['SkypeAspirante']."</span></p>
            </div>
            </section>
            </div> <!-- end clash-card empleado-->
            </div> <!-- end wrapper -->
            </div>
            ";
        }
        
    }