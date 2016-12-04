<?php 
	class productos {

		$idProd = isset($_GET['eliminar']);

		function eliminarProductos($idProd){


		require_once("../modelos/conexion.php");
		    
		    try {

		      $idProd = $_GET['eliminar'];

		      $sql = 'DELETE FROM `productos` WHERE idProducto = $idProd';
		      $conn->exec($sql);

		      $conn = null;

		      header("Location: ../index.php?ver=administrar-productos");
		      
		      }
		      
		    catch (Exception $e) {
		      echo "error" . $e;
		     }
		    }
		  }
		}
 ?>