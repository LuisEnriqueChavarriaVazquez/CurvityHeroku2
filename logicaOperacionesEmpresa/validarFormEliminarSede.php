<?php

$servername = "localhost";
$username = "u253306330_curvity";
$password = "curvity";
$dbname = "u253306330_curvity";
$contrasena_eliminar_empresa;
$email_empresa_eliminar;
$sedeEliminar;



if (isset($_POST['submit'])) {
    $contrasena_eliminar_empresa = $_POST["contrasena_eliminar_empresa"];
    $email_empresa_eliminar = $_POST["email_empresa_eliminar"];
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }
    
    $queryIdEmpresa = "SELECT IDEmpresa FROM Empresa WHERE Contra = '$contrasena_eliminar_empresa' AND DireccionWeb = '$email_empresa_eliminar'";
    $result = mysqli_query($conn, $queryIdEmpresa);
    $idDinamicaEmpresaPrincipal;
    while ($row = $result->fetch_assoc()) {
        $idDinamicaEmpresaPrincipal = $row['IDEmpresa'];
    }

    $queryGetSede = "SELECT Nombre,NombreReclutador,IDSede FROM Sede WHERE IDEmpresa = '$idDinamicaEmpresaPrincipal'";
    $resultGetSede = mysqli_query($conn, $queryGetSede);
    $sedesRelacionadasEmpresaNombre; //Valor a de la sede
    $sedesRelacionadasEmpresaNombreReclutador; //Valor a de la sede
    while ($rowGetSede = $resultGetSede->fetch_assoc()) {
        $sedesRelacionadasEmpresaNombre = $rowGetSede['Nombre'];
        $sedesRelacionadasEmpresaNombreReclutador = $rowGetSede['NombreReclutador'];
        $sedesRelacionadasEmpresaIDSede = $rowGetSede['IDSede'];
        print "<p>
        <label>
            <input type='checkbox' value=" . $rowGetSede['IDSede'] . " name='sedeEliminar[]' class='filled-in' />
            <span>Sede: " . $rowGetSede['Nombre'] . " // Reclutador: " . $rowGetSede['NombreReclutador'] . "</span>
        </label>
    </p>";
    }

}

$pilaDeIdSedes = array();
if (isset($_GET['borrarSede'])) { //Validacion de envio de formulario
    $ids = "";
    if (!empty($_GET['sedeEliminar'])) {
        // Ciclo para mostrar las casillas checked checkbox.
        foreach ($_GET['sedeEliminar'] as $selected) {
            array_push($pilaDeIdSedes, $selected);
        }
        $ids = join(",", $pilaDeIdSedes);
    }

    $conectar = new mysqli($servername, $username, $password, $dbname);
    
    if ($conectar->connect_error) {
        die("Conexión fallida: " . $conectar->connect_error);
    }

    if($ids == ""){
        echo  "<div class=´errors_box´><p class='errors'>" . "No selecciono sede" . "</p></div>";
    }else{
        $queryBorradoSede = "DELETE FROM Sede WHERE IDSede = ('$ids')";
        if ($conectar->query($queryBorradoSede) === true) {
            echo  "<div class=´errors_box´><p class='success'>" . "Sede borrada" . "</p></div>";
        } else {
            echo "SQL Error: " . $conectar->error;
            echo  "<div class=´errors_box´><p class='errors'>" . "Error de conexion, no hemos podido borrar tus sedes" . "</p></div>";
        }
    }

}



/*if (isset($_POST['submit'])) {
    $contrasena_sede_empresa = $_POST["contrasena_sede_empresa"];
    $nombre_empresa_sede = $_POST["nombre_empresa_sede"];

    //Con los formularios de seguridad obtenemos la ID de la empresa para comparar

    $queryDelete = "DELETE FROM Sedes WHERE IDEmpresa = '$idDinamicaEmpresaPrincipal' ORDER BY IDSede LIMIT 1";
}*/
