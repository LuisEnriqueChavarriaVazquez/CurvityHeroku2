<?php
require('claseDB.php');
if (isset($_POST['entradaReclutador'])) {
     $correoEntrada=$_POST["entradaReclutador"];
     $contraEntrada=$_POST["passwordReclutador"];
     $objetoConexion=new objetoConexionBaseDatos();
     if($objetoConexion-> comprobarConexion()==TRUE){
         if($objetoConexion->comprobarExistenciaElementoAtibuto("Sede","CorreoElecReclutador",$correoEntrada)==TRUE){
            if($objetoConexion->comprobarExistenciaElementoAtibuto("Sede","ContraReclutador",$contraEntrada)==TRUE){
               session_start();
               $_SESSION["nombreUsuario"]=$objetoConexion->retornarElementoInteres("Sede","CorreoElecReclutador",$correoEntrada,"NombreReclutador");
               header("Location:operacionesReclutador.php");
               exit;
              
            }else{
               echo  "<div class=´errors_box´><p class='errors'>" . "Contraseña no coincide ". "</p></div>";
            }
         }else{
          echo  "<div class=´errors_box´><p class='errors'>" . "Correo no  coincide" . "</p></div>";
         }
     }else{
          echo  "<div class=´errors_box´><p class='errors'>" . "Error de conexion" . "</p></div>";
          
     }


}
 
?>