<?php
    include 'conexionBD.php';
    include 'encabezado.php';

    echo "<h1>Instrumentos Musicales</h1>";
    
    $sql = "select im.descripcion, m.nombre from instrumentosmusicales as im join instrumentosmusico as inm
    on im.idInstrumento = inm.idInstrumento
    join musicos as m
    on inm.idMusico = m.idMusico;";

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
	while($fila = $datos->fetch_array()):
        echo "
        <tr>
            <th scope='row'>$i</th>
            <td>$fila[descripcion]</td>
            <td>$fila[nombre]</td>
        </tr>";
        $i++;
    endwhile;
    echo"
            </tbody>
        </table>
    ";



    include 'piePagina.php';
?>