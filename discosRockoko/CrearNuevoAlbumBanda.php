<?php
    include 'conexionBD.php';
    include 'encabezado.php';

    $sql= "select * from albumes;";
    $sql2= "select * from bandas;";

    $albumes= $conexion ->query($sql) or die("error interno #1");
    $bandas= $conexion ->query($sql2) or die("error interno #2");

    echo
    "
        <h1>Agregar album/Banda</h1>
        <form class='row g-3' action='nuevoAlbumBanda.php' method='POST'>
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
                <label for='txtbanda' class='form-label'>Nombre de la banda</label>
                <select name='txtbanda'>
    ";
                while($fila2 = $bandas->fetch_array()):
                    echo"<option value='$fila2[idBanda]'>$fila2[nombre]</option>";
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