<?php


//include '../includes/db.php';

//No se cargan aun los datos de las sedes
//Se establece la conexión a la base de datos.
$servername = "localhost";
$username = "u253306330_curvity";
$password = "curvity";
$dbname = "u253306330_curvity";

if (isset($_POST['submit'])) {
    $nombre_sede = $_POST["nombre_sede"];
    $contrasena_sede_empresa = $_POST["contrasena_sede_empresa"];
    $email_empresa_sede = $_POST["email_empresa_sede"];
    $direccion_sede = $_POST["direccion_sede"];
    $tel_sede = $_POST["tel_sede"];
    $nombre_reclutador = $_POST["nombre_reclutador"];
    $email_reclutador = $_POST["email_reclutador"];
    $password_reclutador = $_POST["password_reclutador"];
    $facebook_sede = $_POST["facebook_sede"];
    $skype_sede = $_POST["skype_sede"];
    $twitter_sede = $_POST["twitter_sede"];
    $contadorEleConfimados = 0;
    $errores = array();

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

    function validacionTel($StringEntrada)
    {
        if (empty($StringEntrada) || trim($StringEntrada) == "") {
            return False;
        } elseif (!preg_match("/^[0-9]+$/", $StringEntrada)) {
            return False;
        } else {
            return True;
        }
    }

    if (!validacionNormal($nombre_sede)) {
        array_push($errores, "Nombre de sede inválido");
    } else {
        $contadorEleConfimados++;
    }

    if (!validacionNormal($contrasena_sede_empresa)) {
        array_push($errores, "Password de empresa inválido");
    } else {
        $contadorEleConfimados++;
    }

    if (!validacionNormal($direccion_sede)) {
        array_push($errores, "Direccion inválida");
    } else {
        $contadorEleConfimados++;
    }

    if (!validacionTel($tel_sede)) {
        array_push($errores, "Tel 1 inválido");
    } else {
        $contadorEleConfimados++;
    }

    if (!validacionNormal($nombre_reclutador)) {
        array_push($errores, "Nombre inválido");
    } else {
        $contadorEleConfimados++;
    }

    if (!validacionMail($email_reclutador)) {
        array_push($errores, "Email inválido");
    } else {
        $contadorEleConfimados++;
    }

    if (!validacionNormal($email_empresa_sede)) {
        array_push($errores, "Email inválido");
    } else {
        $contadorEleConfimados++;
    }


    if (!validacionNormal($password_reclutador)) {
        array_push($errores, "Password inválido");
    } else {
        $contadorEleConfimados++;
    }

    
    //$consulta_pre_has = "SELECT MAX(Prod_Pres) as pre_has FROM productos";  
    
    
    if ($contadorEleConfimados == 8) {
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }
        
        $queryIdEmpresa = "SELECT IDEmpresa FROM Empresa WHERE Contra = '$contrasena_sede_empresa' AND DireccionWeb = '$email_empresa_sede'";
        $result = mysqli_query($conn,$queryIdEmpresa);
        $idDinamica;
        while ($row = $result->fetch_assoc()) {
            $idDinamica = $row['IDEmpresa'];
        }

        $query = "INSERT INTO Sede(IDEmpresa, Nombre, Telefono, Direccion, NombreReclutador, CorreoElecReclutador,ContraReclutador,FacebookSede,SkypeSede,TwitterSede) VALUES ('$idDinamica','$nombre_sede', '$tel_sede', '$direccion_sede','$nombre_reclutador','$email_reclutador','$password_reclutador', '$facebook_sede','$skype_sede','$twitter_sede')";

        if ($conn->query($query) === true) {
            echo  "<div class=´errors_box´><p class='success'>" . "Sede creada" . "</p></div>";
        } else {
            echo  "<div class=´errors_box´><p class='errors'>" . "Error de conexion, nombre empresa no coincide" . "</p></div>";
        }
    } else {
        foreach ($errores as $val) {
            echo  "<div class=´errors_box´><p class='errors'>" . $val . "</p></div>";
        }
    }
}

?>