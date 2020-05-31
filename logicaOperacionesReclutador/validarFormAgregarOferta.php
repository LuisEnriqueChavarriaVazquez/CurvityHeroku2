
<?php

//No se cargan aun los datos de las sedes
//$conexion = new mysqli("localhost", "u253306330_curvity", "curvity", "u253306330_curvity"); 

$servername = "localhost";
$username = "u253306330_curvity";
$password = "curvity";
$dbname = "u253306330_curvity";

if (isset($_POST['submit'])) {
    $nombre_puesto = $_POST["nombre_puesto"];
    $pago_puesto = $_POST["pago_puesto"];
    $modalidad_puesto = $_POST["modalidad_puesto"];
    $requerimientos_puesto = $_POST["requerimientos_puesto"];
    $prestaciones_puesto = $_POST["prestaciones_puesto"];
    $email_empresa_puesto = $_POST["email_empresa_puesto"];
    $email_reclutador_puesto = $_POST["email_reclutador_puesto"];
    $contadorEleConfimados = 0;
    $errores_oferta = array();

    function validacionNormal($StringEntrada)
    {
        if (empty($StringEntrada) || trim($StringEntrada) == "") {
            return False;
        } else {
            return True;
        }
    }

    function validacionMail($StringEntrada)
    {
        if (empty($StringEntrada) || trim($StringEntrada) == "") {
            return False;
        } elseif (!filter_var($StringEntrada, FILTER_VALIDATE_EMAIL)) {
            return False;
        } else {
            return True;
        }
    }
  
  
     function validacionSueldo ($StringEntrada){
        if(empty($StringEntrada) || trim($StringEntrada)== ""){
           return False;
        }elseif(!preg_match("/^[0-9]+(.([0-9]+))?$/",$StringEntrada)){
           return False;
        }else{
           return True;
        }
     }

    if (!validacionNormal($nombre_puesto)) {
        array_push($errores_oferta,"Nombre de puesto inválido");
    } else {
        $contadorEleConfimados++;
    }

    if (!validacionMail($email_reclutador_puesto)) {
        array_push($errores_oferta, "Email de reclutador inválido.");
    } else {
        $contadorEleConfimados++;
    }

    if (!validacionSueldo($pago_puesto)) {
        array_push($errores_oferta,"Número de pago inválido");
    } else {
        $contadorEleConfimados++;
    }

    if (!validacionNormal($modalidad_puesto)) {
        array_push($errores_oferta,"Modalidad de puesto invalida");
    } else {
        $contadorEleConfimados++;
    }

    if (!validacionNormal($requerimientos_puesto)) {
        array_push($errores_oferta,"Requerimiento de puesto inválido");
    } else {
        $contadorEleConfimados++;
    }

    if (!validacionNormal($prestaciones_puesto)) {
        array_push($errores_oferta,"Prestaciones del puesto invalidas");
    } else {
        $contadorEleConfimados++;
    }


    if ($contadorEleConfimados == 6) {
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }
        
        $queryIdEmpresa = "SELECT IDEmpresa FROM Empresa WHERE DireccionWeb = '$email_empresa_puesto'";
        $result = mysqli_query($conn,$queryIdEmpresa);
        $idDinamica;
        while ($row = $result->fetch_assoc()) {
            $idDinamica = $row['IDEmpresa'];
            echo $row['IDEmpresa'];
        }

        $queryIdSede = "SELECT IDSede FROM Sede WHERE CorreoElecReclutador = '$email_reclutador_puesto'";
        $resultIdSede = mysqli_query($conn,$queryIdSede);
        $idDinamicaSede;
        while ($rowSede = $resultIdSede->fetch_assoc()) {
            $idDinamicaSede = $rowSede['IDSede'];
            echo $rowSede['IDSede'];
        }


        $query = "INSERT INTO Puesto(IDSede,IDEmpresa, Nombre, PagoOfertado, ModalidadPago, ResumenRequisitos, ResumenPrestaciones) VALUES ('$idDinamicaSede','$idDinamica','$nombre_puesto', '$pago_puesto ', '$modalidad_puesto','$requerimientos_puesto ','$prestaciones_puesto ')";
        if ($conn->query($query) === true) {
            echo  "<div class=´errors_box´><p class='success'>" . "Oferta creada" . "</p></div>";
            echo "SQL Error: " . $conn->error;
        } else {
            echo  "<div class=´errors_box´><p class='errors'>" . "Error de conexión!!!" . "</p></div>";
        }
    } else {
        foreach ($errores_oferta as $val) {
            echo  "<div class=´errors_box´><p class='errors'>" . $val . "</p></div>";
        }
    }

}

?>