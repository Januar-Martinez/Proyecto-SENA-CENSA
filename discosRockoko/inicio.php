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
        echo "
        <tr>
            <th scope='row'>$i</th>
            <td>$fila[nombre]</td>
            <td>$fila[fechaCreacion]</td>
            <td>$fila[fechaDisolucion]</td>
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
    from albumes as a join albumbandas as ab
    on a.idAlbum = ab.idAlbum
    join bandas as b 
    on ab.idBanda = b.idBanda
    order by a.idAlbum;";

    $datos2 = $conexion ->query($sql2);

	echo "
		<table class='table'>
		  <thead>
			<tr>
              <th scope='col'>#</th>
			  <th scope='col'>Nombre Del Álbum</th>
			  <th scope='col'>Fecha De Lanzamiento</th>
              <th scope='col'>Banda Musical</th>
              <th scope='col'>Actualizar</th>
              <th scope='col'>Eliminar</th>
			</tr>
		  </thead>
		  <tbody>
	";
    $n=1;
    while($fila = $datos2->fetch_array()):
        echo "
        <tr>
            <th scope='row'>$n</th>
            <td>$fila[nombre]</td>
            <td>$fila[fechaLanzamiento]</td>
            <td>$fila[banda]</td>
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
        $n++;
    endwhile;
    echo"
            </tbody>
        </table>
    ";   
    
    echo "<h1>Músicos</h1>";

    $sql3="select m.nombre as musico, m.direccion, m.telefono, m.edad, b.nombre 
    from musicos as m join bandasmusico as bm
    on m.idMusico = bm.idMusico
    join bandas as b
    on bm.idBanda = b.idBanda;";

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
          <th scope='col'>Actualizar</th>
          <th scope='col'>Eliminar</th>
        </tr>
      </thead>
      <tbody>
    ";

    $j=1;
    while($fila = $datos3->fetch_array()):
        echo "
        <tr>
            <th scope='row'>$j</th>
            <td>$fila[musico]</td>
            <td>$fila[direccion]</td>
            <td>$fila[telefono]</td>
            <td>$fila[edad]</td>
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
        $j++;
    endwhile;
    echo"
            </tbody>
        </table>
    ";  

    
    include 'piePagina.php';
?>