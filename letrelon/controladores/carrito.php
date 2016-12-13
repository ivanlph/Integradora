<?php
	if(isset($_GET['idProd'])){
		$id = $_GET['idProd'];
		return $id;
		header("Location: ../index.php?ver=carrito");
	}

?>

<?php
	session_start();
	$existe = false;
	if(isset($_SESSION['carrito'])){

		$carrito = $_SESSION['carrito'];
		$existe = false;
		$posicion = 0;

		for ($i=0; $i < count ($carrito); $i++) {

			if ($carrito [$i]['IDProd'] == $id) {
				$existe = true;
				$pocicion = $i;
			}
		}
		if ($existe == true) {

			$carrito[$posicion]['Cantidad'] ++ ;
			$_SESSION['carrito'] = $carrito;
			header("Location: ../index.php?ver=carrito");
		}

		else{
			$id = $_GET['idProd'];
		}

	}

	else if($existe == false){
		include '../modelos/conexion.php';
		$con = new Conexion();
		$con = $con->getCon();
		
		$sql = "SELECT * FROM `productos` WHERE `idProducto` = " . $id;

		foreach ($con->query($sql) as $row) {

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
        return $carrito;
        header("Location: ./index.php?ver=carrito");

	}

#		echo "<center><h2>Error inesperado</h2></center>"
	

 ?>