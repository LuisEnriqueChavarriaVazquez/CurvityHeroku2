
<?php 
	include_once 'includes/user.php';
	include_once 'includes/user_session.php';
	include 'includes/Conexion.php';
	
	$userSession = new UserSession();
	$user = new User();
	$user->setUser($userSession->getCurrentUser());
    $dato=$user->getCorreo();
	$c=new conectar();
    $conexion=$c->conexion();

    $sql="SELECT *from aspirante where CorreoElec='$dato'";
    $result=mysqli_query($conexion,$sql);

    //$ver=mysqli_fetch_row($result);

    /*$datos=array(
                    'IDAspirante'=>$ver[0],
                    'Nombre'=>$ver[1],
                    'Contra'=>$ver[2],
                    'ApellidoPat'=> $ver[3],
                    'ApellidoMat'=>$ver[4],
                    'SueldoDeseado'=>$ver[5],
                    'Direccion'=>$ver[6],
                    'Escuela'=>$ver[7],
                    'NivelAcademico'=>$ver[8],
                    'CorreoElec'=>$ver[9],
                    'ResumenExpPrevLab'=>$ver[10],
                    'ResumenHab'=>$ver[11],
                    'numeroIdiomas'=>$ver[12],
                    'detallesIdiomas'=>$ver[13],
                    'FacebookAspirante'=>$ver[14],
                    'SkypeAspirante'=>$ver[15],
                    'TwitterAspirante'=>$ver[16],
                    'FotoPerfil'=>$ver[17]
                );

    return $datos;*/
 ?>

<div class="table-responsive">
	 <table class="table table-hover table-condensed table-bordered" style="text-align: center;">
	 	<caption><label>Clientes :)</label></caption>
	 	<tr>
	 		<td>Nombre</td>
	 		<td>Apellido</td>
	 		<td>Direccion</td>
	 		<td>Email</td>
	 		<td>Telefono</td>
	 		<td>RFC</td>
	 		<td>Editar</td>
	 		<td>Eliminar</td>
	 	</tr>

	 	<?php while($hola=mysqli_fetch_row($result)): ?>

	 	<tr>
	 		<td><?php echo $hola[1]; ?></td>
	 		<td><?php echo $hola[2]; ?></td>
	 		<td><?php echo $hola[3]; ?></td>
	 		<td><?php echo $hola[4]; ?></td>
	 		<td><?php echo $hola[5]; ?></td>
	 		<td><?php echo $hola[6]; ?></td>
	 		<td>
				<span class="btn btn-warning btn-xs" data-toggle="modal" data-target="#abremodalClientesUpdate" onclick="agregaDatosCliente('<?php echo $hola[0]; ?>')">
					<span class="glyphicon glyphicon-pencil"></span>
				</span>
			</td>
			<td>
				<span class="btn btn-danger btn-xs" onclick="eliminarCliente('<?php echo $hola[0]; ?>')">
					<span class="glyphicon glyphicon-remove"></span>
				</span>
			</td>
	 	</tr>
	 <?php endwhile; ?>
	 </table>
</div>