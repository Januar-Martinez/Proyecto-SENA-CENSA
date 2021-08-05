<?php
    include 'conexionBD.php';
    include 'encabezado.php';

    echo "<h1>Bandas Musicales</h1>";

    $sql="select * from bandas;";

    $datos = $conexion ->query($sql);

	echo "
		<table class='table'>
		  <thead>
			<tr>
              <th scope='col'>#</th>
			  <th scope='col'>Nombre De La Banda</th>
			  <th scope='col'>Fecha De Creación</th>
              <th scope='col'>Fecha De Disolución</th>
              <th scope='col'>Pais De Origen</th>
              <th scope='col'>Actualizar</th>
              <th scope='col'>Eliminar</th>
			</tr>
		  </thead>
		  <tbody>
	";
    $i = 1;
	while($fila = $datos->fetch_array()):
        if($fila['fechaDisolucion']=='0000-00-00'):
            $fecha='Activa Actualmente';
        else:
            $fecha=$fila['fechaDisolucion'];
        endif;
        echo "
        <tr>
            <th scope='row'>$i</th>
            <td>$fila[nombre]</td>
            <td>$fila[fechaCreacion]</td>
            <td>$fecha</td>
            <td>$fila[paisOrigen]</td>
            <td>
                <a href='#'>
                    <button type='button' class='btn btn-light'>
                        <i class='fas fa-pen-square'></i>
                    </button>
                </a>
            </td>
            <td>
                <a href='#'>
                    <button type='button' class='btn btn-light'>
                        <i class='fas fa-trash-alt'></i>
                    </button>
                </a>
            </td>
        </tr>";
        $i++;
    endwhile;
    echo"
            </tbody>
        </table>
    ";

    echo "<h1>Albumes</h1>";

    $sql2="select a.nombre, a.fechaLanzamiento, b.nombre as banda 
    from albumes as a join albumBandas as ab
    on a.idAlbum = ab.idAlbum
    join bandas as b 
    on ab.idBanda = b.idBanda
    order by a.idAlbum;";

	$sqlConteo = "select count(a.nombre) as c from albumes as a 
	join albumBandas as ab on a.idAlbum = ab.idAlbum 
	join bandas as b on ab.idBanda = b.idBanda 
	group by a.idAlbum order by a.idAlbum;";

	$conteo = $conexion ->query($sqlConteo) or die("error interno");
	
	while($fila = $conteo->fetch_array()):
		$conteoAlbum[] = $fila['c'];
	endwhile;
	
	$album_anterior="";

    $datos2 = $conexion ->query($sql2);

	echo "
		<table class='table'>
		  <thead>
			<tr>
              <th scope='col'>#</th>
			  <th scope='col'>Nombre Del Álbum</th>
			  <th scope='col'>Fecha De Lanzamiento</th>
              <th scope='col'>Banda Musical</th>
			</tr>
		  </thead>
		  <tbody>
	";
    $n=1;
	$a=0;
    while($fila = $datos2->fetch_array()):
       
	   
	   if($album_anterior!=$fila['nombre']):

			$j = $conteoAlbum[$a];
			echo "<tr>
					<th scope='row'>$n</th>
					<td rowspan='$j'> $fila[nombre]</td>
					<td rowspan='$j'>$fila[fechaLanzamiento]</td>
					<td>$fila[banda]</td>
				</tr>";
				$a++;
		else:
			echo "<tr>
					<th scope='row'>$n</th>
					<td>$fila[banda]</td>
				</tr>
			";		

		endif;

		$album_anterior	=$fila['nombre'];
        $n++;
    endwhile;
    echo"
            </tbody>
        </table>
    ";   
    
    echo "<h1>Músicos</h1>";

    $sql3="select m.nombre as musico, m.direccion, m.telefono, m.edad, b.nombre 
    from musicos as m join bandasMusico as bm
    on m.idMusico = bm.idMusico
    join bandas as b
    on bm.idBanda = b.idBanda
    ORDER BY m.idMusico;";
	
	$sqlConteo2 = "select count(m.nombre) as m
    from musicos as m join bandasMusico as bm
    on m.idMusico = bm.idMusico
    join bandas as b
    on bm.idBanda = b.idBanda
    GROUP BY m.idMusico
    ORDER BY m.idMusico";

	$conteo2 = $conexion ->query($sqlConteo2) or die("error interno");
	
	while($fila = $conteo2->fetch_array()):
		$conteoMusico[] = $fila['m'];
	endwhile;
	
	$musico_anterior="";

    $datos3 = $conexion ->query($sql3);

    echo "
    <table class='table'>
      <thead>
        <tr>
          <th scope='col'>#</th>
          <th scope='col'>Nombre Del Músico</th>
          <th scope='col'>Dirección</th>
          <th scope='col'>Teléfono</th>
          <th scope='col'>Edad</th>
          <th scope='col'>Banda</th>
        </tr>
      </thead>
      <tbody>
    ";

    $l=1;
	$b=0;
    while($fila = $datos3->fetch_array()):
	   if($musico_anterior!=$fila['musico']):
		   $c = $conteoMusico[$b];
			echo "
				<tr>
					<th scope='row'>$l</th>
					<td rowspan='$c'>$fila[musico]</td>
					<td rowspan='$c'>$fila[direccion]</td>
					<td rowspan='$c'>$fila[telefono]</td>
					<td rowspan='$c'>$fila[edad]</td>
					<td>$fila[nombre]</td>
				</tr>";
			$b++;
		else:
			echo "<tr>
					<th scope='row'>$l</th>
					<td>$fila[nombre]</td>
				</tr>
			";			
		endif;
		$musico_anterior =$fila['musico'];
        $l++;
    endwhile;
    echo"
            </tbody>
        </table>
    ";  

    
    include 'piePagina.php';
?>