<?php
////////////////////////// Conexion a la base de datos /////////////////////////////////////
    $con = new Conexion();
    $conn = $con->getCon();
///////////////////////// Variables de consulta ////////////////////////////////////////////

    $where = "";


    
    if(isset($_POST['Nombre'])){
      $filtroxNom = $_POST['Nombre'];
      $filtroxCat = $_POST['Categoria'];
      if(empty($_POST['Categoria'])){
        $where = "WHERE Descripcion like '". $filtroxNom ."%'";
      }
      else if(empty($_POST['Nombre'])){
      $where = "WHERE Categoria like '". $filtroxCat ."'";        
      }

      else{

        $where = "WHERE Descripcion like '". $filtroxNom ."%' and Categoria like '". $filtroxCat ."'";

      }




    }

//////////////////////// Consulta a la base de datos ///////////////////////////////////////
    $sql = 'SELECT * FROM productos '.$where.' order by idProducto desc';
    $cbox = 'SELECT * FROM productos  group by Categoria';

?>

<br><br>
<div class="container">
<div class="row">
 <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12">
  <form method = "post" class = "form-inline">
      <select class="form-control" type = "submit" name="Categoria">
        <option value = "">Categoría</option>
        <?php
          foreach ($conn->query($cbox) as $row) {
            echo '<option value = "'.$row['Categoria'].'">'.$row['Categoria'].'</option>';
          }
        ?>
      </select>
      <div class="input-group">
        <input name = "Nombre" type="text" class="form-control" placeholder="Buscar">
        <div class="input-group-btn">
          <button class="btn btn-default" type="submit">
            <i class="glyphicon glyphicon-search"></i>
          </button>
        </div>
      </div>
  </form><br>
</div></div>
<div class="row">
<?php 
  try {
         
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
            <p>
              <?php echo $Descripcion; ?><h6><b><?php echo   $Precio . "$"; ?><br></b></h6>
            </p>
            <center>
              <a href="../letrelon/controladores/carrito.php?idProd=<?php echo $idProducto; ?>" class="btn btn-success" role="button">Agregar al carrito</a>
            </center>
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