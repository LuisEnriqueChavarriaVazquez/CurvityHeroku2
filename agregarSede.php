<?php include 'AlmacenIncludesPHP/elementosPhp/HTMLSTRUCTURE/parteSuperior.php' ?>

<?php include 'AlmacenIncludesPHP/elementosPhp/navbarRetorno/navbarInicialRetornoSuperior.php' ?>
gestionSedes.php
<?php include 'AlmacenIncludesPHP/elementosPhp/navbarRetorno/navbarInicialRetornoInferior.php' ?>

<!--Declraciones para agregar la sede-->
<div class="boxSubjectsInicioExtended light-blue darken-4 centerElements">
    <div class="sizeCardInicioSmall backgroundCardInicio borderCardInicio z-depth-3">
        <p class="white-text textCardInicioSamll centerElements">Agregar sede.</p>
    </div>
    <div class="sizeCardForm backgroundCardForm borderCardInicio z-depth-3">

        <form class="col s12" method="post" action="agregarSede.php">
            <!--llamado al archivo validador-->
            <div class="row">
                <div class="input-field col s12">
                    <input placeholder="EMAIL EMPRESA" id="email_empresa_sede" name="email_empresa_sede" type="email" class="validate white-text">
                    <label for="email_empresa_sede">Email de la empresa.</label>
                </div>
                <div class="input-field col s12">
                    <input placeholder="PASSWORD EMPRESA." id="contrasena_sede_empresa" name="contrasena_sede_empresa" type="password" class="validate white-text">
                    <label for="contrasena_sede_empresa">Confirme contraseña de EMPRESA.</label>
                </div>


                <div class="input-field col s12">
                    <input placeholder="Escriba el nombre." id="nombre_sede" name="nombre_sede" type="text" class="validate white-text">
                    <label for="nombre_sede">Nombre de la sede.</label>
                </div>

                <div class="input-field col s12">
                    <textarea placeholder="Escriba la dirección" id="direccion_sede" name="direccion_sede" class="materialize-textarea white-text" data-length="200"></textarea>
                    <label for="direccion_sede">Direccion de la sede.</label>
                </div>

                <div class="input-field col s12">
                    <input placeholder="Escriba su n&uacute;mero tel&eacute;fono." id="tel_sede" name="tel_sede" type="tel" class="validate white-text">
                    <label for="tel_sede">N&uacute;mero de tel&eacute;fono 1.</label>
                </div>

                <div class="input-field col s12">
                    <input placeholder="Escriba el nombre del reclutador." id="nombre_reclutador" name="nombre_reclutador" type="text" class="truncate validate white-text">
                    <label for="nombre_reclutador">Nombre del reclutador.</label>
                </div>
                <div class="input-field col s12">
                    <input placeholder="Escriba el email del reclutador." id="email_reclutador" name="email_reclutador" type="email" class="validate white-text truncate">
                    <label for="email_reclutador">Email.</label>
                </div>
                <div class="input-field col s12">
                    <input placeholder="Asigne password de reclutador designado." id="password_reclutador" name="password_reclutador" type="password" class="validate white-text truncate">
                    <label for="password_reclutador">Passoword del reclutador.</label>
                </div>



                <div class="input-field col s12">
                    <input placeholder="Escriba la red social" id="facebook_sede" name="facebook_sede" type="text" class="validate white-text">
                    <label for="facebook_sede">(Opcional) Facebook.</label>
                </div>
                <div class="input-field col s12">
                    <input placeholder="Escriba la red social" id="skype_sede" name="skype_sede" type="text" class="validate white-text">
                    <label for="skype_sede">(Opcional) Skype.</label>
                </div>
                <div class="input-field col s12">
                    <input placeholder="Escriba la red social" id="twitter_sede" name="twitter_sede" type="text" class="validate white-text">
                    <label for="twitter_sede">(Opcional) Twitter.</label>
                </div>
            </div>
            <a><button type="submit" name="submit" class="waves-effect btn-large borderButton sizeButton textButton grey lighten-5 blue-text text-darken-4">Agregar sede.</button></a>

            <?php
            include("logicaOperacionesEmpresa/validarFormAgregarSede.php");
            ?>

        </form>
    </div>
</div>

<?php include 'AlmacenIncludesPHP/elementosPhp/HTMLSTRUCTURE/parteInferior.php' ?>