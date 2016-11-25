<?php//select productos
    $sql = 'SELECT Nombre, Descripcion, Precio FROM productos';
    
    foreach ($conn->query($sql) as $row) {
        $Nombre = $row['Nombre'];
        $Descripcion = $row['Descripcion'];
        $Precio = $row['Precio'];        
?>