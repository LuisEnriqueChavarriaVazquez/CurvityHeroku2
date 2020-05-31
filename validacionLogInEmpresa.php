<?php
require('claseDB.php');
if (isset($_POST['username_emp'])) {
     $correoEntrada=$_POST["username_emp"];
     $contraEntrada=$_POST["password_emp"];
     $objetoConexion=new objetoConexionBaseDatos();
     if($objetoConexion-> comprobarConexion()==TRUE){
         if($objetoConexion->comprobarExistenciaElementoAtibuto("Empresa","DireccionWeb",$correoEntrada)==TRUE){
            if($objetoConexion->comprobarExistenciaElementoAtibuto("Empresa","Contra",$contraEntrada)==TRUE){
               session_start();
               $_SESSION["nombreUsuario"]=$objetoConexion->retornarElementoInteres("Empresa","DireccionWeb",$correoEntrada,"Nombre");
               header("Location:operacionesEmpresa.php");
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