<?php
    include 'conexionBD.php';
    include 'encabezado.php';

    $sql= "select * from musicos;";
    $sql2= "select * from instrumentosMusicales;";

    $musicos= $conexion ->query($sql) or die("error interno");
    $instrumento= $conexion ->query($sql2) or die("error interno");

    echo
    "
        <h1>Agregar Instrumento/Musico</h1>
        <form class='row g-3' action='nuevoInsMusico.php' method='POST'>
            <div class='col-md-6'>
                <label for='txtmusico' class='form-label'>Nombre del musico</label>
                <select name='txtmusico'>
    ";
                while($fila = $musicos->fetch_array()):
                    echo"<option value='$fila[idMusico]'>$fila[nombre]</option>";
                endwhile;
    echo
    "
                </select>
            </div>
            <div class='col-md-6'>
                <label for='txtinstrumento' class='form-label'>Instrumento</label>
                <select name='txtinstrumento'>
    ";
                while($fila2 = $instrumento->fetch_array()):
                    echo"<option value='$fila2[idInstrumento]'>$fila2[descripcion]</option>";
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