<br><br>
<div class="container">

  


<div class="row">

 <div class=" col-xs-12 col-lg-4 col-md-4 col-sm-6">
  <form>
    
  </form>
</div>

  <?php 
    try {
      
      $con = new Conexion();
      $conn = $con->getCon();

      $sql = 'SELECT * FROM productos order by idProducto desc';
        
      foreach ($conn->query($sql) as $row) {
         $idProducto = $row['idProducto'];
         $Nombre = $row['Nombre'];
         $Descripcion = $row['Descripcion'];
         $Precio = $row['Precio'];
         $imagen = $row['Imagen'];
         ?>
  
    <div class=" col-xs-12 col-lg-4 col-md-4 col-sm-6">
      <div class="panel panel-primary">
        <div class="panel-heading"><?php echo $Nombre; ?></div>
        <div class="panel-body"><img src="<?php echo 'vistas/' . $imagen;?>" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer">
          <?php echo $Descripcion . " " .  $Precio . "$"; ?><a href="../letrelon/controladores/carrito.php?idProd=<?php echo $idProducto; ?>" class="btn btn-success" role="button">Agregar al carrito</a>
        </div>
      </div>
    </div>

        <?php
       }}
    catch (Exception $e) {
      echo "error" . $e;
    } 
  ?>

</div><br>