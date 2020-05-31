<?php

$servername = "localhost";
$username = "u253306330_curvity";
$password = "curvity";
$dbname = "u253306330_curvity";
$email_reclutador_eliminar_oferta;
$contrasena_eliminar_reclutador_oferta;
$ofertaEliminar;

global $idDinamicaSede; //Guarda el IDSede
global $idDinamicaEmpresaPrincipal; //Guarda el IDEMPRESA


if (isset($_POST['submit'])) {

    //Hacemos la conexion con base
    $contrasena_eliminar_reclutador_oferta = $_POST["contrasena_eliminar_reclutador_oferta"];
    $email_reclutador_eliminar_oferta = $_POST["email_reclutador_eliminar_oferta"];

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    //Obtengo el ID de la empresa cuando el EMAIL de la empresa es el correcto
    $queryIdEmpresa = "SELECT IDEmpresa FROM Empresa WHERE  DireccionWeb = '$email_reclutador_eliminar_oferta'";
    $result = mysqli_query($conn, $queryIdEmpresa);
    while ($row = $result->fetch_assoc()) {
        $idDinamicaEmpresaPrincipal = $row['IDEmpresa'];
    }

    //Obtengo el ID de la sede cuando la contraseña es correcta
    $queryIDSede = "SELECT IDSede FROM Sede WHERE  ContraReclutador = '$contrasena_eliminar_reclutador_oferta'";
    $resultSede = mysqli_query($conn, $queryIDSede);
    while ($rowSede = $resultSede->fetch_assoc()) {
        $idDinamicaSede = $rowSede['IDSede'];
    }

    //Obtenemos todas las ID del puesto y nombre si la IDSede y IDEmpresa coinciden (obtenidas de empresa y sede)
    $queryGetOferta = "SELECT Nombre,IDEmpresa,IDSede,IDPuesto FROM Puesto WHERE IDEmpresa = '$idDinamicaEmpresaPrincipal' AND IDSede = '$idDinamicaSede'";
    $resultGetOferta = mysqli_query($conn, $queryGetOferta);
    $ofertaRelacionadasEmpresaNombre; //Valor a de la sede
    $ofertaRelacionadasEmpresaIDEmpresa; //Valor a de la sede
    $ofertaRelacionadasEmpresaIDSede; //Valor a de la sede
    $ofertaRelacionadasEmpresaIDPuesto; //Valor a de la sede
    while ($rowGetOferta = $resultGetOferta->fetch_assoc()) {
        $ofertaRelacionadasEmpresaNombre = $rowGetOferta['Nombre'];
        $ofertaRelacionadasEmpresaIDEmpresa = $rowGetOferta['IDEmpresa']; 
        $ofertaRelacionadasEmpresaIDSede = $rowGetOferta['IDSede'];
        $ofertaRelacionadasEmpresaIDPuesto = $rowGetOferta['IDPuesto'];
        print "<p>
        <label>
            <input type='checkbox' value=" . $rowGetOferta['IDPuesto'] . " name='ofertaEliminar[]' class='filled-in' />
            <span>Oferta: " . $rowGetOferta['Nombre'] . "</span>
        </label>
    </p>";
    }
}

$pilaDeIdOfertas = array();
if (isset($_GET['borrarOferta'])) { //Validacion de envio de formulario de eliminar
    $ids = "";
    if (!empty($_GET['ofertaEliminar'])) {
        // Ciclo para mostrar las casillas checked checkbox.
        foreach ($_GET['ofertaEliminar'] as $selected) {
            array_push($pilaDeIdOfertas, $selected);
        }
        $ids = join(",", $pilaDeIdOfertas);
    }

    //Conexion con la base
    $conectar = new mysqli($servername, $username, $password, $dbname);

    if ($conectar->connect_error) {
        die("Conexión fallida: " . $conectar->connect_error);
    }

    //Validaciones previas a la eliminacion
    if ($ids == "") { //Si esta vacia
        echo  "<div class=´errors_box´><p class='errors'>" . "No selecciono Oferta" . "</p></div>";
    } else {
        $queryBorradoSede = "DELETE FROM Puesto WHERE IDPuesto = ('$ids')";
        if ($conectar->query($queryBorradoSede) === true) {
            echo  "<div class=´errors_box´><p class='success'>" . "Oferta borrada" . "</p></div>";
        } else {
            echo "SQL Error: " . $conectar->error;
            echo  "<div class=´errors_box´><p class='errors'>" . "Error de conexion, no hemos podido borrar tus ofertas" . "</p></div>";
        }
    }
}



/*if (isset($_POST['submit'])) {
    $contrasena_sede_empresa = $_POST["contrasena_sede_empresa"];
    $nombre_empresa_sede = $_POST["nombre_empresa_sede"];

    //Con los formularios de seguridad obtenemos la ID de la empresa para comparar

    $queryDelete = "DELETE FROM Sedes WHERE IDEmpresa = '$idDinamicaEmpresaPrincipal' ORDER BY IDSede LIMIT 1";
}*/
