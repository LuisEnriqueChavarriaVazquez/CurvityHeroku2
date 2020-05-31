<?php
  if(!isset($_SESSION)){
   session_start();
}

   $nombreAs=$_POST["nombre_aspirante"];
   $apelPatAs=$_POST["apellido_paterno"];
   $apelMatAs=$_POST["apellido_materno"];
   $mailAs=$_POST["mail"];
   $passwordAs=$_POST["password"];
   $fechaNacAs=$_POST["fecha_nac"];
   $escuelaAs=$_POST["alama_mater"];
   $nivelAcAs=$_POST["nivel_acad"];
   $direccionAs=$_POST["direccion_aspirante"];
   $telAs=$_POST["tel_aspirante"];
   $facebookAs=$_POST["facebook"];
   $skypeAs=$_POST["skype"];
   $twitterAs=$_POST["twitter"];
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
      $contadorEleConfimados++;
   }

   if(!validacionNormal($apelPatAs)){
      $apPaterno_error="Apellido Paterno invalido";  
  }else{
   $contadorEleConfimados++;
  }

  if(!validacionNormal($apelMatAs)){
      $apMaterno_error="Apellido Materno invalido";
  }else{
   $contadorEleConfimados++;
  }

  if(!validacionNormal($mailAs)){
   $mail_error="Correo invalido";
}else{
   $contadorEleConfimados++;
}

if(!validacionNormal($passwordAs)){
   $password_error="Password invalida";
}else{
   $contadorEleConfimados++;
}

if(!validacionNormal($fechaNacAs)){
   $fecha_error="Fecha nacimiento invalida";
}else{
   $contadorEleConfimados++;
}


if(!validacionNormal($escuelaAs)){
   $escuela_error="Escuela invalida";
}else{
   $contadorEleConfimados++;
}

if(!validacionNormal($nivelAcAs)){
   $nivelAcad_error="Nivel Acad&eacute;mico invalido";
}else{
   $contadorEleConfimados++;
}

if(!validacionNormal($direccionAs)){
   $direccion_error="Diecci&oacute;n invalida ";
}else{
   $contadorEleConfimados++;
}

if(!validacionTel($telAs)){
   $tel_error="Tel&eacute;fono invalido";
}else{
   $contadorEleConfimados++;
}

   if($contadorEleConfimados==10){
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
      $_SESSION["telAs"]=$telAs;
      
      if(validacionNormal( $facebookAs)){
        $_SESSION["facebookAs"]=$facebookAs;
      }
      if(validacionNormal($skypeAs)){
         $_SESSION["skypeAs"]=$skypeAs;
      }
      if(validacionNormal($twitterAs)){
          $_SESSION["twitterAs"]=$twitterAs;
      }
      include("signUpAspirante2.php");
   }else{
      include("signUpAspirante.php");
   }
   


?>