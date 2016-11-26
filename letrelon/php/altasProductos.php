<!DOCTYPE html>
<html lang="en">

<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/base.css">
  <script src="../js/jquery.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Letrelon</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="../index.html">Inicio</a></li>
        <li><a href="#">Acerca de nosotros</a></li>
        <li class="active"><a href="./productos.php">Nuestros productos</a></li>
        <li><a href="#">Contactanos</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>
<br><br><br>
<div class="container">
	<div class="row">
		<div class="col-sm-4 col-md-4 col-xs-2"></div>
		<div class="col-sm-8 col-md-8 col-xs-10">
			<H1>Agregar productos</H1>
		</div>
		<div class="col-sm-4 col-md-4 col-xs-2"></div>
	</div>
	<form class = "form" enctype="multipart/form-data" role = "form" method = "post" action = "../crud/agregarProductos.php">
		<div class="form-group">
  			<label style="color: #A09999;">Nombre:</label>
  			<input type="text" name="usuario" class="form-control" required = "">
		</div>
		<div class="form-group">
    		<label style="color: #A09999;" for="Direccion">Descripcion:</label>
  			<input type="text" name="direccion" class="form-control" required = "">
		</div>
		<div class="form-group">
    		<label style="color: #A09999;" for="Edad">Precio:</label>
  			<input type="text" name="edad" class="form-control" required = "">
		</div>
		
		<div class="form-group">
			<label class="control-label" style="color: #A09999;" for="Imagen">Cargar imagen</label>
			<input name="uploadedfile" type="file" />
		</div>

		<div class="form-group">
			<button type="submit" class="btn btn-success">Agregar producto</button>	
		</div>
	</form>
		<br><br>
</div>	
</body>
</html>