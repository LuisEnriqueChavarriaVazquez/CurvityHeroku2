<?php include 'AlmacenIncludesPHP/elementosPhp/HTMLSTRUCTURE/parteSuperior.php' ?>

<?php include 'AlmacenIncludesPHP/elementosPhp/navbarRetorno/navbarInicialRetornoSuperior.php' ?>
gestionSedes.php
<?php include 'AlmacenIncludesPHP/elementosPhp/navbarRetorno/navbarInicialRetornoInferior.php' ?>


<div class="boxSubjectsInicioExtended light-blue darken-4 centerElements">
    <div class="sizeCardInicioSmall backgroundCardInicio borderCardInicio z-depth-3">
        <p class="white-text textCardInicioSamll centerElements">Actualizar sede.</p>
    </div>
    <div class="sizeCardForm backgroundCardForm borderCardInicio z-depth-3">
        <form class="col s12">
            <div class="row">
                <div class="input-field col s12">
                    <input placeholder="Escriba el nombre." id="nombre_sede" type="text" class="validate white-text">
                    <label for="nombre_sede">Nombre de la sede.</label>
                </div>

                <div class="input-field col s12">
                    <textarea placeholder="Escriba la dirección" id="direccion_sede" class="materialize-textarea white-text" data-length="200"></textarea>
                    <label for="direccion_sede">Direccion de la sede.</label>
                </div>

                <div class="input-field col s12">
                    <input placeholder="Escriba su n&uacute;mero tel&eacute;fono." id="tel_sede" type="tel" class="validate white-text">
                    <label for="tel_sede">N&uacute;mero de tel&eacute;fono 1.</label>
                </div>

                <div class="input-field col s12">
                    <input placeholder="Escriba el nombre del reclutador." id="nombre_reclutador" type="text" class="truncate validate white-text">
                    <label for="nombre_reclutador">Nombre del reclutador.</label>
                </div>

            
                <div class="input-field col s12">
                    <input placeholder="Escriba la red social" id="facebook" type="text" class="validate white-text">
                    <label for="facebook_aspirante">(Opcional) Facebook.</label>
                </div>
                <div class="input-field col s12">
                    <input placeholder="Escriba la red social" id="skype" type="text" class="validate white-text">
                    <label for="skype_aspirante">(Opcional) Skype.</label>
                </div>
                <div class="input-field col s12">
                    <input placeholder="Escriba la red social" id="twitter" type="text" class="validate white-text">
                    <label for="twitter_aspirante">(Opcional) Twitter.</label>
                </div>
            </div>
        </form>
    </div>
    <a href="gestionSedes.php"><button type="submit" class="waves-effect btn-large borderButton sizeButton textButton grey lighten-5 blue-text text-darken-4">Actualizar sede.</button></a>
</div>

<?php include 'AlmacenIncludesPHP/elementosPhp/HTMLSTRUCTURE/parteInferior.php' ?>