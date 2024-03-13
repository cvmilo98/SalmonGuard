<main class="contenedor seccion contenido-centrado">
        <h1>Iniciar Sesión</h1>

        <a href="/" class="boton boton-verde">Volver</a>

        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>

<?php
    include_once __DIR__ . '/../templates/alertas.php';
?>

        <form method="POST" class="formulario" action="/login">
            <fieldset>
                <legend>Nombre de Usuario y Contraseña</legend>

                <label for="nombre">Nombre de Usuario</label>
                <input  type="text" name="nombre" placeholder="Tú Usuario" id="nombre">

                <label for="contrasena">Contraseña</label>
                <input  type="password" name="contrasena" placeholder="Tú Contraseña" id="contrasena" maxlength="6">
            </fieldset>
            
            <div class="acciones">
                <input type="submit" value="Iniciar Sesión" class="boton-verde">
                <a href="/olvide">¿Olvidaste tú contraseña?</a>
            </div>
        </form>
    </main>