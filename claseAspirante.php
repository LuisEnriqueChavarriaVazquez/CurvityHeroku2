<?php 
  require("claseDB.php");
  
  class Aspirante {
      
    public $nombre;
    public $password;
    public $apellidoPaterno;
    public $apellidoMaterno;
    public $fechaNac;
    public $resumenExperienciasLaborales;
    public $sueldoDeseado;
    public $direccion;
    public $nivelAcademico;
    public $escuela;
    public $resumenHabilidades;
    public $correoElectronico;
    public $telefono;
    public $numeroIdiomas;
    public $detallesIdiomas;
    public $identificador;
    public $facebookNombre;
    public $twitterNombre;
    public $skypeNombre;

    function __construct($nombreEntrada,$passwordEntrada,$apellidoPaternoEntrada,$apellidoMaternoEntrada,$fechaNacEntrada,$resumenExperienciasLaboralesEntrada,$sueldoEntrada,$direccionEntrada,$nivelAcademicoEntrada,$escuelaEntrada,$resumenHabEntrada,$correoEntrada,$numeroIdiomasEntrada,$detallesIdiomasEntrada) {
       $this->nombre=$nombreEntrada;
       $this->password=$passwordEntrada;
       $this->apellidoPaterno=$apellidoPaternoEntrada;
       $this->apellidoMaterno=$apellidoMaternoEntrada;
       $this->fechaNac=$fechaNacEntrada;
       $this->resumenExperienciasLaborales=$resumenExperienciasLaboralesEntrada;
       $this->sueldoDeseado=$sueldoEntrada;
       $this->direccion=$direccionEntrada;
       $this->nivelAcademico=$nivelAcademicoEntrada;
       $this->escuela=$escuelaEntrada;
       $this->resumenHabilidades=$resumenHabEntrada;
       $this->correoElectronico=$correoEntrada;
       //$this->telefono=$telefonoEntrada;
       $this->numeroIdiomas=$numeroIdiomasEntrada;
       $this->detallesIdiomas=$detallesIdiomasEntrada;
      
    }
     
    function set_nombre($StringEntrada){
      $this->nombre=$StringEntrada;
    }

    function get_nombre(){
      return $this->nombre;
    }

    function set_password($StringEntrada){
      $this->password=$StringEntrada;
    }

    function get_password(){
      return $this->password;
    }

    function set_apellidoPaterno($StringEntrada){
      $this->apellidoPaterno=$StringEntrada;
    }

    function get_apellidoPaterno(){
      return $this->apellidoPaterno;
    }

    function set_apellidoMaterno($StringEntrada){
      $this->apellidoMaterno=$StringEntrada;
    }

    function get_apellidomaterno(){
      return $this->apellidoMaterno;
    }

    function set_fechaNacimiento($StringEntrada){
      $this->fechaNac=$StringEntrada;
    }

    function get_fechaNacimiento(){
      return $this->fechaNac;
    }
    
    function set_resumenExperienciasLaborales($StringEntrada){
      $this->resumenExperienciasLaborales=$StringEntrada;
    }

    function get_resumenExperienciasLaborales(){
      return $this->resumenExperienciasLaborales;
    }
  
    function set_sueldoDeseado($StringEntrada){
      $this->sueldoDeseado=$StringEntrada;
    }

    function get_sueldoDeseado(){
      return $this->sueldoDeseado;
    }

    function set_direccion($StringEntrada){
      $this->direccion=$StringEntrada;
    }

    function get_direccion(){
      return $this->direccion;
    }

    function set_nivelAcademico($StringEntrada){
      $this->nivelAcademico=$StringEntrada;
    }

    function get_nivelAcademico(){
      return $this->nivelAcademico;
    }

    function set_escuela($StringEntrada){
      $this->escuela=$StringEntrada;
    }

    function get_escuela(){
      return $this->escuela;
    }

    function set_resumenHabilidades($StringEntrada){
      $this->resumenHabilidades=$StringEntrada;
    }

    function get_resumenHabilidades(){
      return $this->resumenHabilidades;
    }

    function set_correoElectronico($StringEntrada){
      $this->correoElectronico=$StringEntrada;
    }

    function get_correoElectronico(){
      return $this->correoElectronico;
    }

    function set_telefono($StringEntrada){
      $this->telefono=$StringEntrada;
    }

    function get_telefono(){
      return $this->telefono;
    }

    function set_numeroIdiomas($StringEntrada){
      $this->numeroIdiomas=$StringEntrada;
    }

    function get_numeroIdiomas(){
      return $this->numeroIdiomas;
    }

    function set_detallesIdiomas($StringEntrada){
      $this->detallesIdiomas=$StringEntrada;
    }

    function get_detallesIdiomas(){
      return $this->detallesIdiomas;
    }


    function obtenerVocalCercana($StringEntrada){
     $novocales=array("b","c","d","f","g","h","j","k","l","m","n","p","q","r","s","t","v","w","x","y","z","B","C","D","F","G","H","J","K","L","M","N","P","Q","R","S","T","V","W","X","Y","Z");
     $stringReducido=str_replace($novocales, "", $StringEntrada);
     $vocalRetorno=substr($stringReducido,0,1);
     return $vocalRetorno;
    }
    
    function generarDigitosRandom($numeroCaracteres){
      $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
      $randomString = ''; 
    
      for ($i = 0; $i < $numeroCaracteres; $i++) { 
          $index = rand(0, strlen($characters) - 1); 
          $randomString .= $characters[$index]; 
      } 
    
      return $randomString; 
    }

    function generarIdentificador(){
        $IdentificadorString="";
        $IdentificadorString=$IdentificadorString.substr($this->apellidoPaterno,0,1);
        $IdentificadorString=$IdentificadorString.$this->obtenerVocalCercana($this->apellidoPaterno);
        $IdentificadorString=$IdentificadorString.substr($this->apellidoMaterno,0,1).substr($this->nombre,0,1);
        $DescomposicionFecha=explode(',',$this->fechaNac);
        $yearNac=$DescomposicionFecha[1];
        $IdentificadorString=$IdentificadorString.substr($yearNac,3);
        $IdentificadorString=$IdentificadorString.substr($this->nivelAcademico,0,3);
        $IdentificadorString=$IdentificadorString.$this->numeroIdiomas.$this->generarDigitosRandom(5);
        $this->identificador=$IdentificadorString;
        return $IdentificadorString;
    }

    function get_identificador(){
      return $this->identificador;
    }

    function set_NombreFacebook($StringEntrada){
        $this->facebookNombre=$StringEntrada;
    }

    function get_NombreFacebook(){
      return $this->facebookNombre;
    }

    function set_NombreSkype($StringEntrada){
      $this->skypeNombre=$StringEntrada;
    }

    function get_NombreSkype(){
      return $this->skypeNombre;
    }

    function set_NombreTwitter($StringEntrada){
      $this->twitterNombre=$StringEntrada;
    }

    function get_NombreTwitter(){
      return $this->twitterNombre;
    }


  }

?>