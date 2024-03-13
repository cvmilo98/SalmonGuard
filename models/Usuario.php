<?php

namespace Model;

class Usuario extends ActiveRecord {
    // Base de Datos
    protected static $tabla = 'credencial';
    protected static $columnasDB = ['id', 'nombre', 'contrasena', 'email', 'admin', 'confirmado', 'token', 'VideoSubido', 'Estado'];

    public $id;
    public $nombre;
    public $contrasena;
    public $email;
    public $admin;
    public $confirmado;
    public $token;
    public $VideoSubido;
    public $Estado;

    public function __construct($args = []) 
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->contrasena = $args['contrasena'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->admin = $args['admin'] ?? '0';
        $this->confirmado = $args['confirmado'] ?? '0';
        $this->token = $args['token'] ?? "";
        $this->VideoSubido = $args['videoSubido'] ?? "";
        $this->Estado = $args['Estado'] ?? "";
    }

    public function validarNuevaCuenta() {
        if(!$this->nombre) {
            self::$errores[] = "Debes añadir un nombre";
        }
        if(!$this->email) {
            self::$errores[] = "Debes añadir un correo";
        }
        if(!$this->contrasena) {
            self::$errores[] = "La contraseña es Obligatoria";
        }
        if(strlen($this->contrasena) < 6) {
            self::$errores[] = "La contraseña debe tener al menos 6 caracteres";
        }

        return self::$errores;    
    }

    public function validarLogin() {
        if(!$this->nombre) {
            self::$alertas[] = "Debes añadir un nombre de usuario";
        }
        if(!$this->contrasena) {
            self::$alertas[] = "La contraseña es Obligatoria";
        }

        return self::$alertas;    
    }

    public function validarEmail() {
        if(!$this->email) {
            self::$alertas['error'][] = 'El email es obligatorio';
        }
        return self::$alertas;
    }

    public function validarPassword() {
        if(!$this->contrasena) {
            self::$alertas['error'][] = 'La contraseña es obligatoria';
        }
        if(strlen($this->contrasena) < 6) {
            self::$alertas['error'][] = 'La contraseña debe tener al menos 6 caracteres';
        }
        
        return self::$alertas;
    }

    // Revisa si el usuario ya esta registrado
    public function existeUsuario() {
        $query = " SELECT * FROM " . self::$tabla . " WHERE email = '" . $this->email . "' LIMIT 1";

        $resultado = self::$db->query($query);

        if($resultado->num_rows) {
            self::$errores[] = "El usuario ya esta registrado";
        }

        return $resultado;
    }

    public function hashPassword() {
        $this->contrasena = password_hash($this->contrasena, PASSWORD_BCRYPT);
    }

    public function crearToken() {
        $this->token = uniqid();
    }

    public function comprobarPassword($contrasena){
        $resultado = password_verify($contrasena, $this->contrasena);

        if(!$resultado || !$this->confirmado) {
            self::$alertas['error'][] = "Password Incorrecto o tu cuenta no está confirmada";
        } else {
            return true;
        }
    }

}