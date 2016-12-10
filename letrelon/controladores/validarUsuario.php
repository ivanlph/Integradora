<?php

include_once '../modelos/conexion.php';

$con = new Conexion();
$conn = $con->getCon();


session_start();

if(isset($_SESSION['usuario'])){
	header("Location: ../index.php?ver=inicio");
}

	$usuario = $_POST['nombre'];
	$contraseña = $_POST['password'];
	$sql = "SELECT `idUsr`FROM `usuarios` WHERE (
		(`usuario` = '$usuario' AND `password` = '$contraseña') or 
		(`email` = '$usuario' and `password` = '$contraseña'))";

	if($conn->exec($sql) < 0 ){

		?>

		<h2>Funciona!!</h2>

		<?php

	}

	else{

				?>

		<h2>Usuario no existe</h2>

		<?php
	}


?> 