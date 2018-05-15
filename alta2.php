<?php
    $mysql=new mysqli("localhost","iutw","iutw","iutw");

    if ($mysql->connect_error)
	  die("Problemas con la conexión a la base de datos");

    $mysql->query("insert into articulos(descripcion,precio,codigorubro)
        values ('$_REQUEST[descripcion]',$_REQUEST[precio],$_REQUEST[codigorubro])") or
      die($mysql->error);

    $mysql->close();

    header('Location:index.php');
?>
