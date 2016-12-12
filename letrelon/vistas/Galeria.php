<?php
////////////////////////// Conexion a la base de datos /////////////////////////////////////
    $con = new Conexion();
    $conn = $con->getCon();

    }

    $sql = 'SELECT * FROM galeria';

?>
<div class="row">
<?php 
  try {
         
    foreach ($conn->query($sql) as $row) {
       $imagen = $row['Images'];
       ?>
      <div class=" col-xs-6 col-lg-2 col-md-3 col-sm-4">
        <div class="panel panel-primary">
          <div class="panel-body"><img src="<?php echo 'vistas/' . $imagen;?>" class="img-responsive" style="width:100%" alt="Image"></div>
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