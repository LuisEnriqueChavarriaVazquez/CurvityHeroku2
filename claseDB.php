<?php
class objetoConexionBaseDatos {
    public $nombreServer="localhost";
    public $nombreUsuario="u253306330_curvity";
    public $passwordDB="curvity";
    public $nombreDB="u253306330_curvity";
    public $conector=null;
     
    /*public function __construct(){
         try{
            $this->conector = new mysqli($this->nombreServer,$this->nombreUsuario,$this->passwordDB,$this->nombreDB);
            return true;
         }catch(Exception $e){
            return false;
         }
    }*/

    public function comprobarConexion(){
      $this->conector = new mysqli($this->nombreServer,$this->nombreUsuario,$this->passwordDB,$this->nombreDB);
        $conexionResutado=false;
        if($this->conector->connect_error) {
         $conexionResutado=false;
       }else{
         $conexionResutado=true;
       }
     return $conexionResutado;
    }
   
   public function validarTextoNormal ($StringEntrada){
      if(empty($StringEntrada) || trim($StringEntrada)== ""){
         return False;
      }else{
         return True;
      }
   }

  public function validarMail ($StringEntrada){
    if(empty($StringEntrada) || trim($StringEntrada)== ""){
       return False;
    }elseif(!filter_var($StringEntrada, FILTER_VALIDATE_EMAIL)){
       return False;
    }else{
       return True;
    }
   }


   public function validarNumeroEntero ($StringEntrada){
      if(empty($StringEntrada) || trim($StringEntrada)== ""){
         return False;
      }elseif(!preg_match("/^[0-9]+$/",$StringEntrada)){
         return False;
      }else{
         return True;
      }
   }

  public  function validarNumeroFlotante ($StringEntrada){
    if(empty($StringEntrada) || trim($StringEntrada)== ""){
       return False;
    }elseif(!preg_match("/^[0-9]+(.([0-9]+))?$/",$StringEntrada)){
       return False;
    }else{
       return True;
    }
 }

 public function validarImagen($ImagenEntrada){
    $allowed_extensions = array("jpg","jpeg","png");
    $listaValores=explode('.',$ImagenEntrada);
    if( in_array($listaValores[count($listaValores)-1],$allowed_extensions)){
       return True;
    }else{
       return False;
    }
   }

   public function elementoRepetido($NombreTabla,$NombreAtributo,$NombreElemento){
      $sqlSentence="select * from ".$NombreTabla." where ".$NombreAtributo."=".$NombreElemento;
      $result = $this->conector->query($sqlSentence);
      if ($result->num_rows > 0) {
         return true;
      }else{
         return false;
      }
   }
   
   public function comprobarExistenciaElementoAtibuto($NombreTabla,$NombreAtributo,$NombreElemento){
      $sqlSentence="select * from ".$NombreTabla." where ".$NombreAtributo."='".$NombreElemento."'";
      $result = $this->conector->query($sqlSentence);
      if ($result->num_rows > 0) {
         return true;
      }else{
         return false;
      }
   }

   public function retornarElementoInteres($NombreTabla,$NombreAtributoBusqueda,$NombreElemento,$NombreAtributoRetorno){
      $sqlSentence="select * from ".$NombreTabla." where ".$NombreAtributoBusqueda."='".$NombreElemento."'";
      $result = $this->conector->query($sqlSentence);
      if ($result->num_rows > 0) {
         while($row = $result->fetch_assoc()) {
            return $row[$NombreAtributoRetorno];
          }
      }else{
         return false;
      }
   }
    
}
?>