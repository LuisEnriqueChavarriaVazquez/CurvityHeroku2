<?php
  require('claseAspirante.php');
   if(!isset($_SESSION)){
      session_start();
   }
  
   $habiliAsp=$_POST["habilidades_aspirante"];
   $expAsp=$_POST["experiencia_laboral"];
   $cantidadIdiomasAsp=$_POST["cantidad_de_idiomas"];
   $idiomasEspAsp=$_POST["idiomas_domina"];
   $sueldoAsp=$_POST["sueldo_ideal"];
   $nombreImagenPerfilAsp=$_FILES["archivo_aspirante"]["name"];
   $contadorEleConfimados=0;
   

  function validacionImagen($ImagenEntrada){
   $allowed_extensions = array("jpg","jpeg","png");
   $listaValores=explode('.',$ImagenEntrada);
   if( in_array($listaValores[count($listaValores)-1],$allowed_extensions)){
      return True;
   }else{
      return False;
   }
  }

   function validacionNormal ($StringEntrada){
      if(empty($StringEntrada) || $StringEntrada==''){
         return False;
      }else{
         return True;
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

   if(!validacionImagen($nombreImagenPerfilAsp)){
      $dirArchivo_error="Seleccione una imagen";
   }else{
     $contadorEleConfimados++;
  }


  if(!validacionNormal($habiliAsp)){
   $habilidades_error="Llene el apartado de habilidades";
   }else{
   $contadorEleConfimados++;
   }

   if(!validacionNormal($expAsp)){
      $experiencia_error="Llene el apartado de experiencia";
      }else{
      $contadorEleConfimados++;
      }

     if(!validacionNumeroEntero($cantidadIdiomasAsp)){
      $cantidadIdiomas_error="Escriba un numero valido";
     }else{
      $contadorEleConfimados++;
     }

     if(!validacionNormal($idiomasEspAsp)){
      $idiomasEsp_error="Llene el apartado";
      }else{
      $contadorEleConfimados++;
      }

       if(!validacionSueldo($sueldoAsp)){
          $sueldo_error="De un sueldo real";
       }else{
         $contadorEleConfimados++;
       }   

      
   if($contadorEleConfimados==6){
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
         $habiliAsp,$_SESSION["mailAs"],$_SESSION["telAs"],$cantidadIdiomasAsp,$idiomasEspAsp);
         $fileFoto=addslashes(file_get_contents($_FILES["archivo_aspirante"]["tmp_name"]));

         $sqlCeldas= "insert into Aspirante (IDAspirante,Nombre,Contra,ApellidoPat,ApellidoMat,
         SueldoDeseado,Direccion,Escuela,NivelAcademico,CorreoElec,ResumenExpPrevLab,ResumenHab,
         numeroIdiomas,detallesIdiomas,FotoPerfil";
         

         $sqlValores=" values('".$aspiranteObje->generarIdentificador()."','".$aspiranteObje->get_nombre()."'
         ,'".$aspiranteObje->get_password()."','".$aspiranteObje->get_apellidoPaterno()."',
         '".$aspiranteObje->get_apellidoMaterno()."','".$aspiranteObje->get_sueldoDeseado()."',
         '".$aspiranteObje->get_direccion()."','".$aspiranteObje->get_escuela()."',
         '".$aspiranteObje->get_nivelAcademico()."','".$aspiranteObje->get_correoElectronico()."',
         '".$aspiranteObje->get_resumenExperienciasLaborales()."','".$aspiranteObje->get_resumenHabilidades()."',
         ".$aspiranteObje->get_numeroIdiomas().",'".$aspiranteObje->get_detallesIdiomas()."','$fileFoto'";
         if(isset($_SESSION["facebookAs"])){
            $sqlCeldas=$sqlCeldas.",FacebookAspirante";
            $sqlValores=$sqlValores.",'".$_SESSION["facebookAs"]."'";
            $aspiranteObje->set_NombreFacebook($_SESSION["facebookAs"]);
         }

         if(isset($_SESSION["skypeAs"])){
            $sqlCeldas=$sqlCeldas.",SkypeAspirante";
            $sqlValores=$sqlValores.",'".$_SESSION["skypeAs"]."'";
            $aspiranteObje->set_NombreSkype($_SESSION["skypeAs"]);
         }

         if(isset($_SESSION["twitterAs"])){
            $sqlCeldas=$sqlCeldas.",TwitterAspirante";
            $sqlValores=$sqlValores.",'".$_SESSION["twitterAs"]."'";
            $aspiranteObje->set_NombreTwitter($_SESSION["twitterAs"]);
         }
         $sqlCeldas=$sqlCeldas.")";
         $sqlValores=$sqlValores.")";
         $sql=$sqlCeldas.$sqlValores;
   
         if ($conn->query($sql) === TRUE) {
            include("finalizarProcesoSignUp.php");
         } else {
           include("errorPagina.php");
         }
      }

   }else{
      include("signUpAspirante2.php");
   }

?>