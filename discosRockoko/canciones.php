<?php
    include 'conexionBD.php';
    include 'encabezado.php';

    echo "<h1>Canciones</h1>";
    
    $sql = "select t.idtitulo, t.descripcion as cancion, a.nombre as album 
    from tituloCanciones as t join albumCanciones as ac 
    on t.idTitulo = ac.idTitulo
    join albumes as a
    on ac.idAlbum = a.idAlbum order by a.idAlbum;";

	$sqlConteo = "select count(a.nombre) as a
    from tituloCanciones as t join albumCanciones as ac 
    on t.idTitulo = ac.idTitulo
    join albumes as a
    on ac.idAlbum = a.idAlbum
    GROUP BY a.idAlbum
    order by a.idAlbum;";

	$conteo = $conexion ->query($sqlConteo) or die("error interno");
	
	while($fila = $conteo->fetch_array()):
		$conteoCancion[] = $fila['a'];
	endwhile;
	
	$album_anterior="";	

    $datos = $conexion ->query($sql);

	echo "
		<table class='table'>
		  <thead>
			<tr>
              <th scope='col'>#</th>
			  <th scope='col'>Nombre De Canción</th>
			  <th scope='col'>Nombre Del Álbum</th>
			</tr>
		  </thead>
		  <tbody>
	";
	$a=0;
	while($fila = $datos->fetch_array()):
	   if($album_anterior!=$fila['album']):
			$j = $conteoCancion[$a];
            echo "
            <tr>
                <th scope='row'>$fila[idtitulo]</th>
                <td>$fila[cancion]</td>
                <td rowspan='$j'>$fila[album]</td>
            </tr>";
			$a++;
		else:
			echo "<tr>
					<th scope='row'>$fila[idtitulo]</th>
					<td>$fila[cancion]</td>
				</tr>
			";		

		endif;
		$album_anterior	=$fila['album'];
    endwhile;
    echo"
            </tbody>
        </table>
    ";
    
    include 'piePagina.php';
?>