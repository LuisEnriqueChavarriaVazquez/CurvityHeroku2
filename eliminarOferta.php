<?php include 'AlmacenIncludesPHP/elementosPhp/HTMLSTRUCTURE/parteSuperior.php' ?>

<?php include 'AlmacenIncludesPHP/elementosPhp/navbarRetorno/navbarInicialRetornoSuperior.php' ?>
gestionOfertas.php
<?php include 'AlmacenIncludesPHP/elementosPhp/navbarRetorno/navbarInicialRetornoInferior.php' ?>


<div class="boxSubjectsInicioExtended blue-grey lighten-5 centerElements">
    <div class="sizeCardInicioSmall backgroundCardInicio borderCardInicio z-depth-3">
        <p class="white-text textCardInicioSamll centerElements">Borrar ofertas.</p>
    </div>

    
    <div class="sizeCardForm backgroundCardForm borderCardInicio z-depth-3">
        <form class="col s12" method="post" action="eliminarOferta.php">
            <!--llamado al archivo validador-->
            <div class="row">
                <div class="input-field col s12">
                    <input placeholder="Confirme email de la empresa." id="email_reclutador_eliminar_oferta" name="email_reclutador_eliminar_oferta" type="email" class="validate white-text">
                    <label for="email_reclutador_eliminar_oferta">Email oficial de la empresa.</label>
                </div>
                <div class="input-field col s12">
                    <input placeholder="Confirme la contraseña de reclutador." id="contrasena_eliminar_reclutador_oferta" name="contrasena_eliminar_reclutador_oferta" type="password" class="validate white-text">
                    <label for="contrasena_eliminar_reclutador_oferta">Confirme contraseña de RECLUTADOR.</label>
                </div>
            </div>

            <a><button type="submit" name="submit" class="waves-effect btn borderButton sizeButton textButton grey lighten-5 blue-text text-darken-4">Confirmación seguridad.</button></a>

        </form>

        <form class="col s12" method="get" action="eliminarOferta.php">
            <?php
            include("logicaOperacionesReclutador/validarFormEliminarOferta.php");
            ?>
            <a><button type="submit" name="borrarOferta" class="waves-effect btn borderButton sizeButton textButton red darken-3 white-text text-darken-4">Eliminar.</button></a>
        </form>

    </div>
    


</div>


<?php include 'AlmacenIncludesPHP/elementosPhp/HTMLSTRUCTURE/parteInferior.php' ?>



    


