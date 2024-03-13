<main class="contenedor seccion contenido-centrado">
        <h2>Olvidé mi password</h2>
        <h3>Reestablece tu password escribiendo tu correo a continuación</h3>

        <?php
            include_once __DIR__ . '/../templates/alertas.php';
        ?>

        <a href="/login" class="boton boton-verde">Volver</a>

<form method="POST" class="formulario" action="/olvide">
            <fieldset>
                <label for="usuario">Email</label>
                <input  type="email" name="email" placeholder="Tu correo" id="email">
            </fieldset>
            
            <div class="acciones">
                <input type="submit" value="Enviar Instrucciones" class="boton-verde">
            </div>
        </form>
</main>