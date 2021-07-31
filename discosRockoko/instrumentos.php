<?php
    include 'conexionBD.php';
    include 'encabezado.php';

    echo "<h1>Instrumentos Musicales</h1>";
    
    $sql = "select im.descripcion, m.nombre from instrumentosMusicales as im join instrumentosMusico as inm
    on im.idInstrumento = inm.idInstrumento
    join musicos as m
    on inm.idMusico = m.idMusico;";

    $sqlConteo = "select count(im.descripcion) as ins from instrumentosMusicales as im join instrumentosMusico as inm
    on im.idInstrumento = inm.idInstrumento
    join musicos as m
    on inm.idMusico = m.idMusico
    GROUP by im.idInstrumento;";

	$conteo = $conexion ->query($sqlConteo) or die("error interno");
	
	while($fila = $conteo->fetch_array()):
		$conteoIns[] = $fila['ins'];
	endwhile;
	
	$instrumento_anterior="";	

    $datos = $conexion ->query($sql);

	echo "
		<table class='table'>
		  <thead>
			<tr>
              <th scope='col'>#</th>
			  <th scope='col'>Nombre Del Instrumento</th>
			  <th scope='col'>Nombre Del Musico</th>
			</tr>
		  </thead>
		  <tbody>
	";
    $i=1;
    $a=0;
	while($fila = $datos->fetch_array()):
        if($instrumento_anterior!=$fila['descripcion']):
            $j = $conteoIns[$a];
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
        $instrumento_anterior =$fila['descripcion'];	
        $i++;
    endwhile;
    echo"
            </tbody>
        </table>
    ";



    include 'piePagina.php';
?>