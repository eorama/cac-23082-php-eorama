<?php

require_once('config.php');

class Conexion extends PDO {
    # Atributos que son propios del objeto
    private $conexion; # Objeto de tipo PDO, de la clase propia de PHP
   
    public function __construct() {
        // Cargar las variables de entorno
        global $servidor, $usuario, $pass, $base;
        try {
            parent::__construct("mysql:host=$servidor;dbname=$base", $usuario, $pass);
            # Activamos los errores y las excepciones
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Falla de Conexión: " . $e->getMessage());
        }
    }
  
    # Creo un método de ejecución a SQL de insert, update, delete   
    public function ejecutar($sql) {
        # Ejecuta una consulta de SQL
        $this->exec($sql);
        # Esto nos da el valor del id insertado
        return $this->lastInsertId();
    }

    public function consultar($sql) { # Select 
        # Ejecuta la consulta y nos devuelve la información de la base
        $sentencia = $this->prepare($sql);
        $sentencia->execute();
        # Retorna todos los registros de la consulta SQL
        return $sentencia->fetchAll();
        /* 1. Agarra nuestra sentencia de SQL y lo mete adentro de un objeto 
           2. Agarra el objeto y ejecuta la sentencia de SQL que devuelve o no filas de la base de datos 
           3. fetchAll() nos devuelve un array con las filas del select  */
    }
}
?>
