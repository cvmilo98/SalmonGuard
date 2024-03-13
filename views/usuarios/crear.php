<main class="contenedor seccion">
    <h1>Crear Usuario</h1>

    <a href="/admin" class="boton boton-verde">Volver</a>

    <?php foreach($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <form class="formulario" method="POST">
        <fieldset>
            <legend>Información de usuario</legend>

            <label for="nombre">Nombre:</label>
            <input 
                type="text"
                id="nombre" 
                name="nombre"
                placeholder="Nombre Usuario" 
                value="<?php echo s ( $usuario->nombre ); ?>"
            />

            <label for="email">Correo:</label>
            <input 
                type="email" 
                id="email" 
                name="email" 
                placeholder="Introduzca su correo" 
                maxlength="250" 
                value="<?php echo s ( $usuario->email ); ?>"
            />

                
            <label for="contrasena">Contraseña:</label>
            <input 
                type="password" 
                id="contrasena" 
                name="contrasena" 
                placeholder="Introduzca una contraseña" 
                maxlength="6" 
            />
            <label for="admin">Cargo:</label>
            <select id="admin"
                name="admin"
                value="<?php echo s ($usuario->admin); ?>">
                <option value="">-- Seleccione --</option>
                <option value="0">Usuario</option>
                <option value="1">Administrador</option>
                </select>
        </fieldset>
    
        <input type="submit" value="Crear Usuario" class="boton-verde">
    </form>
</main>