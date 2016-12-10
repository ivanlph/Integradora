<?php
      include_once "../modelos/conexion.php";

      $con =  new Conexion();
      $con = $con->getCon();

      $Nombre = $_POST['nombre'];
      $usuario = $_POST['usuario'];
      $contrasena = $_POST['password'];
      $correo = $_POST['email'];
      $correocomp = $_POST['correocomp'];            

      $sql = "INSERT INTO `usuarios`( `Nombre`, `usuario`, `password` , `email`) 
      VALUES ('$Nombre', '$usuario','$contrasena','$correo' )";
        if($con->exec($sql)){
    
          $conn = null;
          header("Location: ../index.php?ver=login");
        }

        else{
          return "<h2><b>Usuario ya existe</b></h2>";
          header("Location: ../index.php?ver=signup");
        }
?>

    