<main class="contenedor seccion">
    <h1>Administrador de Usuarios</h1>
    
    <?php if (intval( $resultado) === 1): ?>
            <p class="alerta exito">Usuario Creado Correctamente</p>
    <?php elseif (intval( $resultado) === 2): ?>
            <p class="alerta exito">Usuario Actualizado Correctamente</p>
    <?php elseif (intval( $resultado) === 3): ?>
            <p class="alerta exito">Usuario Eliminado Correctamente</p>
    <?php endif; ?>

    <a href="/users/crear" class="boton boton-verde">Nuevo Usuario</a>


    <table class="usuarios">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th type="password">Contraseña</th>
                <th>Email</th>
                <th>admin</th>
                <th>confirmado</th>
                <th>token</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody> <!-- Mostrar los resultados -->
            <?php foreach( $usuario as $usuarios ): ?> 
            <tr>
                <td class="TD1"><?php echo $usuarios->id; ?></td>
                <td class="TD1"><?php echo $usuarios->nombre; ?></td>
                <td class="TD1"><?php echo $usuarios->contrasena; ?></td>
                <td class="TD1"><?php echo $usuarios->email; ?></td>
                <td class="TD1"><?php echo $usuarios->admin; ?></td>
                <td class="TD1"><?php echo $usuarios->confirmado; ?></td>
                <td class="TD1"><?php echo $usuarios->token; ?></td>
                
                <td>
                    <form method="POST" class="w-100" action="/users/eliminar">

                        <input type="hidden" name="id" value="<?php echo $usuarios->id; ?>">

                        <input type="submit" class="boton-rojo-block" value="Eliminar">
                    </form>


                    <a href="users/actualizar?id=<?php echo $usuarios->id; ?>" 
                    class="boton-amarillo-block">Actualizar</a>
                </td>
            </tr>
            <?php endforeach;  ?>
        </tbody>
    </table>
</main>