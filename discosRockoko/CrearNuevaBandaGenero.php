<?php
    include 'conexionBD.php';
    include 'encabezado.php';

    $sql= "select * from bandas;";
    $sql2= "select * from generosMusicales;";

    $bandas= $conexion ->query($sql) or die("error interno #1");
    $generos= $conexion ->query($sql2) or die("error interno #2");

    echo
    "
        <h1>Agregar Banda/Musico</h1>
        <form action='nuevoBandaGenero.php' method='POST'>
            <div>
                <label for='txtbanda' class='form-label'>Nombre de la banda</label>
                <select name='txtbanda'>
    ";
                while($fila = $bandas->fetch_array()):
                    echo"<option value='$fila[idBanda]'>$fila[nombre]</option>";
                endwhile;
    echo
    "
                </select>
            </div>
            <div>
                <label for='txtgeneros' class='form-label'>Nombre del generos</label>
                <select name='txtgeneros'>
    ";
                while($fila2 = $generos->fetch_array()):
                    echo"<option value='$fila2[idGenero]'>$fila2[descripcion]</option>";
                endwhile;
    echo
    "
                </select>
            </div>
            <div>
                <button type='submit' class='btn btn-primary'>Agregar</button>
            </div>
        </form>
    ";








    include 'piePagina.php';
?>