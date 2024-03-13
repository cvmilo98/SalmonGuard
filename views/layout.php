<?php
    if(!isset($_SESSION)) {
        session_start();
    }
    
    $auth = $_SESSION['login'] ?? false;
    $usuario = $_SESSION['usuario'] ?? null;

    if(!isset($inicio)) {
        $inicio = false;
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SalmonGuard</title>
    <script src="https://cdn.bootcss.com/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="shortcut icon" href="../build/img/salmonNo.png">
    <link rel="stylesheet" href="../build/css/app.css">
</head>
<body>
    <header class="header">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a class="a1" href="/">
               <!-- En la linea de abajo va el logo de la página -->
                <img href="/" class="salmon" src="../build/img/salmonNo.png" alt="">
                </a>

                <div class="mobile-menu">
                    <img src="../build/img/barras.svg" alt="icono menu responsive">
                </div>

                <div class="derecha">
                    <img class="dark-mode-boton" src="../build/img/dark-mode.svg">
                    <nav class="navegacion">
                        <?php if(!$auth):  ?>
                            <a href="/admin">Admin</a>
                        <?php endif; ?>
                        <?php if(!$auth):  ?>
                            <a href="/login">Iniciar Sesión</a>
                        <?php endif; ?>
                        <a href="/contactanos">Contactanos</a>
                        <a href="/nosotros">Nosotros</a>
                        <?php if($auth):  ?>
                            <a href="/subirVideo">Subir Video</a>
                        <?php endif; ?>
                        <?php if($auth):  ?>
                            <a href="/analisis">Ver Analisis</a>
                        <?php endif; ?>
                        <?php if($auth):  ?>
                            <a href="/logout">Cerrar Sesión</a>
                        <?php endif; ?>                 
                    </nav>
                </div>
            </div> <!--.barra-->
            <div class="SalmonG">
                <h1>SalmonGuard</h1>
            </div>
        </div>
    </header>


    <?php echo $contenido; ?>




<?php
    if(!isset($_SESSION)) {
        session_start();
    }
    $auth = $_SESSION['login'] ?? false;
    if(!isset($inicio)) {
        $inicio = false;
    }
?>

    <footer class="footer seccion">
            <div class="contenedor contenedor-footer">
                <nav class="navegacion">
                    <?php if(!$auth):  ?>
                        <a href="/login">Iniciar Sesión</a>
                    <?php endif; ?>
                    <a href="/contactanos">Contactanos</a>
                    <a href="/nosotros">Nosotros</a>
                    <?php if($auth):  ?>
                            <a href="/cerrar-sesion">Cerrar Sesión</a>
                        <?php endif; ?>
                </nav>
            </div>

            <p class="copyright">Todos los derechos Reservados <?php echo date('Y'); ?> &copy;</p>
        </footer>

        <script src="../build/js/bundle.min.js"></script>
        <script src="../build/js/main.js" type="text/javascript"></script>
    </body>
    </html>