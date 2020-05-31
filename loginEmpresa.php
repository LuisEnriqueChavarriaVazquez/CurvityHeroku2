<?php include 'AlmacenIncludesPHP/elementosPhp/HTMLSTRUCTURE/parteSuperior.php' ?>


<?php include 'AlmacenIncludesPHP/elementosPhp/navbarRetorno/navbarInicialRetornoSuperior.php' ?>
login.php
<?php include 'AlmacenIncludesPHP/elementosPhp/navbarRetorno/navbarInicialRetornoInferior.php' ?>

<div class="boxSubjectsInicio light-blue darken-4 centerElements">
    <div class="sizeCardInicio backgroundCardInicio centerElements borderCardInicio z-depth-3">
        <form class="col s12" method="POST">
            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix white-text">email</i>
                    <input id="email" name="username_emp" type="email" class="validate white-text">
                    <label for="email" class="white-text">Email.</label>
                </div>
                <div class="input-field col s12">
                    <i class="material-icons prefix white-text">lock</i>
                    <input id="password" name="password_emp" type="password" class="validate white-text">
                    <label for="password" class="white-text">Password.</label>
                </div>
            </div>
            <input type="submit"  class="waves-effect btn-large borderButton sizeButton textButton grey lighten-5 blue-text text-darken-4" value="Iniciar Sesión"></p>
        </form>
    </div>
</div>

<?php include 'AlmacenIncludesPHP/elementosPhp/HTMLSTRUCTURE/parteInferior.php' ?>