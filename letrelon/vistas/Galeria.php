<?php
$admin = false;
include '../letrelon/modelos/conexion.php';
////////////////////////// Conexion a la base de datos /////////////////////////////////////
if(isset($_SESSION['usuario'])){
 $admin = true;
}
    $con = new Conexion();
    $conn = $con->getCon();
    $sql = 'SELECT * FROM galeria';
?>
<div class="row">

<?php
    foreach ($conn->query($sql) as $row) {
       $imagen = $row['Imagen'];
       $idImagen = $row['idIMG'];

       if($admin == true){
          ?>
            <form class = "form" enctype="multipart/form-data" role = "form" method = "post" action = "./vistas/Galeria.php">
              <div class=" col-xs-12 col-lg-4 col-md-4 col-sm-6">
                <div class="panel panel-primary">
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
                      <center>
                      <button type="submit" class="btn btn-success btn-sm">Agregar Foto</button> 
                      </center>
                    </div>
                  </div>
                </div>
              </div>
          </form>
          <div class="col-xs-12 col-lg-4 col-md-4 col-sm-6">
            <div class="panel panel-primary">
                <a href="../letrelon/controladores/eliminarProductos.php?eliminar=<?php echo $idImagen; ?>" class="close" aria-label="close">&times;</a>
              </div>
              <div class="panel-body"><img src="<?php echo 'recursos/' . $imagen;?>" class="img-responsive" style="width:100%" alt="Image"></div>
            </div>
          </div>
<?php 
    }else{

?>
      <div class=" col-xs-6 col-lg-2 col-md-3 col-sm-4">
        <div class="panel panel-primary">
          <div class="panel-body"><img src="<?php echo 'vistas/' . $imagen;?>" class="img-responsive" style="width:100%" alt="Image"></div>
          </div>
        </div>
      </div>
      <?php
     }}
?>
</div><br>


<?php
if(isset($_POST['agregar'])){
      $con =  new Conexion();
      $con = $con->getCon();
      //codigo para guardar la imagen seleccionada en la base de datos y el servidor 

      $uploadedfileload="true";
      $uploadedfile_size=$_FILES['uploadedfile'][size];
      echo $_FILES[uploadedfile][name];
      if ($_FILES[uploadedfile][size]>200000)
      {$msg=$msg."El archivo es mayor que 200KB, debes reducirlo antes de subirlo<BR>";
      $uploadedfileload="false";}

      if (!($_FILES[uploadedfile][type] =="image/pjpeg" OR $_FILES[uploadedfile][type] =="image/gif"))
      {$msg=$msg." Tu archivo tiene que ser JPG o GIF. Otros archivos no son permitidos<BR>";
      $uploadedfileload="false";}

      $file_name=$_FILES[uploadedfile][name];
      $add="../recursos/images/galeria" . $file_name;

      move_uploaded_file ($_FILES[uploadedfile][tmp_name], $add);

      // query para mandar los datos a la base de datos 

      $sql = "INSERT INTO `galeria`( `Imagen` ) VALUES ('$add')";
      $con->exec($sql);

      $conn = null;}
      ?>