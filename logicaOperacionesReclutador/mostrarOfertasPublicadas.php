<?php
if (
    isset($_GET["Nombre"])
) {
    $Nombre = $_GET["Nombre"];
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

$queryDatosSede = "SELECT * FROM Sede WHERE NombreReclutador = '$Nombre'"; 
$resultSede = mysqli_query($conn,$queryDatosSede);
$IDSede;
$IDEmpresa;
while($rowSede = $resultSede->fetch_assoc()) {
    $IDSede = $rowSede['IDSede'];
    $IDEmpresa = $rowSede['IDEmpresa'];     
}

$queryDatosPuesto = "SELECT * FROM Puesto WHERE IDSede = '$IDSede' AND IDEmpresa = '$IDEmpresa'";
$resultPuesto = mysqli_query($conn, $queryDatosPuesto);
$nombrePuesto;
$IDPuesto;
while($rowPuesto = $resultPuesto->fetch_assoc()) {
    $nombrePuesto = $rowPuesto['Nombre'];
    $IDPuesto = $rowPuesto['IDPuesto']; 
    
     print "<form action='paginaSwipe.php' method='GET'><a name='submit' 
     href='./paginaSwipe.php?IDSede=$IDSede&IDEmpresa=$IDEmpresa&IDPuesto=$IDPuesto'>";
     include 'AlmacenIncludesPHP/elementosPhp/cardGestion/cardSuperior.php';
     echo $nombrePuesto;
     include 'AlmacenIncludesPHP/elementosPhp/cardGestion/cardInferior.php';
     print "</a></form>";
}