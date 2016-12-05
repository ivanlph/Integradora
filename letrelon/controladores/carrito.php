<?php 

session_start();

	

	if(isset($_SESSION['carrito'])){

		$id = $_GET['idProd'];
		$carrito = $_SESSION['carrito'];
		$existe = false;
		$pocicion = 0;

		for ($i=0; $i < count ($carrito); $i++) {

			if ($carrito [$i]['IDProd'] == $id) {
				$existe = true;
				$pocicion = $i;
			}
		}

		if ($existe == true) {

			$carrito[$pocicion]['Cantidad'] ++ ;
			$_SESSION['carrito'] = $carrito;
			header("Location: ../index.php?ver=carrito");
		}
	


	}

	else{
		$id = $_GET['idProd'];
		include '../modelos/conexion.php';

		$sql = "SELECT * FROM `productos` WHERE `idProducto` = " . $id;

		foreach ($conn->query($sql) as $row) {

			$idProducto = $row['idProducto'];
    	    $Nombre = $row['Nombre'];
        	$Descripcion = $row['Descripcion'];
        	$Precio = $row['Precio'];
        	$imagen = $row['Imagen']; 
        }

        $carrito[] = array(
        	'IDProd' => $idProducto,
        	'nombre' => $Nombre,
        	'descripcion' => $Descripcion,
        	'precio' => $Precio, 
        	'Imagen' => $imagen,
        	'Cantidad' => 1 );

        $_SESSION['carrito'] = $carrito;
        header("Location: ../index.php?ver=carrito");

	}

		echo "<center><h2>Error inesperado</h2></center>"
	

 ?>