<?php 

  if(isset($_SESSION['carrito'])){

    if(isset($_GET['idProd'])){
      $id = $_GET['idProd'];
    }
      
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

  }

  else{

    if (isset($_GET['idProd'])) {


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
        header("Location: ./index.php?ver=carrito");

    }

    
  }

#   echo "<center><h2>Error inesperado</h2></center>"
  

 ?>
<br><br>
<div class="container" style="background-color: #212121;">

  <h2>Carrito de compras</h2>
      <?php 
      $total = 0;
      if(isset($_SESSION['carrito'])){
        $carrito = $_SESSION['carrito'];
        ?>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Nombre del producto</th>
              <th>Precio initario</th>
              <th>Cantidad</th>
              <th>Subtotal</th>
            </tr>
          </thead>
          <tbody>
            <?php
            for ($i=0; $i < count ($carrito); $i++) {
            ?>
              <div class="col-xs-12 col-lg-4 col-md-4 col-sm-6">
                <div class="panel panel-primary">
                  <div class="panel-heading" name "<?php echo $carrito [$i]['IDProd'] ?>"><?php echo $carrito [$i]['nombre']; ?>
                    <a href="../letrelon/controladores/eliminarProductos.php?eliminar=<?php echo $carrito [$i]['IDProd'] ?>" class="close" aria-label="close">&times;</a>
                  </div>
                  <div class="panel-body"><img src="<?php echo 'recursos/' . $carrito [$i]['Imagen']?>" class="img-responsive" style="width:100%" alt="Image"></div>
                  <div class="panel-footer"><?php echo $carrito [$i]['descripcion'] . " " .  $carrito [$i]['precio'] . "$"; ?></div>
                </div>
              </div>
              <tr>
                <td></td>
                <td><?php echo $carrito [$i]['precio']; ?></td>
                <td><?php echo $carrito [$i]['Cantidad']; ?></td>
                <td><?php echo $carrito [$i]['precio'] * $carrito [$i]['Cantidad']; ?></td>
              </tr>
              <?php
            }
            ?>
      <tr>
        <td><a href="">Catalogo</a></td>
        <td><a href="">Actualizar</a></td>
        <td><a href="">Vaciar carrito</a></td>
      </tr>
    <?php 
    }else{
      ?>
      <center>
        <h2>Aun no agregas productos a tu carrito</h2>
      </center>
      <?php
    }
    ?>
    </tbody>
  </table>
</div>