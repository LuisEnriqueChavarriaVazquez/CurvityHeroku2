<?php
$servername = "localhost";
$username = "u253306330_curvity";
$password = "curvity";
$dbname = "u253306330_curvity";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$salida = "";

$query = "SELECT * FROM Empresa WHERE Name NOT LIKE '' ORDER By IDEmpresa LIMIT 10";

if (isset($_POST['consulta'])) {
    $q = $conn->real_escape_string($_POST['consulta']);
    $query = "SELECT * FROM Empresa WHERE Nombre LIKE '%$q%'";
}

$resultado = $conn->query($query);

if ($resultado = $conn->query($query)) {
    if ($resultado->num_rows > 0) {
        $salida .= "<div>
        
        


        ";

        while ($fila = $resultado->fetch_assoc()) {
            $salida .= "
            <form method='GET' action='perfilDeEmpresaVistoPorAspirante.php'>
            <div class='col s12 m6 borderCardInicio cardEmpleoNueva waves-effect ' id='".$fila['IDEmpresa']."'>
              <a name='submit' 
              href='./perfilDeEmpresaVistoPorAspirante.php?Nombre=".$fila['Nombre'].
              "&RazonSocial=".$fila['RazonSocial'].
              "&Direccion=".$fila['Direccion'].
              "&Tipo=".$fila['Tipo'].
              "&Telefono=".$fila['Telefono'].
              "&DireccionWeb=".$fila['DireccionWeb'].
              "&FacebookEmpresa=".$fila['FacebookEmpresa'].
              "&SkypeEmpresa=".$fila['SkypeEmpresa'].
              "&TwitterEmpresa=".$fila['TwitterEmpresa'].
              "&IDEmpresa=".$fila['IDEmpresa'].
              "'>
              <div class='card borderCardInicio waves-effect z-depth-2'>
                <div class='card-image'>" . "<img class='card-image' src='data:image/jpeg; base64," . base64_encode($fila['FotoLogo']) . "'>" . "</div>
                <div class='card-content'> <p class='flow-text noLinkStyle'>" . $fila['Nombre'] . "</p></div>
              </div>
              </a>
            </div>
            </form>
    				";
        }
        $salida .= "</div>";
    } else {
        $salida .= "<div style='width:100%; display:flex; justify-content:center; align-items:center; flex-direction: column;'>
        <div><h3 style='font-weight:900;'>Sin resultados</h3></div> <br><br> 
        <div style='padding: 40px;'><img src='pictures/explorer.png' width='100%'></div></div>";
    }
}


echo $salida;

$conn->close();
