<?php
    include 'conexionBD.php';
    include 'encabezado.php';
   
    echo
    "
        <h1>Agregar Nuevo Álbum</h1>

        <form class='row g-3' action='nuevoAlbum.php' method='POST'>
            <div class='col-md-6'>
                <label for='txtnombre' class='form-label'>Nombre del Álbum</label>
                <input type='text' name='txtnombre' class='form-control' id='txtnombre' required>
            </div>
            <div class='col-md-6'>
                <label for='txtfechC' class='form-label'>Fecha de la Creación</label>
                <input type='date' name='txtfechC' class='form-control' id='txtfechC' required>
            </div>
            <div class='col-md-12'>
                <button type='submit' class='btn btn-primary'>Agregar</button>
            </div>
        </form>
    ";







    include 'piePagina.php';
?>