<?php

/**
 * Clase que maneja la conexion/desconexion a la base de datos
 * mediante las funciones PDO (PHP Data Objects).
 * Utiliza el patron de diseno singleton para el manejo de la conexion.
 */
class DataBase {

//    Propiedades estaticas con la informacion de la conexion (DSN):
    private static $dbName = 'd47bcqgdp1c8rh';
    private static $dbHost = 'ec2-184-72-239-186.compute-1.amazonaws.com';
    private static $port = '5432';
    private static $dbUsername = 'yzgchypcmpvgrx';
    private static $dbUserPassword = '1c9dd006c9f409121f8e3561ab1d7da22fae902707c1ef7c8a3bb09a360aa430';
    
//    private static $dbHost = 'localhost';
//    private static $port = '5432';
//    private static $dbUsername = 'postgres';
//    private static $dbUserPassword = '';
//    private static $dbName = 'inventario';
    
    
    //Propiedad para control de la conexion:
    private static $conexion = null;

    /**
     * No se permite instanciar esta clase, se utilizan sus elementos
     * de tipo estatico.
     */
    public function __construct() {
        exit('No se permite instanciar esta clase.');
    }

    /**
     * Metodo estatico que crea una conexion a la base de datos.
     */
    public static function connect() {
        // Una sola conexion para toda la aplicacion (singleton):
        // La palabra reservada self nos ayuda a acceder a las propiedades estaticas de conexion
        if (null == self::$conexion) {
            try {
                self::$conexion = new PDO("pgsql:host=" . self::$dbHost . ";" . "port=" . self::$port . ";" . "dbname=" . self::$dbName, self::$dbUsername, self::$dbUserPassword);
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
        return self::$conexion;
    }

    /**
     * Metodo estatico para desconexion de la bdd.
     */
    public static function disconnect() {
        self::$conexion = null;
    }

}
