<?php 

	class aspirante{

		/*public function agregaCliente($datos){
			$c= new conectar();
			$conexion=$c->conexion();

			$idusuario=$_SESSION['iduser'];

			$sql="INSERT into clientes (id_usuario,
										nombre,
										apellido,
										direccion,
										email,
										telefono,
										rfc)
							values ('$idusuario',
									'$datos[0]',
									'$datos[1]',
									'$datos[2]',
									'$datos[3]',
									'$datos[4]',
									'$datos[5]')";
			return mysqli_query($conexion,$sql);	
		}*/

		public function obtenDatosAspirante($correo){
			$c= new conectar();
            $conexion=$c->conexion();
            
           /* $userSession = new UserSession();
            $user = new User();
            $user->setUser($userSession->getCurrentUser());
            $dato=$user->getCorreo();*/

            $sql="SELECT *from aspirante";
            $result=mysqli_query($conexion,$sql);
            $ver=mysqli_fetch_row($result);

            $datos=array(
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
            return $datos;
		}

		/*public function actualizaCliente($datos){
			$c= new conectar();
			$conexion=$c->conexion();
			$sql="UPDATE clientes set nombre='$datos[1]',
										apellido='$datos[2]',
										direccion='$datos[3]',
										email='$datos[4]',
										telefono='$datos[5]',
										rfc='$datos[6]' 
								where id_cliente='$datos[0]'";
			return mysqli_query($conexion,$sql);
		}*/

		/*public function eliminaCliente($idcliente){
			$c= new conectar();
			$conexion=$c->conexion();

			$sql="DELETE from clientes where id_cliente='$idcliente'";

			return mysqli_query($conexion,$sql);
		}*/
	}

?>
