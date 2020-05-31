<?php include 'AlmacenIncludesPHP/elementosPhp/HTMLSTRUCTURE/parteSuperior.php' ?>

<?php include 'AlmacenIncludesPHP/elementosPhp/navbarRetorno/navbarInicialRetornoSuperior.php' ?>
index.php
<?php include 'AlmacenIncludesPHP/elementosPhp/navbarRetorno/navbarInicialRetornoInferior.php' ?>
<?php
  if(!isset($_SESSION)){
    session_start();
 }

 if(!isset($nombreEmpresa)){
    $nombreEmpresa="";
  }

  if(!isset($razonSocialEmpresa)){
    $razonSocialEmpresa="";
  }

  if(!isset($emailEmpresa)){
    $emailEmpresa="";
  }

  if(!isset($passwordEmpresa)){
    $passwordEmpresa="";
  }

  if(!isset($direccionEmpresa)){
    $direccionEmpresa="";
  }

  if(!isset($tipoEmpresa)){
    $tipoEmpresa="";
  }

?>

<div class="boxSubjectsInicioExtended light-blue darken-4 centerElements">
    <div class="sizeCardInicioSmall backgroundCardInicio borderCardInicio z-depth-3">
        <p class="white-text textCardInicioSamll centerElements">Datos b&aacute;sicos empresa.</p>
    </div>
    <div class="sizeCardForm backgroundCardForm borderCardInicio z-depth-3">
        <form class="col s12" method="post" action="validarPrimParteRegistroEmpresa.php">
            <div class="row">
                <div class="input-field col s12">
                    <input placeholder="Escriba el nombre de la empresa." id="nombre_empresa" name="nombre_empresa"  type="text"
                    value="<?php 
                     echo  htmlspecialchars ($nombreEmpresa)
                    ?>"  class="validate white-text">
                    <label for="nombre_empresa">Nombre empresa.</label>
                    <?php
                       if(isset($NombreEmpresa_error)){
                       echo  "<p class='white-text'>".$NombreEmpresa_error."</p>";
                      } ?>
                </div>
                <div class="input-field col s12">
                    <input placeholder="Escriba la razon social de la empresa." id="razon_Social" name="razon_Social" type="text"
                    value="<?php 
                     echo  htmlspecialchars ($razonSocialEmpresa)
                    ?>" class="validate white-text">
                    <label for="first_name">Razón social de la empresa.</label>
                    <?php
                       if(isset($razonSocialEmpresa_error)){
                       echo  "<p class='white-text'>".$razonSocialEmpresa_error."</p>";
                      } ?>
                </div>
                <div class="input-field col s12">
                    <input placeholder="Email del admin de empresa." id="email_empresa" name="email_empresa" type="email" 
                    value="<?php 
                     echo  htmlspecialchars ($emailEmpresa)
                    ?>" 
                    class="validate white-text">
                    <label for="first_name">Email.</label>
                    <?php
                       if(isset($emailEmpresa_error)){
                       echo  "<p class='white-text'>".$emailEmpresa_error."</p>";
                      } ?>
                </div>
                <div class="input-field col s12">
                    <input placeholder="Escriba su password." id="password_empresa" name="password_empresa" type="password"
                    value="<?php 
                     echo  htmlspecialchars ($passwordEmpresa)
                    ?>" class="validate white-text">
                    <label for="password">Password.</label>
                    <?php
                       if(isset($passwordEmpresa_error)){
                       echo  "<p class='white-text'>".$passwordEmpresa_error."</p>";
                      } ?>
                </div>
                <div class="input-field col s12">
                    <textarea placeholder="Escriba la dirección" id="direccion_empresa" name="direccion_empresa" class="materialize-textarea white-text" data-length="200"><?php 
                     echo  htmlspecialchars ($direccionEmpresa)
                    ?></textarea>
                    <label for="direccion_sede">Direccion principal de la empresa.</label>
                    <?php
                       if(isset($direccionEmpresa_error)){
                       echo  "<p class='white-text'>".$direccionEmpresa_error."</p>";
                      } ?>
                </div>
                <div class="input-field col s12">
                    <select class="white-text" name="tipo_empresa" id="tipo_empresa">
                        <option value="" <?php
                          if($tipoEmpresa==""){
                              echo "selected";
                          }
                        ?>>Tipo de empresa.</option>
                        <option value="1"<?php
                          if($tipoEmpresa=="1"){
                              echo "selected";
                          }
                        ?>>Empresario individual (autónomo).</option>
                        <option value="2"
                        <?php
                          if($tipoEmpresa=="2"){
                              echo "selected";
                          }
                        ?>>Emprendedor de Responsabilidad Limitada.</option>
                        <option value="3"<?php
                          if($tipoEmpresa=="3"){
                              echo "selected";
                          }
                        ?>>Comunidad de bienes.</option>
                        <option value="4"<?php
                          if($tipoEmpresa=="4"){
                              echo "selected";
                          }
                        ?>>Sociedad Civil.</option>
                        <option value="5"<?php
                          if($tipoEmpresa=="5"){
                              echo "selected";
                          }
                        ?>>Sociedad Colectiva.</option>
                        <option value="6"<?php
                          if($tipoEmpresa=="6"){
                              echo "selected";
                          }
                        ?>>Sociedad Comanditaria Simple.</option>
                        <option value="7"<?php
                          if($tipoEmpresa=="7"){
                              echo "selected";
                          }
                        ?>>Sociedad de Responsabilidad Limitada.</option>
                        <option value="8"<?php
                          if($tipoEmpresa=="8"){
                              echo "selected";
                          }
                        ?>>Sociedad limitada de formación sucesiva.</option>
                        <option value="9"<?php
                          if($tipoEmpresa=="9"){
                              echo "selected";
                          }
                        ?>>Sociedad limitada Nueva empresa.</option>
                        <option value="10"<?php
                          if($tipoEmpresa=="10"){
                              echo "selected";
                          }
                        ?>>Sociedad Anónima.</option>
                        <option value="11"<?php
                          if($tipoEmpresa=="11"){
                              echo "selected";
                          }
                        ?>>Sociedad Comanditaria por acciones.</option>
                        <option value="12"<?php
                          if($tipoEmpresa=="12"){
                              echo "selected";
                          }
                        ?>>Sociedad de responsabilidad limitada laboral.</option>
                        <option value="13"<?php
                          if($tipoEmpresa=="13"){
                              echo "selected";
                          }
                        ?>>Sociedad anónima laboral.</option>
                        <option value="14"<?php
                          if($tipoEmpresa=="14"){
                              echo "selected";
                          }
                        ?>>Sociedad cooperativa.</option>
                        <option value="15"<?php
                          if($tipoEmpresa=="15"){
                              echo "selected";
                          }
                        ?>>Sociedad cooperativa de trabajo asociado.</option>
                        <option value="16"<?php
                          if($tipoEmpresa=="16"){
                              echo "selected";
                          }
                        ?>>Sociedades profesionales.</option>
                        <option value="17"<?php
                          if($tipoEmpresa=="17"){
                              echo "selected";
                          }
                        ?>>Sociedad agraria de transformación.</option>
                        <option value="18"<?php
                          if($tipoEmpresa=="18"){
                              echo "selected";
                          }
                        ?>>Sociedad de garantía recíproca.</option>
                        <option value="19"<?php
                          if($tipoEmpresa=="19"){
                              echo "selected";
                          }
                        ?>>Entidades de capital riesgo.</option>
                        <option value="20"<?php
                          if($tipoEmpresa=="20"){
                              echo "selected";
                          }
                        ?>>Agrupación de interés económico.</option>
                    </select>
                    <label>Tipo de empresa</label>
                    <?php
                       if(isset($tipoEmpresa_error)){
                       echo  "<p class='white-text'>".$tipoEmpresa_error."</p>";
                      } ?>
                </div>
            </div>
       
    </div>
    <a ><button type="submit" class="waves-effect btn-large borderButton sizeButton textButton grey lighten-5 blue-text text-darken-4">Siguiente.</button></a>
    </form>
</div>


<?php include 'AlmacenIncludesPHP/elementosPhp/HTMLSTRUCTURE/parteInferior.php' ?>