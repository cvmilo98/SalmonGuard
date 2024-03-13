<main class="contenedor seccion contenido-centrado">
        <h1>Reestablecer Contraseña</h1>

        <a href="/" class="boton boton-verde">Volver</a>


<?php
    include_once __DIR__ . '/../templates/alertas.php';
?>

<?php if($error) return; ?>
        <form method="POST" class="formulario">
            <fieldset>
                <legend>Coloca tú nueva contraseña</legend>

                <label for="contrasena">Contraseña</label>
                <input type="password" name="contrasena" placeholder="Tú Contraseña" id="contrasena" maxlength="6">
            </fieldset>
            
            <div class="acciones">
                <input type="submit" value="Reestablecer" class="boton-verde">
                <a href="/login">¿Ya tienes una cuenta? Inicia Sesión</a>
            </div>
        </form>
    </main>