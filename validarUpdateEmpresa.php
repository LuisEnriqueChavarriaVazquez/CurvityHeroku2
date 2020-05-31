<?php
 require('claseEmpresa.php');

   $nombreEmpresa=$_POST["nombre_empresa"];
   $razonSocialEmpresa=$_POST["razon_Social"];
   $emailEmpresa=$_POST["email_empresa"];
   $passwordEmpresa=$_POST["password_empresa"];
   $direccionEmpresa=$_POST["direccion_empresa"];
   $tipoEmpresa=$_POST["tipo_empresa"];
    $arrayOpccionesTipoEmpresa=array("Empresario individual (autónomo)","Emprendedor de Responsabilidad Limitada"
  ,"Comunidad de bienes","Comunidad de bienes","Sociedad Civil","Sociedad Colectiva", 
  "Sociedad Comanditaria Simple","Sociedad de Responsabilidad Limitada","Sociedad limitada de formación sucesiva",
  "Sociedad limitada Nueva empresa","Sociedad Anónima","Sociedad Comanditaria por acciones",
  "Sociedad de responsabilidad limitada laboral","Sociedad anónima laboral","Sociedad cooperativa",
  "Sociedad cooperativa de trabajo asociado","Sociedades profesionales","Sociedad agraria de transformación",
  "Sociedad de garantía recíproca","Entidades de capital riesgo","Agrupación de interés económico"
    );
   // $fotoLogoEmpresa=$_FILES["fotoLogoEmp"]["name"];
    //$descripEmpresa=$_POST["descripcion_empresa"];
    $telEmpresa=$_POST["telefono_empresa"];
    $objetoDB= new objetoConexionBaseDatos();
    $contadorEleConfimados=0;

  if($objetoDB->comprobarConexion()){
    if($objetoDB->validarTextoNormal($nombreEmpresa)){
      $contadorEleConfimados++;
    }else{
      $NombreEmpresa_error="Escriba un nombre valido de empresa";
    }

    if($objetoDB->validarTextoNormal($razonSocialEmpresa)){
      $contadorEleConfimados++;
    }else{
      $razonSocialEmpresa_error="Escriba un texto valido";
    }

    if($objetoDB->validarMail($emailEmpresa)){
      $contadorEleConfimados++;
    }else{
      $emailEmpresa_error="Escriba un correo valido";
    }

    if($objetoDB->validarTextoNormal($passwordEmpresa)){
      $contadorEleConfimados++;
    }else{
      $passwordEmpresa_error="Escriba una password valida";
    }

    if($objetoDB->validarTextoNormal($passwordEmpresa)){
      $contadorEleConfimados++;
    }else{
      $passwordEmpresa_error="Escriba una password valida";
    }
    if($objetoDB->validarTextoNormal($direccionEmpresa)){
      $contadorEleConfimados++;
    }else{
      $direccionEmpresa_error="Escriba una direccion valida";
    }
    if($objetoDB->validarTextoNormal($direccionEmpresa)){
      $contadorEleConfimados++;
    }else{
      $direccionEmpresa_error="Escriba una direccion valida";
    }
    if(intval($tipoEmpresa)>0 && intval($tipoEmpresa)<21){
      $contadorEleConfimados++;
    }else{
      $tipoEmpresa_error="Seleccione una opcion";
    }
    if($objetoDB->comprobarConexion()){
       /* if($objetoDB->validarTextoNormal($descripEmpresa)){
        $contadorEleConfimados++;
        }else{
          $descripcionEmpresa_error="Llene el apartado";
        }*/
       /*if($objetoDB->validarImagen($fotoLogoEmpresa)){
          $contadorEleConfimados++;
          }else{
            $dirArchivoEmpresa_error="Seleccione una imagen";
          }*/
      if($objetoDB->validarNumeroEntero($telEmpresa)){
        $contadorEleConfimados++;
      }else{
         $telEmpresa_error="De un numero valido";
       }
     }else{
       /*Error conexion */
     }
    
      if($contadorEleConfimados==9){
        $_SESSION["nombreEm"]=$nombreEmpresa;
        $_SESSION["razonSocialEm"]=$razonSocialEmpresa;
        $_SESSION["emailEm"]=$emailEmpresa;
        $_SESSION["passwordEm"]=$passwordEmpresa;
        $_SESSION["direccionEm"]=$direccionEmpresa;
        $_SESSION["tipoEm"]=$arrayOpccionesTipoEmpresa[intval($tipoEmpresa)];
        $objetoEmpresa= new Empresa($_SESSION["nombreEm"], $_SESSION["passwordEm"],$_SESSION["razonSocialEm"],$_SESSION["direccionEm"], $_SESSION["tipoEm"],$telEmpresa,$_SESSION["emailEm"]);
          if($objetoDB->validarTextoNormal($_POST["facebook_empresa"])){
          $objetoEmpresa->setFacebookEmpresa($_POST["facebook_empresa"]);
          }
          if($objetoDB->validarTextoNormal($_POST["skype_empresa"])){
            $objetoEmpresa->setSkypeEmpresa($_POST["skype_empresa"]);
          }
          if($objetoDB->validarTextoNormal($_POST["twitter_empresa"])){
            $objetoEmpresa->setTwitterEmpresa($_POST["twitter_empresa"]);
          }
         if($objetoEmpresa->actualizarEmpresa()){
           include("index_emp.php");
          }else{
           include("errorPagina.php");
          }
  }else{
     include("index_emp.php");
  }
} 
 
?>