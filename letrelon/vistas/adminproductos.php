<br><br>
<div class="container">
<div class="row">

<form class = "form" enctype="multipart/form-data" role = "form" method = "post" action = "controladores/agregarProductos.php">
    
    <div class=" col-xs-12 col-lg-4 col-md-4 col-sm-6">
      <div class="panel panel-primary">
        <div class="panel-heading" style="padding-bottom: 2px; border-bottom-width: 0px;">
          <div class="form-group">
            <input type="text" name="usuario" placeholder = "Nombre" class="form-control input-sm" required = "">
          </div>
        </div>
        <div class="panel-body">
          <div class="form-group">
            <div class="containter">
              <center>
                <label class="control-label" style="color: #A09999;" for="Imagen">Cargar imagen</label>
                <input name="uploadedfile" type="file" />                
              </center>
            </div>
          </div>
        </div>
        <div class="panel-footer">
          <div class="form-group">
           <input type="text" placeholder = "Descripcion" name="direccion" class="form-control input-sm" required = "">
          </div>
          <div class="form-group">
            <input type="text" name="edad" placeholder = "Precio" class="form-control input-sm" required = "">
          </div>
          <div class="form-group">
            <center>
            <button type="submit" class="btn btn-success btn-sm">Agregar producto</button> 
            </center>
          </div>
        </div>
      </div>
    </div>
</form>

   

  <?php 

    $servername = "localhost";
    $username = "root";
    $password = "";


    try {
      $conn =  new PDO("mysql:host=$servername;dbname=letrelom", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

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
          <a href="eliminarProductos.php?eliminar=<?php echo $idProducto; ?>" class="close" aria-label="close">&times;</a>
        </div>
        <div class="panel-body"><img src="<?php echo 'recursos/' . $imagen;?>" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer"><?php echo $Descripcion . " " .  $Precio . "$"; ?></div>
      </div>
    </div>

        <?php
       }}
    catch (Exception $e) {
      echo "error" . $e;
    } 
 ?>
