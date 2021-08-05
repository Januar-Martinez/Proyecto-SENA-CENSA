<?php
    include 'conexionBD.php';
    include 'encabezado.php';

    $sql= "select * from albumes;";
    $sql2= "select * from tituloCanciones;";

    $albumes= $conexion ->query($sql) or die("error interno #1");
    $Canciones= $conexion ->query($sql2) or die("error interno #2");

    echo
    "
        <h1>Agregar album/Cancion</h1>
        <form class='row g-3' action='nuevoAlbumCancion.php' method='POST'>
            <div class='col-md-6'>
                <label for='txtAlbum' class='form-label'>Nombre del Álbum</label>
                <select name='txtAlbum'>
    ";
                while($fila = $albumes->fetch_array()):
                    echo"<option value='$fila[idAlbum]'>$fila[nombre]</option>";
                endwhile;
    echo
    "
                </select>
            </div>
            <div class='col-md-6'>
                <label for='txtcancion' class='form-label'>Nombre de la cancion</label>
                <select name='txtcancion'>
    ";
                while($fila2 = $Canciones->fetch_array()):
                    echo"<option value='$fila2[idTitulo]'>$fila2[descripcion]</option>";
                endwhile;
    echo
    "
                </select>
            </div>
            <div class='col-md-12'>
                <button type='submit' class='btn btn-primary'>Agregar</button>
            </div>
        </form>
    ";








    include 'piePagina.php';
?>