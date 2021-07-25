<?php
    include 'conexionBD.php';
    include 'encabezado.php';

    echo "<h1>Generos Musicales</h1>";
    
    $sql = "select g.descripcion, b.nombre from generosmusicales as g join bandasgenero as bg
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
              <th scope='col'>Actualizar</th>
              <th scope='col'>Eliminar</th>
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



    include 'piePagina.php';
?>