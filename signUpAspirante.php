<?php include 'AlmacenIncludesPHP/elementosPhp/HTMLSTRUCTURE/parteSuperior.php' ?>

<?php include 'AlmacenIncludesPHP/elementosPhp/navbarRetorno/navbarInicialRetornoSuperior.php' ?>
index.php
<?php include 'AlmacenIncludesPHP/elementosPhp/navbarRetorno/navbarInicialRetornoInferior.php' ?>

<?php
   
 if(!isset($_SESSION)){
    session_start();
 }

  if(!isset($nombreAs)){
    $nombreAs="";
  }

  if(!isset($apelPatAs)){
    $apelPatAs="";
  }

  if(!isset($apelMatAs)){
    $apelMatAs="";
  }

  if(!isset($mailAs)){
    $mailAs="";
  }

  if(!isset($password_error)){
    $password_error="";
  }

  if(!isset($fechaNacAs)){
    $fechaNacAs="";
  }

  if(!isset($escuelaAs)){
    $escuelaAs="";
  }

  if(!isset($nivelAcAs)){
    $nivelAcAs="";
  }

  if(!isset($direccionAs)){
    $direccionAs="";
  }

  if(!isset($telAs)){
    $telAs="";
  }

  if(!isset($facebookAs)){
    $facebookAs="";
  }

  if(!isset($skypeAs)){
    $skypeAs="";
  }

  if(!isset($twitterAs)){
    $twitterAs="";
  }

?>

