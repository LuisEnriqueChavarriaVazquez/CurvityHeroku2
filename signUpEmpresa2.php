<?php include 'AlmacenIncludesPHP/elementosPhp/HTMLSTRUCTURE/parteSuperior.php' ?>

<?php include 'AlmacenIncludesPHP/elementosPhp/navbarRetorno/navbarInicialRetornoSuperior.php' ?>
signUpEmpresa.php
<?php include 'AlmacenIncludesPHP/elementosPhp/navbarRetorno/navbarInicialRetornoInferior.php' ?>
<?php
  if(!isset($_SESSION)){
    session_start();
 }

 if(!isset($descripEmpresa)){
    $descripEmpresa="";
  }

  if(!isset($dirArchivoEmpresa)){
    $dirArchivoEmpresa="";
  }

  if(!isset($telEmpresa)){
    $telEmpresa="";
  }

  if(!isset($facebookEmpresa)){
    $facebookEmpresa="";
  }

  if(!isset($skypeEmpresa)){
    $skypeEmpresa="";
  }

  if(!isset($twitterEmpresa)){
    $twitterEmpresa="";
  }
  

?>

<div class="boxSubjectsInicioExtended light-blue darken-4 centerElements">
    <div class="sizeCardInicioSmall backgroundCardInicio borderCardInicio z-depth-3">
        <p class="white-text textCardInicioSamll centerElements">M&aacute;s datos empresa.</p>
    </div>
    <div class="sizeCardForm backgroundCardForm borderCardInicio z-depth-3">
        <form class="col s12" method="post" action="validarSegunParteRegistroEmpresa.php" enctype="multipart/form-data">
            <div class="row">
                <!--Direccion-->
                <div class="input-field col s12">
                    <textarea placeholder="Escriba descripci&oacute;n de la empresa" name="descripcion_empresa" id="descripcion_empresa" class="materialize-textarea white-text" data-length="200"><?php
                            echo  htmlspecialchars ($descripEmpresa)
                        ?></textarea>
                    <label for="descripcion_empresa">Descripci&oacute;n.</label>
                    <?php
                       if(isset($descripcionEmpresa_error)){
                       echo  "<p class='white-text'>".$descripcionEmpresa_error."</p>";
                        } ?>
                </div>
                <br><br><br>
                <!--Foto de perfil-->
                <div class="file-field input-field">
                    <div class="btn white blue-text text-darken-4">
                        <span>Foto de perfil</span>
                        <input type="file" id="fotoLogoEmp" name="fotoLogoEmp" >
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" value="<?php
                            echo  htmlspecialchars ($dirArchivoEmpresa)
                        ?>" type="text">
                         <?php
                       if(isset($dirArchivoEmpresa_error)){
                       echo  "<p class='white-text'>".$dirArchivoEmpresa_error."</p>";
                        } ?>
                    </div>
                   
                </div>
                <!--Telefono y redes sociales.-->
                <div class="input-field col s12">
                    <input placeholder="Escriba el telefono de la empresa." id="telefono_empresa" name="telefono_empresa" type="tel"
                    value="<?php
                            echo  htmlspecialchars ($telEmpresa)
                        ?>"
                     class="validate white-text">
                    <label for="telefono">Tel&eacute;fono.</label>
                    <?php 
                    if(isset($telEmpresa_error)){
                       echo  "<p class='white-text'>".$telEmpresa_error."</p>";
                        } ?>
                </div>
               
                <div class="input-field col s12">
                    <input placeholder="Escriba la red social" id="facebook_empresa" name="facebook_empresa" type="text" 
                    value="<?php
                            echo  htmlspecialchars ($facebookEmpresa)
                        ?>"class="validate white-text">
                    <label for="facebook">(Opcional) Facebook.</label>
                </div>
                <div class="input-field col s12">
                    <input placeholder="Escriba la red social" id="skype_empresa" name="skype_empresa" type="text" 
                    value="<?php
                            echo  htmlspecialchars ($skypeEmpresa)
                        ?>"
                    class="validate white-text">
                    <label for="skype">(Opcional) Skype.</label>
                </div>
                <div class="input-field col s12">
                    <input placeholder="Escriba la red social" id="twitter_empresa" name="twitter_empresa" type="text"
                    value="<?php
                            echo  htmlspecialchars ($twitterEmpresa)
                        ?>" class="validate white-text">
                    <label for="twitter">(Opcional) Twitter.</label>
                </div>
            </div>
       
    </div>
    <a ><button type="submit" class="waves-effect btn-large borderButton sizeButton textButton grey lighten-5 blue-text text-darken-4">Siguiente.</button></a>
    </form>
</div>

</div>


<?php include 'AlmacenIncludesPHP/elementosPhp/HTMLSTRUCTURE/parteInferior.php' ?> 