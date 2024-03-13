<?php

namespace Controllers;
use Classes\Email;
use MVC\Router;
use Model\Usuario; 

class UsuarioController {
    public static function index(Router $router) {
        session_start();

        isAdmin();

        $usuario = Usuario::all();

        // Muestra mensaje condicional
        $resultado = $_GET['resultado'] ?? null;
        
        $router->render('usuarios/admin', [
            'usuario' => $usuario,
            'resultado' => $resultado,
        ]);
    }

    public static function analisis(Router $router) {
        $usuario = Usuario::all();

        $router->render('paginas/analisis', [
            'usuario' => $usuario
        ]);
    }

    // public static function crear(Router $router) {
        
    //     $usuario = new Usuario;

    //     // Arreglo con mensajes de errores
    //     $errores = Usuario::getErrores();

    //     // Ejecutar el código después de que envia el formulario
    //     if($_SERVER['REQUEST_METHOD'] === 'POST') {
        

    //     // Crear nueva instancia
    //     $usuario = new Usuario($_POST['credencial']);
        
    //     // Validar
    //     $errores = $usuario->validar();


    //     // Revisar que el array de errores este vacio
    //     if(empty($errores)) {

    //         $usuario->crear();
    //     }

    // }
    public static function crear(Router $router) {
        $usuario = new Usuario($_POST);
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario->sincronizar($_POST);
            $errores = $usuario->validarNuevaCuenta();

            // Revisar que erroes este vacio
            if(empty($errores)) {
                // Verificar que el usuario no este registrado
                $resultado = $usuario->existeUsuario();

                if($resultado->num_rows) {
                    $errores = Usuario::getErrores();
                } else {
                    // Hashear las contraseñas
                    $usuario->hashPassword();

                    // Generar un Token Único
                    $usuario->crearToken();

                    // Enviar el correo
                    $email = new Email($usuario->nombre, $usuario->email,
                    $usuario->token);
                    $email->enviarConfirmacion();

                    // Crear el usuario
                    $resultado = $usuario->guardar();

                    // debuguear($usuario);

                    if($resultado) {
                        header('Location: /mensaje');
                    }
                }
            }
            
        }

        $router->render('usuarios/crear', [
            'usuario' => $usuario,
            'errores' => $errores
        ]);
     }
        



    public static function actualizar(Router $router) {

        $id = validarORedireccionar('/admin');
        $usuario = Usuario::find($id);

        $errores = Usuario::getErrores();

        // Ejecutar el código después de que envia el formulario
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        // Asignar los atributos
        $args = $_POST['credencial'];
        $usuario->sincronizar($args);


        # Validación
        $errores = $usuario->validar();

        // Revisar que el array de errores este vacio

        if(empty($errores)) {
            $usuario->guardar();
        }

    }

        $router->render('usuarios/actualizar', [
            'usuario' => $usuario,
            'errores' => $errores
        ]);
    }

    public static function eliminar() {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
    
            if($id) {
    
                $usuario = Usuario::find($id);
                
                $usuario->eliminar();
    
        }
    }
    }

    public static function mensaje(Router $router) {
        $router->render('usuarios/mensaje');
    }

    public static function confirmar(Router $router) {


        $token = s($_GET['token']);

        $usuario = Usuario::where('token', $token);

        if(empty($usuario)) {
            // Mostrar mensaje de error
            Usuario::setAlerta('error', 'Token no válido');
        } else {
            // Modificar a usuario confirmado
            $usuario->confirmado = "1";
            $usuario->token = null;
            $usuario->guardar();
            Usuario::setAlerta('exito', 'Cuenta confirmada correctamente');
        }

        // Obtener alertas
        $alertas = Usuario::getAlertas();

        // Renderizar la vista
        $router->render('usuarios/confirmar-cuenta', [
            'alertas' => $alertas
        ]);
    }

}