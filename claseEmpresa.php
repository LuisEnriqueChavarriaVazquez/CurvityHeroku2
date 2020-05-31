<?php
   require("claseDB.php");

   class Empresa {
       public $nombre;
       public $password;
       public $razonSocial;
       public $direccion;
       public $tipo;
       public $telefono;
       public $direccionWeb;
       public $facebookEmpresa;
       public $skypeEmpresa;
       public $twitterEmpresa;
       public $objetoDB;

       public function __construct($nombreEntrada,$passwordEntrada,$razonSocialEntrada,$direccionEntrada,$tipoEntrada,$telefonoEntrada,$direccionWebEntrada){
            $this->nombre=$nombreEntrada;
            $this->password=$passwordEntrada;
            $this->razonSocial=$razonSocialEntrada;
            $this->direccion=$direccionEntrada;
            $this->tipo=$tipoEntrada;
            $this->telefono=$telefonoEntrada;
            $this->direccionWeb=$direccionWebEntrada;
            $this->objetoDB=new  objetoConexionBaseDatos();
            
       }

       public function setNombre($StringEntrada){
             $this->nombre=$StringEntrada;
       }

       public function getNombre(){
           return $this->nombre;
       }

       public function setPassword($StringEntrada){
             $this->password=$StringEntrada;
       }

       public function getpassword(){
           return $this->password;
       }

       public function setRazonSocial($StringEntrada){
        $this->razonSocial=$StringEntrada;
      }    

        public function getRazonSocial(){
        return $this->razonSocial;
       }

       public function setDireccion($StringEntrada){
        $this->direccion=$StringEntrada;
      }    

        public function getDireccion(){
          return $this->direccion;
       }

       public function setTipo($StringEntrada){
        $this->tipo=$StringEntrada;
      }    

        public function getTipo(){
         return $this->tipo;
       }

       public function setTelefono($StringEntrada){
           $this->telefono=$StringEntrada;
       }

       public function getTelefono(){
           return $this->telefono;
       }

       public function setDireccionWeb($StringEntrada){
           $this->direccionWeb=$StringEntrada;
       }
       
       public function getDireccionWeb(){
           return $this->direccionWeb;
       }

       public function setFacebookEmpresa($StringEntrada){
           $this->facebookEmpresa=$StringEntrada;
       }

       public function getFacebooKEmpresa(){
           return $this->facebookEmpresa;
       }

       public function setSkypeEmpresa($StrinEntrada){
           $this->skypeEmpresa=$StrinEntrada;
       }

       public function getSkypeEmpresa(){
           return $this->skypeEmpresa;
       }
       
       public function setTwitterEmpresa($StringEntrada){
           $this->twitterEmpresa;
       }
       
       public function ingresarNuevaEmpresa($FotoLogo){
        $fileFoto=addslashes(file_get_contents($FotoLogo));
         $sqlScriptParam="insert into Empresa(Nombre,Contra,RazonSocial,Direccion,Tipo,Telefono,DireccionWeb,FotoLogo";
         $sqScriptVal=" values('".$this->nombre."','".$this->password."','".$this->razonSocial."',
         '".$this->direccion."','".$this->tipo."','".$this->telefono."','".$this->direccionWeb."','$fileFoto'";
         if(isset($this->facebookEmpresa)){
            $sqlScriptParam= $sqlScriptParam.",FacebookEmpresa";
            $sqScriptVal= $sqScriptVal.",'".$this->facebookEmpresa."'";
         }
         if(isset($this->skypeEmpresa)){
            $sqlScriptParam= $sqlScriptParam.",SkypeEmpresa";
            $sqScriptVal= $sqScriptVal.",'".$this->skypeEmpresa."'";
         }
         if(isset($this->twitterEmpresa)){
            $sqlScriptParam= $sqlScriptParam.",TwitterEmpresa";
            $sqScriptVal= $sqScriptVal.",'".$this->twitterEmpresa."'";
         }
         $sqlScriptParam= $sqlScriptParam.") ";
         $sqScriptVal= $sqScriptVal.") ";
         $sqlScript=$sqlScriptParam.$sqScriptVal;


       if($this->objetoDB->comprobarConexion()==TRUE ){
            if($this->objetoDB->conector->query($sqlScript) === TRUE){
                return true;
            }else{
               return false;
            }
         }else{
          return false;
         }
        
         
       }     
       public function actualizarEmpresa(){
        include_once 'includes/empresa.php';
        include_once 'includes/emp_session.php';
        
        $empSession = new EmpSession();
        $emp = new Emp();
        $emp->setEmp($empSession->getCurrentEmp());
        $dato=$emp->getEmpCorreo();
        //$fileFoto=addslashes(file_get_contents($FotoLogo));
        $nombre=$this->nombre;
        $razon=$this->razonSocial;
        $contra=$this->password;
        $dir=$this->direccion;
        $tipo=$this->tipo;
        $tel=$this->telefono;
        $web=$this->direccionWeb;
        $fbemp=$this->facebookEmpresa;
        $skemp=$this->skypeEmpresa;
        $twemp=$this->twitterEmpresa;
        $sql = "UPDATE Empresa SET 
        Nombre ='$nombre',
        RazonSocial='$razon',
        Contra = '$contra',
        Direccion='$dir',
        Tipo='$tipo',
        Telefono='$tel',
        DireccionWeb='$web',
        FacebookEmpresa='$fbemp',
        SkypeEmpresa='$skemp',
        TwitterEmpresa='$twemp'
        WHERE DireccionWeb = '$dato'";

       if($this->objetoDB->comprobarConexion()==TRUE ){
            if($this->objetoDB->conector->query($sql) === TRUE){
                return true;
            }else{
               return false;
            }
         }else{
          return false;
         }
        
         
       } 
       
   }

?>