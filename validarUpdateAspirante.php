<?php

    require('claseAspirante.php');
    include_once 'includes/user.php';
    include_once 'includes/user_session.php';
    $userSession = new UserSession();
    $usuario = new User();
    $usuario->setUser($userSession->getCurrentUser());
    $dato=$usuario->getCorreo();
    $nombreAs=$_POST["nombre_aspirante"];
    $apelPatAs=$_POST["apellido_paterno"];
    $apelMatAs=$_POST["apellido_materno"];
    $mailAs=$_POST["mail"];
    $passwordAs=$_POST["password"];
    $fechaNacAs=$_POST["fecha_nac"];
    $escuelaAs=$_POST["alama_mater"];
    $nivelAcAs=$_POST["nivel_acad"];
    $direccionAs=$_POST["direccion_aspirante"];
    $facebookAs=$_POST["facebook"];
    $skypeAs=$_POST["skype"];
    $twitterAs=$_POST["twitter"];
    $habiliAsp=$_POST["habilidades_aspirante"];
    $expAsp=$_POST["experiencia_laboral"];
    $cantidadIdiomasAsp=$_POST["cantidad_de_idiomas"];
    $idiomasEspAsp=$_POST["idiomas_domina"];
    $sueldoAsp=$_POST["sueldo_ideal"];
    //$nombreImagenPerfilAsp=$_FILES["archivo_aspirante"]["name"];
    $contadorEleConfimados=0;
    
    function validacionNormal ($StringEntrada){
    if(empty($StringEntrada) || trim($StringEntrada)== ""){
        return False;
    }else{
        return True;
    }
    }

    function validacionMail ($StringEntrada){
    if(empty($StringEntrada) || trim($StringEntrada)== ""){
        return False;
    }elseif(!filter_var($StringEntrada, FILTER_VALIDATE_EMAIL)){
        return False;
    }else{
        return True;
    }
    }

    function validacionTel ($StringEntrada){
    if(empty($StringEntrada) || trim($StringEntrada)== ""){
        return False;
    }elseif(!preg_match("/^[0-9]+$/",$StringEntrada)){
        return False;
    }else{
        return True;
    }
    }


    if(!validacionNormal($nombreAs)){
        $Nombre_error="Nombre invalido";
    }else{
        $contadorEleConfimados++;//1
    }

    if(!validacionNormal($apelPatAs)){
        $apPaterno_error="Apellido Paterno invalido";  
    }else{
    $contadorEleConfimados++;//2
    }

    if(!validacionNormal($apelMatAs)){
        $apMaterno_error="Apellido Materno invalido";
    }else{
    $contadorEleConfimados++;//3
    }

    if(!validacionNormal($mailAs)){
    $mail_error="Correo invalido";
    }else{
    $contadorEleConfimados++;//4
    }

    if(!validacionNormal($passwordAs)){
    $password_error="Password invalida";
    }else{
    $contadorEleConfimados++;//5
    }

    if(!validacionNormal($fechaNacAs)){
    $fecha_error="Fecha nacimiento invalida";
    }else{
    $contadorEleConfimados++;//6
    }


    if(!validacionNormal($escuelaAs)){
    $escuela_error="Escuela invalida";
    }else{
    $contadorEleConfimados++;//7
    }

    if(!validacionNormal($nivelAcAs)){
    $nivelAcad_error="Nivel Acad&eacute;mico invalido";
    }else{
    $contadorEleConfimados++;//8
    }

    if(!validacionNormal($direccionAs)){
    $direccion_error="Diecci&oacute;n invalida ";
    }else{
    $contadorEleConfimados++;//9
    }

    /*if(!validacionTel($telAs)){
    $tel_error="Tel&eacute;fono invalido";
    }else{
    $contadorEleConfimados++;
    }*/
    function validacionImagen($ImagenEntrada){
        $allowed_extensions = array("jpg","jpeg","png");
        $listaValores=explode('.',$ImagenEntrada);
        if( in_array($listaValores[count($listaValores)-1],$allowed_extensions)){
           return True;
        }else{
           return False;
        }
       }
     
        function validacionNumeroEntero ($StringEntrada){
           if(trim($StringEntrada)== ""){
              return False;
           }elseif(!preg_match("/^[0-9]+$/",$StringEntrada)){
              return False;
           }else{
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
     
        /*if(!validacionImagen(//$nombreImagenPerfilAsp)){
           $dirArchivo_error="Seleccione una imagen";
        }else{
          $contadorEleConfimados++;
       }*/
     
     
       if(!validacionNormal($habiliAsp)){
        $habilidades_error="Llene el apartado de habilidades";
        }else{
        $contadorEleConfimados++;//10
        }
     
        if(!validacionNormal($expAsp)){
           $experiencia_error="Llene el apartado de experiencia";
           }else{
           $contadorEleConfimados++;//11
           }
     
          if(!validacionNumeroEntero($cantidadIdiomasAsp)){
           $cantidadIdiomas_error="Escriba un numero valido";
          }else{
           $contadorEleConfimados++;//12
          }
     
          if(!validacionNormal($idiomasEspAsp)){
           $idiomasEsp_error="Llene el apartado";
           }else{
           $contadorEleConfimados++;//13
           }
     
            if(!validacionSueldo($sueldoAsp)){
               $sueldo_error="De un sueldo real";
            }else{
              $contadorEleConfimados++;//14
            }   

    if($contadorEleConfimados==14){
        $_SESSION["nombreAs"]=$nombreAs;
        $_SESSION["apPatAs"]=$apelPatAs;
        $_SESSION["apMatAs"]=$apelMatAs;
        $_SESSION["mailAs"]=$mailAs;
        $_SESSION["passwordAs"]=$passwordAs;
        $_SESSION["fechaNacAs"]=$fechaNacAs;
        $_SESSION["escuelaAs"]=$escuelaAs;
        if($nivelAcAs=="1"){
            $_SESSION["nivelAcAs"]="UNIVERSIDAD";
        }elseif($nivelAcAs=="2"){
            $_SESSION["nivelAcAs"]="CARRERA T&Eacute;CNICA";
        }elseif($nivelAcAs=="3"){
            $_SESSION["nivelAcAs"]="PREPARATORIA";
        }elseif($nivelAcAs=="4"){
            $_SESSION["nivelAcAs"]="SECUNDARIA";
        }
        
        $_SESSION["direccionAs"]=$direccionAs;
        //$_SESSION["telAs"]=$telAs;
        
        if(validacionNormal( $facebookAs)){
            $_SESSION["facebookAs"]=$facebookAs;
        }
        if(validacionNormal($skypeAs)){
            $_SESSION["skypeAs"]=$skypeAs;
        }
        if(validacionNormal($twitterAs)){
            $_SESSION["twitterAs"]=$twitterAs;
        }

        $servername = "localhost";
        $username = "u253306330_curvity";
        $password = "curvity";
        $dbname = "u253306330_curvity";

        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
           die("Connection failed: " . $conn->connect_error);
           include("errorPagina.php");
        }else{

            $aspiranteObje=new Aspirante($_SESSION["nombreAs"],$_SESSION["passwordAs"],
            $_SESSION["apPatAs"],$_SESSION["apMatAs"],$_SESSION["fechaNacAs"],
            $expAsp,$sueldoAsp,$_SESSION["direccionAs"],$_SESSION["nivelAcAs"],$_SESSION["escuelaAs"],
            $habiliAsp,$_SESSION["mailAs"],/*$_SESSION["telAs"]*/ $cantidadIdiomasAsp,$idiomasEspAsp);
            //$fileFoto=addslashes(file_get_contents($_FILES["archivo_aspirante"]["tmp_name"]));
            //$fileFoto=addslashes(file_get_contents($_FILES["archivo_aspirante"]["tmp_name"]));
            
            $nombre=$aspiranteObje->get_nombre();
            $app=$aspiranteObje->get_apellidoPaterno();
            $apm=$aspiranteObje->get_apellidomaterno();
            $pw=$aspiranteObje->get_password();
            $fec=$aspiranteObje->get_fechaNacimiento();
            $exp=$aspiranteObje->get_resumenExperienciasLaborales();
            $salario=$aspiranteObje->get_sueldoDeseado();
            $dir=$aspiranteObje->get_direccion();
            $nivel=$aspiranteObje->get_nivelAcademico();
            $esc=$aspiranteObje->get_escuela();
            $hab=$aspiranteObje->get_resumenHabilidades();
            $email=$aspiranteObje->get_correoElectronico();
            $tel=$aspiranteObje->get_telefono();
            $num_id=$aspiranteObje->get_numeroIdiomas();
            $detalles=$aspiranteObje->get_detallesIdiomas();
            $sql = "UPDATE Aspirante SET 
            Nombre ='$nombre',
            Contra='$pw',
            ApellidoPat = '$app',
            ApellidoMat='$apm',
            SueldoDeseado='$salario',
            Direccion='$dir',
            Escuela='$esc',
            NivelAcademico='$nivel',
            CorreoElec='$email',
            ResumenExpPrevLab='$exp',
            ResumenHab='$hab',
            numeroIdiomas='$num_id',
            detallesIdiomas='$detalles',
            FacebookAspirante='$facebookAs',
            SkypeAspirante='$skypeAs',
            TwitterAspirante='$twitterAs'
            WHERE CorreoElec = '$dato'";

            $result=mysqli_query($conn,$sql);
    
            if ($conn->query($sql) === TRUE) {
               include("index_asp.php");
            } else {
              include("errorPagina.php");
            }
         }
   
      }else{
         include("index_asp.php");
      }
    


?>