<div class="boxSubjectsInicioExtended light-blue darken-4 centerElements">
    <div class="sizeCardInicioSmall backgroundCardInicio borderCardInicio z-depth-3">
        <p class="white-text textCardInicioSamll centerElements">Datos b&aacute;sicos.</p>
    </div>
    <div class="sizeCardForm backgroundCardForm borderCardInicio z-depth-3">
        <form class="col s12" method="post" action="validarPrimParteRegistroAspirante.php" >
            <div class="row">
                <div class="input-field col s12">
                    <input placeholder="Escriba su nombre." id="nombre_aspirante" name="nombre_aspirante" 
                    value="<?php 
                     echo  htmlspecialchars ($nombreAs)
                    ?>" 
                    type="text" class="validate white-text">
                    <label for="nombre_aspirante">Nombre.</label>
                    <?php
                       if(isset($Nombre_error)){
                       echo  "<p class='white-text'>".$Nombre_error."</p>";
                      } ?>
                </div>
                <div class="input-field col s12">
                    <input placeholder="Escriba el apellido paterno." id="apellido_paterno" name="apellido_paterno"
                    value="<?php 
                     echo  htmlspecialchars ($apelPatAs)
                    ?>" 
                     type="text" class="validate white-text">
                    <label for="apellido_paterno">Apellido paterno.</label>
                    <?php
                       if(isset($apPaterno_error)){
                       echo  "<p class='white-text'>".$apPaterno_error."</p>";
                      } ?>
                </div>
                <div class="input-field col s12">
                    <input placeholder="Escriba el apellido materno." id="apellido_materno" name="apellido_materno" 
                    value="<?php 
                     echo  htmlspecialchars ($apelMatAs)
                    ?>" 
                    type="text" class="validate white-text">
                    <label for="apellido_materno">Apellido  materno.</label>
                    <?php
                       if(isset($apMaterno_error)){
                           echo "<p class='white-text'>".$apMaterno_error."</p>";
                       }
                    ?>
                </div>
                <div class="input-field col s12">
                    <input placeholder="Escriba su email." id="mail" name="mail"
                    value="<?php 
                     echo  htmlspecialchars ($mailAs)
                    ?>" 
                     type="email" class="validate white-text">
                    <label for="first_name">Email.</label>
                    <?php
                       if(isset($mail_error)){
                           echo "<p class='white-text'>".$mail_error."</p>";
                       }
                    ?>
                </div>
                <div class="input-field col s12">
                    <input placeholder="Cree su password de CURVITY." id="password" name="password" type="password" class="validate white-text">
                    <label for="password">Password.</label>
                    <?php
                       if(isset($password_error)){
                           echo "<p class='white-text'>".$password_error."</p>";
                       }
                    ?>
                </div>

                <div class="input-field col s12">
                    <input type="text" placeholder="Seleccione su fecha de nacimiento." id="fecha_nac" name="fecha_nac" 
                    value="<?php 
                     echo  htmlspecialchars ($fechaNacAs)
                    ?>" 
                    class="validate datepicker white-text">
                    <label for="fecha_nac">Fecha de nacimiento.</label>
                    <?php
                       if(isset($fecha_error)){
                           echo "<p class='white-text'>".$fecha_error."</p>";
                       }
                    ?>
                </div>

                <div class="input-field col s12">
                    <input placeholder="Escriba su escuela de procedencia." id="alama_mater" name="alama_mater"
                    value="<?php 
                     echo  htmlspecialchars ($escuelaAs)
                    ?>" type="text" class="validate white-text">
                    <label for="alma_mater">Alma mater.</label>
                    <?php
                       if(isset($escuela_error)){
                           echo "<p class='white-text'>".$escuela_error."</p>";
                       }
                    ?>
                </div>

                <div class="input-field col s12">
                    <select class="white-text" name="nivel_acad">
                        <option value="0" 
                        <?php
                          if($nivelAcAs==""){
                              echo "selected";
                          }
                        ?>
                        >Nivel Acad&eacute;mico.</option>
                        <option value="1"
                        <?php
                          if($nivelAcAs=="1"){
                              echo "selected";
                          }
                        ?>
                        >Universidad.</option>
                        <option value="2"
                        <?php
                          if($nivelAcAs=="2"){
                              echo "selected";
                          }
                        ?>
                        >Carrera t&eacute;cnica.</option>
                        <option value="3"
                        <?php
                          if($nivelAcAs=="3"){
                              echo "selected";
                          }
                        ?>
                        >Preparatoria.</option>
                        <option value="4"
                        <?php
                          if($nivelAcAs=="4"){
                              echo "selected";
                          }
                        ?>
                        >Secundaria</option>
                    </select>
                    <label>Nivel Acad&eacute;mico</label>
                    <?php
                       if(isset($nivelAcad_error)){
                           echo "<p class='white-text'>".$nivelAcad_error."</p>";
                       }
                    ?>
                </div>

                <div class="input-field col s12">
                    <textarea placeholder="Escriba la dirección" id="direccion_aspirante" name="direccion_aspirante"
                     class="materialize-textarea white-text" data-length="200"><?php 
                     echo  htmlspecialchars ($direccionAs)
                    ?></textarea>
                    <label for="direccion_aspirante">Direccion donde recide.</label>
                    <?php
                       if(isset($direccion_error)){
                           echo "<p class='white-text'>".$direccion_error."</p>";
                       }
                    ?>
                </div>

                <div class="input-field col s12">
                    <input placeholder="Escriba su n&uacute;mero tel&eacute;fono." id="tel_aspirante" name="tel_aspirante"
                    value="<?php 
                     echo  htmlspecialchars ($telAs)
                    ?>"
                     type="tel" class="validate white-text">
                    <label for="tel_aspirante">N&uacute;mero de tel&eacute;fono.</label>
                    <?php
                       if(isset($tel_error)){
                           echo "<p class='white-text'>".$tel_error."</p>";
                       }
                    ?>
                </div>

                <div class="input-field col s12">
                    <input placeholder="Escriba la red social" id="facebook" name="facebook"
                    value="<?php 
                     echo  htmlspecialchars ($facebookAs)
                    ?>" type="text" class="validate white-text">
                    <label for="facebook_aspirante">(Opcional) Facebook.</label>
                </div>
                <div class="input-field col s12">
                    <input placeholder="Escriba la red social" id="skype" name="skype" 
                    value="<?php 
                     echo  htmlspecialchars ($skypeAs)
                    ?>"
                    type="text" class="validate white-text">
                    <label for="skype_aspirante">(Opcional) Skype.</label>
                </div>
                <div class="input-field col s12">
                    <input placeholder="Escriba la red social" id="twitter" name="twitter" 
                    value="<?php 
                     echo  htmlspecialchars ($skypeAs)
                    ?>"
                    type="text" class="validate white-text">
                    <label for="twitter_aspirante">(Opcional) Twitter.</label>
                </div>
            </div>
    </div>
    <a><button type="submit" class="waves-effect btn-large borderButton sizeButton textButton grey lighten-5 blue-text text-darken-4">Siguiente.</button></a>
  </form>
</div>

<?php include 'AlmacenIncludesPHP/elementosPhp/HTMLSTRUCTURE/parteInferior.php' ?>