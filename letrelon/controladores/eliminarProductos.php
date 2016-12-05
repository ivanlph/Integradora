<?php 
	require_once("../modelos/conexion.php");
	    
	    try {
		$prod = $_GET['eliminar'];
	    $sql = "DELETE FROM `productos` WHERE idProducto = " . $prod;

	    if ($conn->exec($sql)){
	    	$conn = null;
	      	header("Location: ../index.php?ver=administrar-productos");
	    }

	    $conn = null;
	    }
	      
	    catch (Exception $e) {
	      echo "error" . $e;
	     }
 ?>