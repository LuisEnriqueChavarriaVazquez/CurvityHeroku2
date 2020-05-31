<?php include 'AlmacenIncludesPHP/elementosPhp/HTMLSTRUCTURE/parteSuperior.php' ?>

<?php include 'AlmacenIncludesPHP/elementosPhp/navbarRetorno/navbarInicialRetornoSuperior.php' ?>
signUpAspirante.php
<?php include 'AlmacenIncludesPHP/elementosPhp/navbarRetorno/navbarInicialRetornoInferior.php' ?>
<?php
  if(!isset($_SESSION)){
    session_start();
 }

  if(!isset($dirArchivoAsp)){
    $dirArchivoAsp="";
  }
    
  if(!isset($habiliAsp)){
    $habiliAsp="";
  }

  if(!isset($expAsp)){
    $expAsp="";
  }

  if(!isset($cantidadIdiomasAsp)){
    $cantidadIdiomasAsp="";
  }

  if(!isset($idiomasEspAsp)){
    $idiomasEspAsp="";
  }

  if(!isset($sueldoAsp)){
    $sueldoAsp="";
  }

?>

<div class="boxSubjectsInicioExtended light-blue darken-4 centerElements">
    <div class="sizeCardInicioSmall backgroundCardInicio borderCardInicio z-depth-3">
        <p class="white-text textCardInicioSamll centerElements">Datos adicionales.
        
        </p>
    </div>
    <div class="sizeCardForm backgroundCardForm borderCardInicio z-depth-3">
        <form class="col s12" method="post" action="validarSegunParteRegistroAspirante.php" enctype="multipart/form-data">
            <div class="row">
                <!--Foto de perfil-->
                <div class="file-field input-field">
                    <div class="btn white blue-text text-darken-4">
                        <span>Foto de perfil</span>
                        <input type="file" id="archivo_aspirante" name="archivo_aspirante">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" id="archivoDir_aspirante" name="archivoDir_aspirante" 
                        value="<?php
                            echo  htmlspecialchars ($dirArchivoAsp)
                        ?>"
                        type="text">
                        <?php
                       if(isset($dirArchivo_error)){
                       echo  "<p class='white-text'>".$dirArchivo_error."</p>";
                        } ?>
                    </div>
                </div>
                <br>

                <!--Describe tus habilidades-->
                <div class="input-field col s12">
                    <textarea placeholder="Habilidades con que cuenta" id="habilidades_aspirante" name="habilidades_aspirante"  class="materialize-textarea white-text" data-length="200"><?php
                       echo  htmlspecialchars ($habiliAsp)
                    ?></textarea>
                    <label for="habilidades_aspirante">Habilidades.</label>
                    <?php
                       if(isset($habilidades_error)){
                       echo  "<p class='white-text'>".$habilidades_error."</p>";
                     } ?>
                </div>

                <div class="input-field col s12">
                    <textarea placeholder="Experiencia laboral." id="experiencia_laboral" name="experiencia_laboral" class="materialize-textarea white-text" data-length="200"><?php
                        echo  htmlspecialchars ($expAsp)
                    ?></textarea>
                    <label for="experiencia_laboral">Experiencia laboral.</label>
                    <?php
                       if(isset($experiencia_error)){
                       echo  "<p class='white-text'>".$experiencia_error."</p>";
                        } ?>
                </div>

                <!--Idiomas que domina-->
                <div class="input-field col s12">
                    <input placeholder="Cantidad de idiomas." id="cantidad_de_idiomas" name="cantidad_de_idiomas"
                     value="<?php
                            echo  htmlspecialchars ($cantidadIdiomasAsp)
                        ?>"
                     type="text" class="validate white-text truncate">
                    <label for="cantidad_de_idiomas">Cantidad de idiomas que domina.</label>
                    <?php
                       if(isset($cantidadIdiomas_error)){
                       echo  "<p class='white-text'>".$cantidadIdiomas_error."</p>";
                        } ?>
                </div>

                <div class="input-field col s12">
                    <textarea placeholder="Idiomas que domina" id="idiomas_domina" name="idiomas_domina" class="materialize-textarea white-text" data-length="200"><?php
                            echo  htmlspecialchars ($idiomasEspAsp)
                        ?></textarea>
                    <label for="idiomas_domina">Cuentenos que idiomas domina.</label>
                    <?php
                       if(isset($idiomasEsp_error)){
                       echo  "<p class='white-text'>".$idiomasEsp_error."</p>";
                        } ?>
                </div>

               

                <!--Sueldo ideal-->
                <div class="input-field col s12">
                    <input placeholder="Ejemplo 30500" id="sueldo_ideal" name="sueldo_ideal"
                    value="<?php
                        echo  htmlspecialchars ($sueldoAsp)
                     ?>"
                     type="text" class="validate white-text truncate">
                    <label for="sueldo_ideal">Sueldo ideal.</label>
                    <?php
                       if(isset($sueldo_error)){
                       echo  "<p class='white-text'>".$sueldo_error."</p>";
                        } ?>
                </div>
            </div>
    </div>
    <a><button type="submit" class="waves-effect btn-large borderButton sizeButton textButton grey lighten-5 blue-text text-darken-4">Siguiente.</button></a>
    </form>
</div>


<?php include 'AlmacenIncludesPHP/elementosPhp/HTMLSTRUCTURE/parteInferior.php' ?>