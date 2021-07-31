<?php
    include 'conexionBD.php';
    include 'encabezado.php';
   
    echo
    "
        <h1>Agregar Nuevo Genero</h1>

        <form action='nuevoGenero.php' method='POST'>
            <div>
                <label for='txtdescripcion' class='form-label'>Nombre del genero</label>
                <input type='text' name='txtdescripcion' class='form-control' id='txtdescripcion'>
            </div>
            <div>
                <button type='submit' class='btn btn-primary'>Agregar</button>
            </div>
        </form>
    ";







    include 'piePagina.php';
?>