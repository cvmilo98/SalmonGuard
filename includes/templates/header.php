<?php
    use App\Usuario;
    if(!isset($_SESSION)) {
        session_start();
    }
    $auth = $_SESSION['login'] ?? false;
    $usuario = $_SESSION['usuario'] ?? null;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SalmonGuard</title>
    <link rel="stylesheet" href="/portaf/build/css/app.css">
</head>
<body>
    <header class="header">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a class="a1" href="/portaf/index.php">
               <!-- En la linea de abajo va el logo de la página -->
                <img href="/portaf/index.php" class="salmon" src="/portaf/build/img/salmonNo.png" alt="">
                </a>

                <div class="mobile-menu">
                    <img src="/portaf/build/img/barras.svg" alt="icono menu responsive">
                </div>

                <div class="derecha">
                    <img class="dark-mode-boton" src="build/img/dark-mode.svg">
                    <nav class="navegacion">
                        <?php if(!$auth):  ?>
                            <a href="/portaf/login.php">Iniciar Sesión</a>
                        <?php endif; ?>
                        <a href="/portaf/contacto.php">Contactanos</a>
                        <a href="/portaf/nosotros.php">Nosotros</a>
                        <?php if($auth):  ?>
                            <a href="/portaf/subir-Video.php">Subir Video</a>
                        <?php endif; ?>
                        <?php if($auth):  ?>
                            <a href="/portaf/cerrar-sesion.php">Cerrar Sesión</a>
                        <?php endif; ?>                 
                    </nav>
                </div>
            </div> <!--.barra-->
            <div class="SalmonG">
                <h1>SalmonGuard</h1>
            </div>
        </div>
    </header>
   