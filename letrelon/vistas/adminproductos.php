<?php 
if(isset($_SESSION['usuario'])){

    $tipo = $_SESSION['usuario']['tipo'];

    if($tipo == 2){
    header('./index.php?ver=productos');

    }
 }
 else{
    header('./index.php?ver=productos');
 }
?>

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
            <select class="form-control input-sm" name = "categoria">
              <option value = "">Categoría</option>
              <option value = "lona">Lonas</option>
              <option value = "malla">Mallas</option>
              <option value = "calca">Calcomanías</option>
              <option value = "Camisetas">Camisetas</option>
              <option value = "Gorras">Gorras</option>
              <option value = "tabloide">Tabloides</option>
              <option value = "tarjetas">Tarjetas</option>
              <option value = "monederos">Monederos</option>
            </select>
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



    try {
      $con =  new Conexion();
      $conn = $con->getCon();

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
       }}
    catch (Exception $e) {
      echo "error" . $e;
    } 
 ?>