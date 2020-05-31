<?php

//include '../includes/db.php';

//No se cargan aun los datos de las sedes
//Se establece la conexión a la base de datos.
$servernamephoto = "localhost";
$usernamephoto = "u253306330_curvity";
$passwordphoto = "curvity";
$dbnamephoto = "u253306330_curvity";


$conne = new mysqli($servernamephoto, $usernamephoto, $passwordphoto, $dbnamephoto);
if ($conne->connect_error) {
    die("Conexión fallida: " . $conne->connect_error);
}
        
$queryFotoEmpresa = "SELECT FotoLogo FROM Empresa WHERE IDEmpresa = '$IDEmpresa'";
$resultFoto = mysqli_query($conne,$queryFotoEmpresa);
while ($rowfoto = $resultFoto->fetch_assoc()) {
    "<section class='containerPicture' id='logo-container'>
    <img class='imgFormater' src='data:image/jpeg; base64," . base64_encode($rowfoto['FotoLogo']) . "'>
    </section>";
    
}

?>
