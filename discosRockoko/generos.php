<?php
    include 'conexionBD.php';
    include 'encabezado.php';

    echo "<h1>Generos Musicales</h1>";
    
    $sql = "select g.descripcion, b.nombre from generosMusicales as g join bandasgenero as bg
    on g.idGenero = bg.idGenero
    join bandas as b
    on bg.idBanda = b.idBanda
    ORDER BY g.idGenero;";

	$sqlConteo = "select count(g.descripcion) as g from generosMusicales as g join bandasgenero as bg
    on g.idGenero = bg.idGenero
    join bandas as b
    on bg.idBanda = b.idBanda
    GROUP by g.idGenero
    ORDER BY g.idGenero;";

	$conteo = $conexion ->query($sqlConteo) or die("error interno");
	
	while($fila = $conteo->fetch_array()):
		$conteoGenero[] = $fila['g'];
	endwhile;
	
	$genero_anterior="";	

    $datos = $conexion ->query($sql);

	echo "
		<table class='table'>
		  <thead>
			<tr>
              <th scope='col'>#</th>
			  <th scope='col'>Nombre Del Genero</th>
			  <th scope='col'>Nombre De La Banda</th>
			</tr>
		  </thead>
		  <tbody>
	";
    $i=1;
    $a=0;
	while($fila = $datos->fetch_array()):
        if($genero_anterior!=$fila['descripcion']):
            $j = $conteoGenero[$a];
            echo "
            <tr>
                <th scope='row'>$i</th>
                <td rowspan='$j'>$fila[descripcion]</td>
                <td>$fila[nombre]</td>
            </tr>";
            $a++;
        else:
			echo "<tr>
					<th scope='row'>$i</th>
					<td>$fila[nombre]</td>
				</tr>
			";
        endif;
        $genero_anterior =$fila['descripcion'];
        $i++;
    endwhile;
    echo"
            </tbody>
        </table>
    ";



    include 'piePagina.php';
?>