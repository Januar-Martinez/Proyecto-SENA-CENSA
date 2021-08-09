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
   
	while($fila = $datos->fetch_array()):
        if($fila['fechaDisolucion']=='0000-00-00'):
            $fecha='Activa Actualmente';
        else:
            $fecha=$fila['fechaDisolucion'];
        endif;
        echo "
        <tr>
            <th scope='row'>$fila[idBanda]</th>
            <td>$fila[nombre]</td>
            <td>$fila[fechaCreacion]</td>
            <td>$fecha</td>
            <td>$fila[paisOrigen]</td>
            <td>
                <a href='#'>
                    <button type='button' class='btn btn-light' data-bs-toggle='modal' data-bs-target='#ventanaActualizar$fila[idBanda]'>
                        <i class='fas fa-pen-square'></i>
                    </button>
                </a>
            </td>
            <td>
                <a href='#'>
                    <button type='button' class='btn btn-light' data-bs-toggle='modal' data-bs-target='#ventanaEliminar$fila[idBanda]'>
                        <i class='fas fa-trash-alt'></i>
                    </button>
                </a>
            </td>
        </tr>";

        echo
        "
            <!-- Modal Eliminar -->
            <div class='modal fade' id='ventanaEliminar$fila[idBanda]' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
            <div class='modal-dialog'>
                <div class='modal-content'>
                <div class='modal-header'>
                    <h5 class='modal-title' id='exampleModalLabel'>Borra Banda</h5>
                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                </div>
                <div class='modal-body'>
                    ¿Esta Seguro Que desea Eliminar a la banda con nombre $fila[nombre]?
                </div>
                <div class='modal-footer'>
                    <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>No</button>
                    <form action='eliminarBanda.php' method='post'>
                        <input type ='hidden' name='txtidBorrar' value = $fila[idBanda]>
                        <button type='submit' class='btn btn-primary'>Si</button>
                    </form>
                </div>
                </div>
            </div>
            </div>
    
            <!-- Modal Actualizar -->
            <div class='modal fade' id='ventanaActualizar$fila[idBanda]' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
            <div class='modal-dialog'>
              <div class='modal-content'>
                <div class='modal-header'>
                  <h5 class='modal-title' id='exampleModalLabel'>Actualizar Banda</h5>
                  <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                </div>
                <div class='modal-body'>
                  <form action='actualizarBanda.php' method='post'>
                      <div class='mb-3'>
                        <label for='txtIDNuevo' class='form-label'>Identificador</label>			  
                        <input type='text' name='txtIDNuevo' value = $fila[idBanda] class='form-control' id='txtid' required>
                      </div>
                      <div class='mb-3'>
                        <label for='txtnombre' class='form-label'>Nombre</label>			  
                        <input type='text' name='txtnombre' value = $fila[nombre] class='form-control' id='txtnombre' required>
                      </div>
                      <div class='mb-3'>
                        <label for='txtfechaC' class='form-label'>Fecha De Creación (AAAA-MM-DD)</label>			  
                        <input type='text' name='txtfechaC' value = $fila[fechaCreacion] class='form-control' id='txtfechaC' required>
                      </div>
                      <div class='mb-3'>
                        <label for='txtfechaD' class='form-label'>Fecha De Disolución (AAAA-MM-DD)</label>			  
                        <input type='text' name='txtfechaD' value = $fila[fechaDisolucion] class='form-control' id='txtfechaD' required>
                      </div>
                      <div class='mb-3'>
                        <label for='txtpais' class='form-label'>Pais De Origen</label>			  
                        <input type='text' name='txtpais' value = $fila[paisOrigen] class='form-control' id='txtpais' required>
                      </div>
                </div>
                <div class='modal-footer'>
                      <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancelar</button>
                      <input type ='hidden' name='txtIdAnterior' value = $fila[idBanda]>
                      <button type='submit' class='btn btn-primary'>Actualizar</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        ";

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