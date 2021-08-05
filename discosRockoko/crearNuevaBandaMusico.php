<?php
    include 'conexionBD.php';
    include 'encabezado.php';

    $sql= "select * from bandas;";
    $sql2= "select * from musicos;";

    $bandas= $conexion ->query($sql) or die("error interno #1");
    $musicos= $conexion ->query($sql2) or die("error interno #2");

    echo
    "
        <h1>Agregar Banda/Musico</h1>
        <form class='row g-3' action='nuevoBandaMusico.php' method='POST'>
            <div class='col-md-6'>
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
            <div class='col-md-6'>
                <label for='txtmusico' class='form-label'>Nombre del musico</label>
                <select name='txtmusico'>
    ";
                while($fila2 = $musicos->fetch_array()):
                    echo"<option value='$fila2[idMusico]'>$fila2[nombre]</option>";
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