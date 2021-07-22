<?php
    include 'conexionBD.php';
    include 'encabezado.php';
    echo "<h1>Álbumes</h1>";
    
    $sql = "select a.idAlbum, a.nombre, a.fechaLanzamiento, t.descripcion, b.nombre from 
    bandas as b join albumbandas as ab 
    on b.idBanda = ab.idBanda
    join albumes as a
    on ab.idAlbum = a.idAlbum
    join albumcanciones as ac
    on a.idAlbum = ac.idAlbum
    join titulocanciones as t
    on ac.idTitulo = t.idTitulo;";

    





    include 'piePagina.php';
?>