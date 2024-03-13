<?php

namespace Model;

class ActiveRecord {

    // Base de Datos
    protected static $db;
    protected static $tabla = [];
    protected static $columnasDB = [];


    // Errores
    protected static $errores = [];

    // Alertas
    protected static $alertas = [];

    // Definir la conexión a la BD
    public static function setDB($database) {
        self::$db = $database;
    }



    public function guardar(){
        if(!is_null($this->id)) {
            // Actualizar
            $this->actualizar();
        } else {
            // Crear nuevo registro
            $this->crear();
        }
    }

    
    // Crear un nuevo registro
    public function crear(){
        // Sanitizar los datos
        $atributos = $this->sanitizarAtributos();


        // Insertar en la BD
        $query = " INSERT INTO " . static::$tabla . " ( ";
        $query .= join(',', array_keys($atributos));
        $query .= ") VALUES ('"; 
        $query .= join("','", array_values($atributos));
        $query .= "') ";

        // Resultado de la consulta
        $resultado = self::$db->query($query);

        if($resultado) {
            // Redireccionar al usuario.
            header('Location: /admin?resultado=1');
        }

        return $resultado;
    }

    public function actualizar() {
        // Sanitizar los datos
        $atributos = $this->sanitizarAtributos();

        $valores = [];
        foreach($atributos as $key => $value) {
            $valores[] = "{$key}='{$value}'";
        }

        $query = "UPDATE " . static::$tabla . " SET ";
        $query .= join(', ', $valores );
        $query .= " WHERE id = '" . self::$db->escape_string($this->id) . "' ";
        $query .= " LIMIT 1 ";

        $resultado = self::$db->query($query);

        return $resultado;
    }

    // Eliminar un registro
    public function eliminar() {
        $query = "DELETE FROM  " . static::$tabla . " WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1";
        $resultado = self::$db->query($query);

        if($resultado) {
            // Redireccionar al usuario.
            header('Location: /admin?resultado=3');
        }

        return $resultado;
    }

    // Identificar y unir los atributos de la BD
    public function atributos() {
        $atributos = [];
        foreach(static::$columnasDB as $columna) {
            if($columna === 'id') continue;
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }

    public function sanitizarAtributos() {
        $atributos = $this->atributos();
        $sanitizado = [];
        foreach($atributos as $key => $value ) {
            $sanitizado[$key] = self::$db->escape_string($value);
        }
        return $sanitizado;
    }

    // Validación
    public static function getErrores() {
        return static::$errores;
    }


    public static function setAlerta($tipo, $mensaje) {
        static::$alertas[$tipo][] = $mensaje;
    }

    public static function getAlertas() {
        return static::$alertas;
    }

    public function validar() {
        static::$errores = [];
        return static::$errores;    
    }

    // Lista todos los usuarios
    public static function all() {
        $query = "SELECT * FROM credencial";

        $resultado = self::consultarSQL($query);

        return $resultado;
    }

    // Busca un usuario por su id
    public static function find($id) {
        $query = "SELECT * FROM credencial WHERE id = ${id}";
        $resultado = self::consultarSQL($query);
        return array_shift( $resultado  );
    }

    public static function get($limite) {
        $query = "SELECT * FROM " . static::$tabla . " LIMIT ${limite}";
        $resultado = self::consultarSQL($query);
        return $resultado;
    }

    public static function where($columna, $valor) {
        $query = "SELECT * FROM " . static::$tabla  ." WHERE ${columna} = '${valor}'";
        $resultado = self::consultarSQL($query);
        return array_shift( $resultado  );
    }

    public static function consultarSQL($query) {
        // consultar la bd
        $resultado = self::$db->query($query);

        // Iterar los resultados
        $array = [];
        while($registro = $resultado->fetch_assoc()) {
            $array[] = self::crearObjeto($registro);
        }

        // Liberar la memoria
        $resultado->free();

        // Retornar los resultados
        return $array;
    }

    protected static function crearObjeto($registro) {
        $objeto = new static;

        foreach($registro as $key => $value) {
            if(property_exists( $objeto, $key  )) {
                $objeto->$key = $value;
            }
        }

        return $objeto;
    }

    // Sincroniza el objeto en memoria con los cambios realizados por el usuario
    public function sincronizar($args=[]) { 
        foreach($args as $key => $value) {
          if(property_exists($this, $key) && !is_null($value)) {
            $this->$key = $value;
          }
        }
    }
}