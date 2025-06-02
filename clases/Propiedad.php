<?php

namespace App;

class Propiedad {

    //BD's
    protected static $db; 
    protected static $columnasDB = ['id', 'titulo', 'precio', 'imagen', 'descripcion', 'habitaciones', 'wc', 'estacionamiento', 'creado', 'vendedorId']; 

    //Validaciones
    protected static  $errores = [];

    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $habitaciones;
    public $wc;
    public $estacionamiento;
    public $creado;
    public $vendedorId;

    //Definir la conexion a la bD's
    public static function setDB($database) {
        self::$db = $database;
    }    

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? '';
        $this->titulo = $args['titulo'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->habitaciones = $args['habitaciones'] ?? '';
        $this->wc = $args['wc'] ?? '';
        $this->estacionamiento = $args['estacionamiento'] ?? '';
        $this->creado = date('Y/m/d');
        $this->vendedorId = $args['vendedorId'] ?? '';
    }

    public function guardar () {
        
        //sanitizar los datos con POO
        $atributos = $this->sanitizarDatos();

        //$string = join(', ', array_keys($atributos)); //Tomara dos parametros, el 1° la coma que separa los campos en el INSERT, el 2° la función array_keys

        //query de insercion de datos del formulario a la base de datos 
        $query = "INSERT INTO propiedades (";
        $query .= join(', ', array_keys($atributos));
        $query .= " ) VALUES (' "; 
        $query .= join("', '", array_values($atributos)); 
        $query .= " ') ";

        //debuguear($query);
        $resultado = self::$db->query($query);
        return $resultado;
    }

    //Identifica y une los atributos de la BD's
    public function atributos () {
        $atributos = [];
        foreach(self::$columnasDB as $columna) {
            if($columna === 'id') continue;
            $atributos [$columna] = $this->$columna;
        }
        return $atributos;
    }

    //Sanitiza los atributos de la BD's
    public function sanitizarDatos () {
        $atributos = $this->atributos();
        $sanitizado = [];
        foreach($atributos as $key => $value ) { //donde key va a ser el nombre del campo y value será lo que el usuario ingreso 
            $sanitizado [$key] = self::$db->escape_string($value) ; //Código sanitizador que solo sanitiza los valores y no las llaves, con referencia a la coenxion de la BD's
        }
        return $sanitizado;
    }

    //Validación
    public static function getErrores () {
        return self::$errores;
    } 

    public function validar() {
        //Validación de errores
        if (!$this->titulo) {
            self::$errores [] = "Debes añadir un titulo";
        }
        if (!$this->precio) {
            self::$errores [] = "Debes añadir un precio";
        }
        if (strlen($this->descripcion)<50) {
            self::$errores [] = "Debes añadir un descripcion de al menos 50 caracteres";
        }
        if (!$this->habitaciones) {
            self::$errores [] = "Debes añadir un habitaciones";
        }
        if (!$this->wc) {
            self::$errores [] = "Debes añadir un wc";
        }
        if (!$this->estacionamiento) {
            self::$errores [] = "Debes añadir un estacionamiento";
        }
        if (!$this->vendedorId) {
            self::$errores [] = "Debes añadir un vendedor";
        }
        if (!$this->imagen) {
            self::$errores [] = "La imagen es obligatoria";
        }

        return self::$errores;
    } 

    public function setImagen($imagen) {
        if ($imagen) {
            $this->imagen = $imagen;
        }
    }
}