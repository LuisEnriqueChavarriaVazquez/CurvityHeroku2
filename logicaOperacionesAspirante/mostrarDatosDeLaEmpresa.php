<?php

//include '../includes/db.php';



$queryIdEmpresa = "SELECT * FROM Puesto WHERE IDEmpresa = '$IDEmpresa'";
$result = mysqli_query($conn, $queryIdEmpresa);
$idDinamica;
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        if (is_null($row["IDEmpresa"])) {
            echo '[NULL]';
        } else {
            $idDinamica = $row['IDEmpresa'];
            print "<form method='GET' action='vistaEnvioSolicitud.php'>
            <a name='submit' 
              href='./vistaEnvioSolicitud.php?Nombre=".$row['Nombre'].
              "&PagoOfertado=".$row['PagoOfertado'].
              "&ModalidadPago=".$row['ModalidadPago'].
              "&ResumenRequisitos=".$row['ResumenRequisitos'].
              "&ResumenPrestaciones=".$row['ResumenPrestaciones'].
              "&IDPuesto=".$row['IDPuesto'].
              "'>";
            include 'AlmacenIncludesPHP/elementosPhp/cardGestion/cardSuperior.php';
            print $row['Nombre'];
            include 'AlmacenIncludesPHP/elementosPhp/cardGestion/cardInferior.php';
            print "</a></form>";
        }
    }
} else {
    return "No rows";
}
