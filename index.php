<!doctype html>
<html>
<head>
  <title>Listado de articulos</title>
 <link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>
<body>
 <?php
    $mysql=new mysqli("localhost","iutw","iutw","iutw");
    if ($mysql->connect_error)
	  die("Problemas con la conexión a la base de datos");
    $registros=$mysql->query("select     ar.codigo as codigoart,
                                         ar.descripcion as descripcionart,
                                         precio,
                                         ru.descripcion as descripcionrub 
                                      from articulos as ar
                                      inner join rubros as ru on ru.codigo=ar.codigorubro order by ar.descripcion asc") or
     die($mysql->error);

    echo '<table class="tablalistado">';
    echo '<tr><th>Codigo</th><th>Descripcion</th><th>Precio</th><th>Rubro</th><th>Borrar</th><th>Modificar</th></tr>';
    while ($reg=$registros->fetch_array()){
      echo '<tr>';
      echo '<td>';
      echo $reg['codigoart'];
      echo '</td>';
      echo '<td>';
      echo $reg['descripcionart'];
      echo '</td>'; 
      echo '<td>';
      echo $reg['precio'];	  
      echo '</td>';	  
      echo '<td>';
      echo $reg['descripcionrub'];	  
      echo '</td>';
      echo '<td>';
      echo '<a href="baja.php?codigo='.$reg['codigoart'].'">Borra?</a>';
      echo '</td>';
      echo '<td>';
      echo '<a href="modifica1.php?codigo='.$reg['codigoart'].'">Modifica?</a>';
      echo '</td>';      
      echo '</tr>';	  
    }	
    echo '<tr><td colspan="6">';
    echo '<a href="alta1.php">Agrega un nuevo articulo?</a>';
    echo '</td></tr>';
    echo '<table>';	
	
    $mysql->close();

?>  
</body>
</html>
