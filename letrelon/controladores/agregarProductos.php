<?php
		require_once("../modelos/conexion.php");	// Llama al archivo que hace la conexion a la base de datos	
		try {
			$Nombre = $_POST['usuario']; // captura el texto del input nombre
			$edad = $_POST['edad'];  //captura el texto del input precio
			$direccion = $_POST['direccion']; //captura el texto del input descripcion
			
			//codigo para guardar la imagen seleccionada en la base de datos y el servidor 

			$uploadedfileload="true";
			$uploadedfile_size=$_FILES['uploadedfile'][size];
			echo $_FILES[uploadedfile][name];
			if ($_FILES[uploadedfile][size]>200000)
			{$msg=$msg."El archivo es mayor que 200KB, debes reducirlo antes de subirlo<BR>";
			$uploadedfileload="false";}

			if (!($_FILES[uploadedfile][type] =="image/pjpeg" OR $_FILES[uploadedfile][type] =="image/gif"))
			{$msg=$msg." Tu archivo tiene que ser JPG o GIF. Otros archivos no son permitidos<BR>";
			$uploadedfileload="false";}

			$file_name=$_FILES[uploadedfile][name];
			$add="../recursos/images/" . $file_name;

			move_uploaded_file ($_FILES[uploadedfile][tmp_name], $add);

			// query para mandar los datos a la base de datos 

			$sql = "INSERT INTO `productos`( `Nombre`, `Descripcion`, `Precio` , `Imagen`) VALUES ('$Nombre', '$direccion','$edad','$add' )";
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

			// te redirecciona al index

			header("Location: ../index.php?ver=administrar-productos");
			echo "alerta();";
		}
		 catch (Exception $e) {
			echo "error" . $e;
		}			
?> 