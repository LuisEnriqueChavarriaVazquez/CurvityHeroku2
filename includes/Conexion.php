<?php 

	class conectar{
		private $servidor="localhost";
		private $usuario="u253306330_curvity";
		private $password="curvity";
		private $bd="u253306330_curvity";

		public function conexion(){
			$conexion=mysqli_connect($this->servidor,
			$this->usuario,
			$this->password,
			$this->bd);						 
			return $conexion;
		}
	}

?>