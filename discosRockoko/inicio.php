<?php
    include 'conexionBD.php';
    include 'encabezado.php';
    echo "<h1>Álbumes</h1>";
    
    $sql = "select a.idAlbum, a.nombre, a.fechaLanzamiento, t.descripcion as canciones, b.nombre as bandas from 
    bandas as b join albumbandas as ab 
    on b.idBanda = ab.idBanda
    join albumes as a
    on ab.idAlbum = a.idAlbum
    join albumcanciones as ac
    on a.idAlbum = ac.idAlbum
    join titulocanciones as t
    on ac.idTitulo = t.idTitulo
	order by a.idAlbum;";
	
	$sqlConteo= "select count(a.idAlbum) as c,a.idAlbum from bandas as b join albumbandas as ab on b.idBanda = ab.idBanda join albumes as a on ab.idAlbum = a.idAlbum join albumcanciones as ac on a.idAlbum = ac.idAlbum join titulocanciones as t on ac.idTitulo = t.idTitulo group by a.idAlbum order by a.idAlbum;";
	$conteos = $conexion ->query($sqlConteo);
	while($fila = $conteos->fetch_array()):
		$conteoCanciones[] = $fila['c'];
	endwhile;
	
	$album_anterior="";


	$datos = $conexion ->query($sql);
	//var_dump($conteoCanciones);
	echo "
		<table class='table'>
		  <thead>
			<tr>
			  <th scope='col'>Nombre album</th>
			  <th scope='col'>Fecha De Lanzamiento</th>
			  <th scope='col'>Canciones</th>
			  <th scope='col'>Bandas</th>
			</tr>
		  </thead>
		  <tbody>

	";	
	
	$i=0;
	
	while($fila = $datos->fetch_array()):
		if($album_anterior!=$fila['nombre']):
		
			$j = $conteoCanciones[$i];
				echo "<tr>
						<td rowspan='$j'> $fila[nombre]</td>
						<td rowspan='$j'>$fila[fechaLanzamiento]</td>
						<td>$fila[canciones]</td>
						<td>$fila[bandas]</td>
					</tr>";
					$i++;
			else:
				echo "<tr>
						
						<td>$fila[canciones]</td>
						<td>$fila[bandas]</td>
					</tr>";		
				
			endif;
	
			$album_anterior	=$fila['nombre'];				
	endwhile;
	
	
	
    include 'piePagina.php';
?>