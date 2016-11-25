<!DOCTYPE html>
<html lang="en">
<head>
	<title>Productos</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="../js/jquery.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../css/base.css">
  <link rel="stylesheet" href="../css/bootstrap.min.css">

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
<br><br>
<div class="container">
<div class="row">
  <?php 

       $servername = "localhost";
      $username = "root";
      $password = "";


      try {
        $conn =  new PDO("mysql:host=$servername;dbname=letrelom", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = 'SELECT Nombre, Descripcion, Precio, Imagen FROM productos';
        
        foreach ($conn->query($sql) as $row) {
            $Nombre = $row['Nombre'];
            $Descripcion = $row['Descripcion'];
            $Precio = $row['Precio'];
            $imagen = $row['Imagen'];
            ?>
  
    <div class=" col-xs-12 col-lg-4 col-md-4 col-sm-6">
      <div class="panel panel-primary">
        <div class="panel-heading"><?php echo $Nombre; ?></div>
        <div class="panel-body"><img src="<?php echo $imagen;?>" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer"><?php echo $Descripcion . " " .  $Precio . "$"; ?></div>
      </div>
    </div>
    <p></p>

        <?php
       }}
   catch (Exception $e) {
    echo "error" . $e;
  } 
  ?>
</div><br>
<div class="container">
  <a  style = "color:#8BC34A;" href="./altasProductos.php">Agregar</a>
</div>

</body>
</html>