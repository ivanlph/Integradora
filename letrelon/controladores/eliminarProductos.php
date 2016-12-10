<?php 
	require_once("../modelos/conexion.php");
	    
		$con = new Conexion();
		$con = $con->getCon();

	    try {
		$prod = $_GET['eliminar'];
	    $sql = "DELETE FROM `productos` WHERE idProducto = " . $prod;

	    if ($con->exec($sql)){
	    	$con = null;
	      	header("Location: ../index.php?ver=administrar-productos");
	    }

	    $conn = null;
	    }
	      
	    catch (Exception $e) {
	      echo "error" . $e;
	     }
 ?>