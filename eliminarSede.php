<?php include 'AlmacenIncludesPHP/elementosPhp/HTMLSTRUCTURE/parteSuperior.php' ?>

<?php include 'AlmacenIncludesPHP/elementosPhp/navbarRetorno/navbarInicialRetornoSuperior.php' ?>
gestionSedes.php
<?php include 'AlmacenIncludesPHP/elementosPhp/navbarRetorno/navbarInicialRetornoInferior.php' ?>


<div class="boxSubjectsInicioExtended blue-grey lighten-5 centerElements">
    <div class="sizeCardInicioSmall backgroundCardInicio borderCardInicio z-depth-3">
        <p class="white-text textCardInicioSamll centerElements">Borrar sedes.</p>
    </div>

    <div class="sizeCardForm backgroundCardForm borderCardInicio z-depth-3">
        <form class="col s12" method="post" action="eliminarSede.php">
            <!--llamado al archivo validador-->
            <div class="row">
                <div class="input-field col s12">
                    <input placeholder="Confirme email de la empres." id="email_empresa_eliminar" name="email_empresa_eliminar" type="email" class="validate white-text">
                    <label for="email_empresa_eliminar">Email de la empresa.</label>
                </div>
                <div class="input-field col s12">
                    <input placeholder="Confirme la contraseña de su empresa." id="contrasena_eliminar_empresa" name="contrasena_eliminar_empresa" type="password" class="validate white-text">
                    <label for="contrasena_eliminar_empresa">Confirme contraseña de EMPRESA.</label>
                </div>
            </div>

            <a><button type="submit" name="submit" class="waves-effect btn borderButton sizeButton textButton grey lighten-5 blue-text text-darken-4">Confirmar datos de empresa.</button></a>

        </form>

        <form class="col s12" method="get" action="eliminarSede.php">
            <?php
            include("logicaOperacionesEmpresa/validarFormEliminarSede.php");
            ?>
            <a><button type="submit" name="borrarSede" class="waves-effect btn borderButton sizeButton textButton red darken-3 white-text text-darken-4">Eliminar.</button></a>
        </form>

    </div>


</div>


<?php include 'AlmacenIncludesPHP/elementosPhp/HTMLSTRUCTURE/parteInferior.php' ?>