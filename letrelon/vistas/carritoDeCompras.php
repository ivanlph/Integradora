
<div class="container">

  <h2>Carrito de compras</h2>
         
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

      if(isset($_SESSION['carrito']))
      {


        include './controladores/carrito.php';

        for ($i=0; $i < count ($carrito); $i++) {

        ?>

        <tr>
          <td><?php echo $carrito [$i]['nombre']; ?></td>
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
}
else {



?>

<center><h2>Aun no agregas productos a tu carrito</h2></center>

<?php

}
      


?>






    </tbody>



  </table>
</div>