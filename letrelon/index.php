<?php 
  $Admin = false;
 session_start();
if(isset($_SESSION['usuario'])){
    $sesion = $_SESSION['usuario']['Nombre'];
    $tipo = $_SESSION['usuario']['tipo'];
    $direccion = "logout";
    $icono = "out";


    if($tipo == 2){
    $Admin = true;

    }
 }
else{
    $sesion = "Iniciar sesion";
    $direccion = "login";
    $icono = "in";
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Letreros y lonas</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="recursos/js/jquery.min.js"></script>
  <script src="recursos/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="recursos/css/base.css">
  <link rel="stylesheet" href="recursos/css/bootstrap.min.css">
</head>
<body id = "a" background = "./recursos/images/malla.jpg">
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php?ver=inicio" style="padding-bottom: 0px;padding-top: 0px;">
        <img src="recursos/images/logo otro.png" alt="" width = "90" height= "50">
      </a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <?php if($Admin){ ?>
        <li class="active"><a href="index.php?ver=inicio">Inicio</a></li>
        <li><a href="index.php?ver=nosotros">Acerca de nosotros</a></li>
        <li><a href="index.php?ver=administrar-productos">Administrar productos</a></li>
        <li><a href="index.php?ver=contactanos">Contactanos</a></li>
        <li><a href="index.php?ver=contactanos">Clientes</a></li>
        <li><a href="index.php?ver=contactanos">Ventas</a></li>


        <?php }else{ ?>
        <li class="active"><a href="index.php?ver=inicio">Inicio</a></li>
        <li><a href="index.php?ver=nosotros">Acerca de nosotros</a></li>
        <li><a href="index.php?ver=productos">Nuestros productos</a></li>
        <li><a href="index.php?ver=contactanos">Contactanos</a></li>
        <?php }?>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        
        <li><a href="index.php?ver=carrito"><span class="glyphicon glyphicon-shopping-cart"></span><span class="badge"><?php echo 0; ?></span></a></li>

        <li><a href="index.php?ver=<?php echo $direccion ?>"><span class="glyphicon glyphicon-log-<?php echo $icono ?>"></span> <?php echo $sesion ?></a></li>
      </ul>
    </div>
  </div>
</nav>
<?php 
  require_once 'modelos/router.php';
  require_once 'modelos/conexion.php';
 ?>

 <?php 
  $router = new Router();
  if(isset($_GET['ver'])){
    if ($_GET['ver'] == 'logout'){
      $_SESSION['usuario'] = null;
      $router->cargarVista('inicio');

    }
    else{
    $router->cargarVista($_GET['ver']);
    }
  } else {
    $router->cargarVista('inicio');
  }
  ?>
</body>
</html>
