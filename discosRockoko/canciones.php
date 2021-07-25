<?php
    include 'conexionBD.php';
    include 'encabezado.php';

    echo "<h1>Canciones</h1>";
    
    $sql = "select t.idtitulo, t.descripcion as cancion, a.nombre as album 
    from titulocanciones as t join albumcanciones as ac 
    on t.idTitulo = ac.idTitulo
    join albumes as a
    on ac.idAlbum = a.idAlbum order by a.idAlbum;";

    $datos = $conexion ->query($sql);

	echo "
		<table class='table'>
		  <thead>
			<tr>
              <th scope='col'>#</th>
			  <th scope='col'>Nombre De Canción</th>
			  <th scope='col'>Nombre Del Álbum</th>
              <th scope='col'>Actualizar</th>
              <th scope='col'>Eliminar</th>
			</tr>
		  </thead>
		  <tbody>
	";
	
	while($fila = $datos->fetch_array()):
            echo "
            <tr>
                <th scope='row'>$fila[idtitulo]</th>
                <td>$fila[cancion]</td>
                <td>$fila[album]</td>
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
    endwhile;
    echo"
            </tbody>
        </table>
    ";
    
    include 'piePagina.php';
?>