<?php
		require_once("conexion.php");		
		try {
			$Nombre = $_POST['usuario'];
			$edad = $_POST['edad'];
			$direccion = $_POST['direccion'];
			

			$uploadedfileload="true";
			$uploadedfile_size=$_FILES['uploadedfile'][size];
			echo $_FILES[uploadedfile][name];
			if ($_FILES[uploadedfile][size]>200000)
			{$msg=$msg."El archivo es mayor que 200KB, debes reduzcirlo antes de subirlo<BR>";
			$uploadedfileload="false";}

			if (!($_FILES[uploadedfile][type] =="image/pjpeg" OR $_FILES[uploadedfile][type] =="image/gif"))
			{$msg=$msg." Tu archivo tiene que ser JPG o GIF. Otros archivos no son permitidos<BR>";
			$uploadedfileload="false";}

			$file_name=$_FILES[uploadedfile][name];
			$add="../images/" . $file_name;

			move_uploaded_file ($_FILES[uploadedfile][tmp_name], $add);


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
			echo "alerta();";
			header("Location: ../php/productosAdmin.php");
		}
		 catch (Exception $e) {
			echo "error" . $e;
		}			
?> 