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

    echo "<h1>Bandas Musicales</h1>";

    $sql2="select b.idBanda, b.nombre as banda, b.fechaCreacion, b.fechaDisolucion, b.paisOrigen, a.nombre as album 
    from bandas as b join albumbandas as ab
    on b.idBanda = ab.idBanda
    join albumes as a
    on ab.idAlbum = a.idAlbum
    order by b.idBanda;";

    $datos2 = $conexion ->query($sql2);

	echo "
		<table class='table'>
		  <thead>
			<tr>
              <th scope='col'>#</th>
			  <th scope='col'>Nombre De La Banda</th>
			  <th scope='col'>Fecha De Creación</th>
              <th scope='col'>Fecha De Disolución</th>
              <th scope='col'>Pais De Origen</th>
              <th scope='col'>Nombre De Álbum</th>
              <th scope='col'>Actualizar</th>
              <th scope='col'>Eliminar</th>
			</tr>
		  </thead>
		  <tbody>
	";
    $i = 1;
	while($fila = $datos2->fetch_array()):
        echo "
        <tr>
            <th scope='row'>$i</th>
            <td>$fila[banda]</td>
            <td>$fila[fechaCreacion]</td>
            <td>$fila[fechaDisolucion]</td>
            <td>$fila[paisOrigen]</td>
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
        $i++;
    endwhile;
    echo"
            </tbody>
        </table>
    ";

    echo "<h1>Albumes</h1>";

    $sql3="select * from albumes;";

    $datos3 = $conexion ->query($sql3);

	echo "
		<table class='table'>
		  <thead>
			<tr>
              <th scope='col'>#</th>
			  <th scope='col'>Nombre Del Álbum</th>
			  <th scope='col'>Fecha De Lanzamiento</th>
              <th scope='col'>Actualizar</th>
              <th scope='col'>Eliminar</th>
			</tr>
		  </thead>
		  <tbody>
	";

    while($fila = $datos3->fetch_array()):
        echo "
        <tr>
            <th scope='row'>$fila[idAlbum]</th>
            <td>$fila[nombre]</td>
            <td>$fila[fechaLanzamiento]</td>
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
    
    echo "<h1>Músicos</h1>";

    $sql4="select m.nombre as musico, m.direccion, m.telefono, m.edad, inm.descripcion 
    from musicos as m join instrumentosmusico as im
    on m.idMusico = im.idMusico
    join instrumentosmusicales inm
    on im.idInstrumento = inm.idInstrumento;";

    $datos4 = $conexion ->query($sql4);

    echo "
    <table class='table'>
      <thead>
        <tr>
          <th scope='col'>#</th>
          <th scope='col'>Nombre Del Músico</th>
          <th scope='col'>Dirección</th>
          <th scope='col'>Teléfono</th>
          <th scope='col'>Edad</th>
          <th scope='col'>Instrumento</th>
          <th scope='col'>Actualizar</th>
          <th scope='col'>Eliminar</th>
        </tr>
      </thead>
      <tbody>
    ";

    $j=1;
    while($fila = $datos4->fetch_array()):
        echo "
        <tr>
            <th scope='row'>$j</th>
            <td>$fila[musico]</td>
            <td>$fila[direccion]</td>
            <td>$fila[telefono]</td>
            <td>$fila[edad]</td>
            <td>$fila[descripcion]</td>
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
        $j++;
    endwhile;
    echo"
            </tbody>
        </table>
    ";  

    
    include 'piePagina.php';
?>