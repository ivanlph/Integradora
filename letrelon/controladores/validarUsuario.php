<?php
include_once './modelos/conexion.php';

$con = new Conexion();
$conn = $con->getCon();

class Validacion{
	private $con;
	public $mensaje = "";
	public function __construct(){

		$this->con = new Conexion();
		$this->con = $this->con->getCon();
	}

	public function validarUsuario($usuario,$contraseña){

		$sql = $this->con->prepare("SELECT * FROM  `usuarios` 
				WHERE ((`usuario` =  '$usuario'AND  `password` =  '$contraseña')OR 
					(`email` =  '$usuario' AND  `password` =  '$contraseña'))");
		$sql ->bindParam(1, $usuario);
		$sql ->bindParam(2, $contraseña);
		$sql ->bindParam(3, $usuario);
		$sql ->bindParam(4, $contraseña);
		$sql->execute(); 

		if($sql->rowCount() == 1){

		$sql = ("SELECT * FROM  `usuarios` 
				WHERE ((`usuario` =  '$usuario'AND  `password` =  '$contraseña')OR 
					(`email` =  '$usuario' AND  `password` =  '$contraseña'))");

			foreach ($this->con->query($sql) as $row) {	      
				$_SESSION['usuario']['Nombre'] = $row['Nombre'];
				$_SESSION['usuario']['tipo'] = $row['tipo'];
			}
        $mensaje = '';	 
		header("Location: ./index.php?ver=inicio");

		} 	

		else{
		$mensaje = "<h2>usuario o contraseña incorrecto</h2>";

		}

		return $mensaje;
	}
}
?>