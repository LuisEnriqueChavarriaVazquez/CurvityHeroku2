<!--Aqui tenemos nuestro navbar-->
<nav class="light-blue darken-4 ">
    <div class="nav-wrapper z-depth-2">
        <a href="#" data-target="slide-out" class="sidenav-trigger" ><i class="material-icons">menu</i></a>
        <p class="textNavbar">Operaciones reclutador.</p>
    </div>
</nav>



<!--Menu del sidenav-->

<ul id="slide-out" class="sidenav colorContrast">
    <li>
        <div class="user-view">
            <div class="background sideNavFont">

            </div>
            <a href="#user"><img class="circle hoverable" src="pictures/logo.png">
            <?php
             session_start(); ?></a>
            <a href="#name"><span class="white-text name"><?php echo $_SESSION["nombreUsuario"] ?></span></a>
            <a href="#email"><span class="white-text email">Version 1.0.0</span></a>
        </div>
    </li>
    <li><a href="ofertasPublicadasPrevioSwipe.php" class="textColor"><i class="material-icons">view_carousel</i>Gestionar con SWIPE.</a></li>
    <li><a href="gestionOfertas.php" class="textColor"><i class="material-icons">chrome_reader_mode</i>Gestionar ofertas de sede.</a></li>
    <li><a href="operacionCierreSesionGeneral.php" class="textColor"><i class="material-icons">directions_run</i>Cerrar sesi&oacute;n.</a></li>
</ul>