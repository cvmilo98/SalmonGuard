<?php 

namespace Controllers;
use Model\Usuario;
use MVC\Router;
use Classes\Email;

class LoginController {

    public static function login(Router $router) {
        $auth = new Usuario($_POST);
        $alertas = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $errores = $auth->validarLogin();

            $alertas = $auth->validarLogin();
            if(empty($errores)) {
                // comprobar si el usuario existe
                $usuario = Usuario::where('nombre', $auth->nombre);
                
                if($usuario) {
                    // Verificar el password
                    if( $usuario->comprobarPassword($auth->contrasena) ) {
                        // Autenticar al usuario
                        session_start();

                        $_SESSION['id'] = $usuario->id;
                        $_SESSION['nombre'] = $usuario->nombre;
                        $_SESSION['login'] = true;

                        // Redireccionamiento

                        if($usuario->admin === "1") {
                            $_SESSION['admin'] = $usuario->admin ?? null;
                            header('Location: /admin');
                        } else {
                            header('Location: /');
                        }

                        debuguear($_SESSION);
                    }
                }else {
                    Usuario::setAlerta('error', 'Usuario no encontrado');
                }
            }
        }

        $alertas = Usuario::getAlertas();

        $router->render('auth/login', [
            'alertas' => $alertas,
            'errores' => $errores,
            'auth' => $auth
        ]);
    }

    public static function logout(Router $router) {
       session_start();
       $_SESSION = [];
       header('Location: /');
    }

    public static function olvide(Router $router) {
        
        $alertas = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $auth = new Usuario($_POST);
            $alertas = $auth->validarEmail();

            if(empty($alertas)) {
                $usuario = Usuario::where('email', $auth->email);

                if($usuario && $usuario->confirmado === '1') {

                    // Generar un token
                    $usuario->crearToken();
                    $usuario->guardar();

                    // Enviar el email
                    $email = new Email($usuario->nombre, $usuario->email, $usuario->token);
                    $email->enviarInstrucciones();

                    //Alerta de exito
                    Usuario::setAlerta('exito', 'Se ha enviado un correo para reestablecer tu password');
                    $alertas = Usuario::getAlertas();


                } else {
                    Usuario::setAlerta('error', 'El usuario no existe o no ha confirmado su cuenta');
                }
            }
        }

        $alertas = Usuario::getAlertas();

        $router->render('auth/olvide-password', [
            'alertas' => $alertas
        ]);
     }

    public static function recuperar(Router $router) {
        
        $alertas = [];
        $error = false;

        $token = s($_GET['token']);

        // Buscar usuario por su token
        $usuario = Usuario::where('token', $token);

        if(empty($usuario)) {
            Usuario::setAlerta('error', 'Token no válido');
            $error = true;
        }

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Leer el nuevo password y guardarlo

            $contrasena = new Usuario($_POST);
            $alertas = $contrasena->validarPassword();

            if(empty($alertas)) {
                $usuario->contrasena = null;

                $usuario->contrasena = $contrasena->contrasena;
                $usuario->hashPassword();
                $usuario->token = null;

                $usuario->guardar();
                if($usuario) {
                    header('Location: /login');
                }
            }
        }


        $alertas = Usuario::getAlertas();
        $router->render('auth/recuperar-password', [
            'alertas' => $alertas,
            'error' => $error
        ]);
     }

}