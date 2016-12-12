<?php

		include './modelos/conexion.php';
		$con = new Conexion();	    
	
	class producto {

		public function __construct(){

		$this->con = new Conexion();
		$this->con = $this->con->getCon();
	}

	public	function eliminarProducto($idProducto){
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
		}

		function agregarProducto(){

	
			$Nombre = $_POST['usuario'];
			$edad = $_POST['edad']; 
			$direccion = $_POST['direccion']; 
			 

			$uploadedfileload="true";
			$uploadedfile_size=$_FILES['uploadedfile'][size];
			echo $_FILES[uploadedfile][name];
			if ($_FILES[uploadedfile][size]>200000){
				$msg=$msg."El archivo es mayor que 200KB, debes reducirlo antes de subirlo<BR>";
				$uploadedfileload="false";
			}

			if (!($_FILES[uploadedfile][type] =="image/pjpeg" OR $_FILES[uploadedfile][type] =="image/gif")){
				$msg=$msg." Tu archivo tiene que ser JPG o GIF. Otros archivos no son permitidos<BR>";
				$uploadedfileload="false";
			}

			$file_name=$_FILES[uploadedfile][name];
			$add="../recursos/images/" . $file_name;

			move_uploaded_file ($_FILES[uploadedfile][tmp_name], $add);


			$sql = "INSERT INTO `productos`( `Nombre`, `Descripcion`, `Precio` , `Imagen`) VALUES ('$Nombre', '$direccion','$edad','$add' )";
			$con->exec($sql);

			$conn = null;

			header("Location: ../index.php?ver=administrar-productos");
			echo "alerta();";
		 
		}

		function obtenerProducto(){
			
			try {	
				$sql = 'SELECT * FROM productos order by idProducto desc';
        
		      	foreach ($conn->query($sql) as $row) {
		        	$idProducto = $row['idProducto'];
		         	$Nombre = $row['Nombre'];
		         	$Descripcion = $row['Descripcion'];
		         	$Precio = $row['Precio'];
		         	$imagen = $row['Imagen'];
		         ?>
		  
			    <div class="col-xs-12 col-lg-4 col-md-4 col-sm-6">
			      <div class="panel panel-primary">
			        <div class="panel-heading" name "<?php echo $idProducto ?>"><?php echo $Nombre; ?>
			          <a href="../letrelon/controladores/eliminarProductos.php?eliminar=<?php echo $idProducto; ?>" class="close" aria-label="close">&times;</a>
			        </div>
			        <div class="panel-body"><img src="<?php echo 'recursos/' . $imagen;?>" class="img-responsive" style="width:100%" alt="Image"></div>
			        <div class="panel-footer"><?php echo $Descripcion . " " .  $Precio . "$"; ?></div>
			      </div>
			    </div>

		        <?php
	    		}
	    	}
		    catch (Exception $e) {
      			echo "error" . $e;
    		} 
		}
	}
?>