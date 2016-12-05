<br><br>
<div class="container">

  


<div class="row">
  <?php 

    $servername = "sql9.freemysqlhosting.net";
    $username = "sql9147877";
    $password = "a89gR3dXT1";


    try {
      $conn =  new PDO("mysql:host=$servername;dbname=sql9147877", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

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