<?php
  require('claseEmpresa.php');
  if(!isset($_SESSION)){
    session_start();
   }

   $fotoLogoEmpresa=$_FILES["fotoLogoEmp"]["name"];
   $descripEmpresa=$_POST["descripcion_empresa"];
   $telEmpresa=$_POST["telefono_empresa"];
   $objetoDB= new objetoConexionBaseDatos();
   $contadorEleConfimados=0;

   if($objetoDB->comprobarConexion()){
      if($objetoDB->validarTextoNormal($descripEmpresa)){
      $contadorEleConfimados++;
      }else{
        $descripcionEmpresa_error="Llene el apartado";
      }
     if($objetoDB->validarImagen($fotoLogoEmpresa)){
        $contadorEleConfimados++;
        }else{
          $dirArchivoEmpresa_error="Seleccione una imagen";
        }
    if($objetoDB->validarNumeroEntero($telEmpresa)){
      $contadorEleConfimados++;
    }else{
       $telEmpresa_error="De un numero valido";
     }
     if($contadorEleConfimados==3){
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
       if($objetoEmpresa->ingresarNuevaEmpresa($_FILES["fotoLogoEmp"]["tmp_name"])){
          include("finalizarProcesoSignUp.php");
        }else{
          include("errorPagina.php");
        }
  
        
      }else{
       include("signUpEmpresa2.php");
     }
   }else{
     /*Error conexion */
   }
  
  ?>