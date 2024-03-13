<fieldset>
    <legend>Información de usuario</legend>

    <label for="usuario">Nombre:</label>
    <input type="text" id="usuario" name="credencial[usuario]" placeholder="Nombre Usuario" maxlength="10" value="<?php echo s ( $usuario->usuario ); ?>">

            
    <label for="contrasena">Contraseña:</label>
    <input  type="password" id="contrasena" name="credencial[contrasena]" placeholder="Introduzca una contraseña" maxlength="6" value="<?php echo s ( $usuario->contrasena ); ?>">

    <label for="cargo">Cargo:</label>
    <select id="cargo_id" name="credencial[id_cargo]" value="<?php echo s ($usuario->id_cargo); ?>">
        <option value="">-- Seleccione --</option>
        <option value="1">Administrador</option>
        <option value="2">Usuario</option>
    </select>
</fieldset>

