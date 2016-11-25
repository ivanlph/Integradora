<?php 

function agregarUsuario(){

	$Nombre = $_POST["usr"];
	$edad = $_POST["Edad"];
	$direccion = $_POST["Direccion"];

	$servername = "localhost";
	$username = "root";
	$password = "";
	
	try {
		$conn =  new PDO("mysql:host=$servername;dbname=letrelom", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		echo "Connected succesfull<br>";

		$sql = "INSERT INTO cliente ( Nombre, Edad, Direccion ) VALUES ( '" . $Nombre . "' , '" . $edad  . "' , '" .  $direccion . "' )";
		$conn->exec($sql);

		$conn = null;		
	} catch (Exception $e) {
		echo "error" . $e;
	}	
}

?>
