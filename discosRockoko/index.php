<?php
$mensaje = null;

if ($_SERVER["REQUEST_METHOD"] == "POST"):
    include 'conexionBD.php';
    $contraEncriptada = md5($_REQUEST['txtPassword']);
    $sql = "select * from administradores where nombre = ? and password = ?;";
    $datos = $conexion->prepare($sql);
    $datos->bind_param('ss',$_REQUEST['txtNombre'],$contraEncriptada);
    $datos->execute();
    $datos = $datos->get_result();
    if($fila =$datos->fetch_assoc()):
        session_start();
        $_SESSION['idUsuario'] = $fila['idAdministrador'];
        $_SESSION['usuario'] = $fila['nombre'];
        header('Location: inicio.php');
    endif;
else:
    $mensaje = "
    <div class='alert alert-danger' role='alert'>
        Datos incorrectos
    </div>
    ";
endif;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rockoko</title>
    <link rel="icon" type="image/png" href="img/miFavicon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>
<body style="background-color:#664747;">
    <div class="container">
        <h1 class="text-center" style = "margin-top:50px; color:rgb(230,230,230);">Discográfica Rockoko</h1>
        <h2 class="text-center" style = "color:rgb(230,230,230);">Inicio de sesión</h2>

        <div class="card" style="width: 18rem;">
            <img src="img/guitarraElec.jpg" class="card-img-top" alt="Guitarra">
            <div class="card-body">
            <form method="post" action="index.php">
                <div class="mb-3">
                    <label for="InputUsuario1" class="form-label">Usuario</label>
                    <input type="text" class="form-control" name = "txtNombre" id="InputUsuario1" required>
                </div>
                <div class="mb-3">
                    <label for="InputPassword1" class="form-label">Contraseña</label>
                    <input type="password" name = "txtPassword" class="form-control" id="InputPassword1" required>
                </div>
                <button type="submit" class="btn btn-primary">Ingresar</button>
            </form>
            </div>
        </div>

    </div>

<h9 class="text-center fixed-bottom">Todos los derechos reservados. Januar Stiwar Martinez Palacios & Evelyn Natalia Betancur Guerra. januarpalacios5@gamil.com & evilinatalia17@hotmail.com</h9>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
