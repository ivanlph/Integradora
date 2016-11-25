<?php
		require_once("conexion.php");		
		try {




			$Nombre = $_POST['usuario'];

			$edad = $_POST['edad'];

			$direccion = $_POST['direccion'];

			if ($_FILES["file"]["error"] > 0)
    			{
    			echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    			}
  			else
    			{   
    			if (file_exists("../images/" . $_FILES["file"]["name"]))
      				{
      				echo $_FILES["file"]["name"] . " already exists. ";
      				}
    			else
      				{
      				move_uploaded_file($_FILES["file"]["tmp_name"],
      				"../images/" . $_FILES["file"]["name"]);
      				echo "Stored in: " . "../images/" . $_FILES["file"]["name"];
      				$path = "../images/". basename($_FILES["file"]["name"]);
      				}
    			}

			$sql = "INSERT INTO `productos`( `Nombre`, `Descripcion`, `Precio` , `Imagen`) VALUES ('$Nombre', '$direccion','$edad','$path' )";
			$conn->exec($sql);

			$conn = null;
			?>
			<div class = "container" id = "hola">
	  			<div  class="alert alert-success fade in" id="alerta">
   			 	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
   		 		<strong>Usuario agregado correctamente!</strong>
				</div>
			</div>
			<?php
			echo "alerta();";
			header("Location: ../php/altasProductos.php");
		}
		 catch (Exception $e) {
			echo "error" . $e;
		}			
?> 