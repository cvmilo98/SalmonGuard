<fieldset>
    <legend>Información de usuario</legend>

    <label for="nombre">Nombre:</label>
    <input 
        type="text" 
        id="nombre" 
        name="nombre" 
        placeholder="Nombre Usuario" 
        maxlength="10" 
        value="<?php echo s ( $usuario->nombre ); ?>">

    <label for="email">Correo:</label>
    <input 
        type="email" 
        id="email" 
        name="email" 
        placeholder="Introduzca su correo" 
        maxlength="250" 
        value="<?php echo s ( $usuario->email ); ?>">

            
    <label for="contrasena">Contraseña:</label>
    <input  
        type="password" 
        id="contrasena" 
        name="contrasena" 
        placeholder="Introduzca una contraseña" 
        maxlength="6" 
        value="<?php echo s ( $usuario->contrasena ); ?>">
    <label for="admin">Cargo:</label>
        <select id="admin"
        name="admin"
        value="<?php echo s ($usuario->admin); ?>">
        <option value="">-- Seleccione --</option>
        <option value="0">Usuario</option>
        <option value="1">Administrador</option>
        </select>    
</fieldset>

