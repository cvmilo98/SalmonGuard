<?php
    if(!isset($_SESSION)) {
        session_start();
    }
    $auth = $_SESSION['login'] ?? false;


?>

<footer class="footer seccion">
        <div class="contenedor contenedor-footer">
            <nav class="navegacion">
                <?php if(!$auth):  ?>
                    <a href="/portaf/login.php">Iniciar Sesión</a>
                <?php endif; ?>
                <a href="contacto.php">Contactanos</a>
                <a href="">Nosotros</a>
                <?php if($auth):  ?>
                        <a href="/portaf/cerrar-sesion.php">Cerrar Sesión</a>
                    <?php endif; ?>
            </nav>
        </div>

        <p class="copyright">Todos los derechos Reservados <?php echo date('Y'); ?> &copy;</p>
    </footer>

    <script src="/build/js/bundle.min.js"></script>
</body>
</html>