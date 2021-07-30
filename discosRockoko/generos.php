<?php
    include 'conexionBD.php';
    include 'encabezado.php';

    echo "<h1>Generos Musicales</h1>";
    
    $sql = "select g.descripcion, b.nombre from generosMusicales as g join bandasgenero as bg
    on g.idGenero = bg.idGenero
    join bandas as b
    on bg.idBanda = b.idBanda;";

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