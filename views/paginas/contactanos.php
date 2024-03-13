<main class="contenedor seccion">
        <h2>Contactenos vía Gmail</h2>

        <a href="/" class="boton boton-verde">Volver</a>

        <form action="/enviar" method="post" class="formulario">
            <fieldset>
                <legend>Información Personal</legend>

                <label for="nombre">Nombre:</label>
                <input required="text" type="text" name="nombre" placeholder="Tu Nombre" id="nombre" maxlength="35">

                <label for="mensaje">Mensaje:</label>
                <input required="text" name="mensaje" placeholder="Escriba su mensaje aquí" id="mensaje" maxlength="100">
            </fieldset>

            <input type="submit" value="Enviar" class="boton boton-verde">
        </form>
    </main>