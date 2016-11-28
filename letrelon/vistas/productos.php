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
        <div class="panel-body"><img src="<?php echo 'vistas/' . $imagen;?>" class="img-responsive" style="width:100%" alt="Image"></div>
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